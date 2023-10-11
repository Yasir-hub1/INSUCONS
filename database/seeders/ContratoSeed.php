<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContratoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrato::create([
            'usuario' => "Mojoncio",
            'nombre' => "contrato 1",
            'descripcion' => '14785214',
            'user_id' => '6',

            'presupuesto_id' => '1',
            'factura_id' => 1,
            'proyecto_id' => 1,

        ]);
        Contrato::create([
            'usuario' => "Manolo",
            'nombre' => "contrato 2",
            'descripcion' => '14785214',
            'user_id' => '6',

            'presupuesto_id' => '1',
            'factura_id' => 1,
            'proyecto_id' => 1,

        ]);
        Contrato::create([
            'usuario' => "Tertulio",
            'nombre' => "contrato 3",
            'descripcion' => '14785214',
            'user_id' => '1',

            'presupuesto_id' => '1',
            'factura_id' => 1,
            'user_id' => 1,

        ]);
    }
}
