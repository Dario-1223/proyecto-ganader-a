<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Tratamiento;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tratamientos_ReportesController extends Controller
{
    public function indexGanadero()
    {

        $usuario = Auth::user()->id_usuario;
        $reportesData = DB::select('CALL ObtenerReportesGanadero(?)', [$usuario]);
        $reportes = collect($reportesData); // Sin mapear a modelo


        $tratamientosData = DB::select('CALL ObtenerTratamientoGanadero(?)', [$usuario]);
        $tratamientos = collect($tratamientosData); // Sin mapear a modelo

       

        return view('Ganadero.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }

    public function indexAdministrador()
    {
        $usuario = Auth::user()->id_usuario;
        $tratamientosData = DB::select('CALL ObtenerTratamiento()');
        $tratamientos = collect($tratamientosData); // Sin mapear a modelo


        $reportesData = DB::select('CALL ObtenerReportes()');
        $reportes = collect($reportesData); // Sin mapear a modelo

        return view('Administrador.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }

    public function indexGestor()
    {
        $tratamientos = Tratamiento::all();
        $reportes = Reporte::all();

        return view('Gestor.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }

    public function downloadReporte($id_reporte)
{
    // Obtener datos del reporte con relaciones
    $reporte = DB::table('reportes')
        ->where('id_reporte', $id_reporte)
        ->first();

    if (!$reporte) {
        abort(404, 'Reporte no encontrado');
    }

    // Obtener datos del ganadero
    $ganadero = DB::table('users')
        ->where('id_usuario', $reporte->id_ganadero)
        ->select('name', 'last_name')
        ->first();

    // Obtener datos del gestor (quien creó el reporte)
    $gestor = DB::table('users')
        ->where('id_usuario', $reporte->id_gestor)
        ->select('name', 'last_name')
        ->first();

    // Obtener el historial médico relacionado (si existe)
    $historial = DB::table('historial_medico')
        ->where('id_historial', $reporte->id_historial ?? null)
        ->first();

    // Obtener tratamientos asociados al historial
    $tratamientos = collect();
    if ($historial) {
        $tratamientos = DB::table('tratamientos')
            ->where('id_historial', $historial->id_historial)
            ->get();
    }

    // Preparar datos para la vista
    $data = [
        'reporte' => (object) array_merge((array) $reporte, [
            'nombre_ganadero' => $ganadero ? $ganadero->name . ' ' . $ganadero->last_name : 'N/A',
            'nombre_gestor' => $gestor ? $gestor->name . ' ' . $gestor->last_name : 'N/A',
            'fecha_generacion' => now()->format('d/m/Y H:i')
        ]),
        'tratamientos' => $tratamientos,
        'historial' => $historial
    ];

    // Generar PDF
    $pdf = \PDF::loadView('reportes.plantilla', $data);

    // Descargar con nombre personalizado
    return $pdf->download('reporte_ganasys_'.$id_reporte.'_'.now()->format('Ymd').'.pdf');
}
}
