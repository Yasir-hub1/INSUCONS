<?php

namespace Database\Seeders;

use App\Models\Presupuesto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PresupuestoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presupuesto::create([
            'usuario' => 'manuel',
            'cliente' => 'Mojoncio',
            'descripcion' => 'xdxdxdxd',
            'total' => '10.0',
        ]);
    }
}
