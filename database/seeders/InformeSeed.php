<?php

namespace Database\Seeders;

use App\Models\Informe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InformeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Informe::create([
            'titulo' => 'INFORME 1',
            'descripcion' => '1111111111111',
            'fecha' => date('Y-m-d H:i:s'),
            'proyecto_id'=>1


        ]);
        Informe::create([
            'titulo' => 'INFORME 2',
            'descripcion' => 'XDDXDXDXDXDD',
            'fecha' => date('Y-m-d H:i:s'),
            'proyecto_id'=>1


        ]);
    }
}
