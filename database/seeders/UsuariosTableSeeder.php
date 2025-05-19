<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Iván',
            'last_name' => 'muñoz',
            'email' => 'IvanUrbano@gmail.com',
            'password' => '12345678',
            'telefono' => '3127217071',
            'direccion' => 'Génova Nariño',
            'rol' => 'ganadero'
        ]);

        User::create([
            'name' => 'yeison',
            'last_name' => 'Sanchez',
            'email' => 'yeisonsanchez@gmail.com',
            'password' => '87654321',
            'telefono' => '3052774836',
            'direccion' => 'Tambo Cuca',
            'rol' => 'gestor'
        ]);

        User::create([
            'name' => 'Mateo',
            'last_name' => 'Rivera',
            'email' => 'MateoRivera@gmail.com',
            'password' => '14252352',
            'telefono' => '3177771774',
            'direccion' => 'Popayán',
            'rol' => 'administrador'
        ]);
    }
}
