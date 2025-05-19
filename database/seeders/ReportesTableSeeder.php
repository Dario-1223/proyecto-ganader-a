<?php

namespace Database\Seeders;

use App\Models\Reporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reporte::create([
            'id_gestor' => 3,
            'id_ganadero' => 1,
            'descripcion' => 'Estas ventas estan siendo  muy buenas este mes',
            'fecha_reporte' => now()
        ]);

        Reporte::create([
            'id_gestor' => 3,
            'id_ganadero' => 1,
            'descripcion' => 'Estas ventas estan siendo  muy bajas este mes',
            'fecha_reporte' => now()
        ]);

        Reporte::create([
            'id_gestor' => 3,
            'id_ganadero' => 1,
            'descripcion' => 'Las compras de ganado fueron exitosamente aceptadas',
            'fecha_reporte' => now()
        ]);
    }
}
