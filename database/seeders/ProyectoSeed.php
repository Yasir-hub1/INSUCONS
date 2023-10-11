<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProyectoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyecto::create([
            'nombre' => 'Proyecto 2',
            'estado' => 'Terminado',
            'ubicacion' => 'La guardia xd',
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'fecha_fin' => date('Y-m-d H:i:s'),
            'empleado_id' => '1',
        ]);
        Proyecto::create([
            'nombre' => 'Proyecto 3',
            'estado' => 'Terminado',
            'ubicacion' => 'La guardia xd',
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'fecha_fin' => date('Y-m-d H:i:s'),
            'empleado_id' => '1',
        ]);
    }
}
