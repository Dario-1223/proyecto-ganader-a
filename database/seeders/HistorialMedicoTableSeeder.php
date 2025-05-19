<?php

namespace Database\Seeders;

use App\Models\HistorialMedico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorialMedicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HistorialMedico::create([
            'id_vaca' => 1,
            'sintomas' => 'Mastitis, leche de color rojo',
            'diagnostico' => 'aplicar penicilina, hasta que se mejore',
            'fecha_diagnostico' => '2024-04-22'
        ]);

        HistorialMedico::create([
            'id_vaca' => 2,
            'sintomas' => ' fiebre aftosa, fiebre alta, saliva excesiva, ampollas en la boca y pezuñas',
            'diagnostico' => 'Aplicar analgesicos como flunixin',
            'fecha_diagnostico' => '2022-04-23'
        ]);

        HistorialMedico::create([
            'id_vaca' => 3,
            'sintomas' => 'Hemoglobinuria, orina de color rojo',
            'diagnostico' => 'Vacunación, no alimentar con sal',
            'fecha_diagnostico' => '2025-11-12'
        ]);
    }
}
