<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documento::create([
            'nombre' => 'LA MUERTE DE LOTSO',
            'url' => 'papaoso@gmail.com',
            "contrato_id"=>1

        ]);
        Documento::create([
            'nombre' => 'Expedientes X',
            'url' => 'papaoso@gmail.com',
            "contrato_id"=>3

        ]);
    }
}
