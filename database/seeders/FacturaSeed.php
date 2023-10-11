<?php

namespace Database\Seeders;

use App\Models\Factura;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacturaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factura::create([
            'nit' => '14785214',
            'fecha' => date('Y-m-d H:i:s'),
            'total' => '10',
            'metodo_id' => '1',
        ]);
    }
}
