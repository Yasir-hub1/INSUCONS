<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materiales')->insert([
            'nombre' => 'cemento',
            'descripcion' => 'Es un material conglomerante que consiste en una mezcla de caliza y arcilla, calcinadas, molidas y luego mezcladas con yeso, cuya principal propiedad es la de endurecerse al entrar en contacto con el agua.',
            'costo' => '50.00',
            'stock' => '1000',
            'medida_id' => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Ladrillo',
            'descripcion' => 'Está hecho de una mezcla arcillosa, cocida hasta retirarle la humedad y endurecerla hasta que obtiene su característica forma rectangular y su color anaranjado. Duros y frágiles,',
            'costo' => '1.88',
            'stock' => '100000',
            'medida_id' => '8',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Vidrio',
            'descripcion' => 'Producto de la fusión de carbonato de sodio (Na2CO3), arena de sílice (SiO2) y caliza (CaCO3) a unos 1500 °C, este material duro, frágil y transparente.
             ya que es idóneo para las ventanas: deja pasar la luz, pero no el aire ni el agua',
            'costo' => '250',
            'stock' => '500',
            'medida_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Aluminio',
            'descripcion' => 'Es uno de los metales más abundantes de la corteza terrestre. No tiene demasiada resistencia mecánica, pero aun así es idóneo para aplicaciones como en la carpintería y en aleaciones más resistentes para materiales de plomería y de cocina.',
            'costo' => '1000',
            'stock' => '500',
            'medida_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Arena gruesa y arena fina',
            'descripcion' => 'Es importante que sepas que la arena gruesa debe estar libre de polvo o sales, Sus partículas pueden llegar hasta un tamaño máximo de 5 mm. Por ningún motivo debes utilizar arena de mar. Sus partículas deben tener un tamaño máximo de 1 mm',
            'costo' => '280',
            'stock' => '100',
            'medida_id' => '9',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Hormigón',
            'descripcion' => 'Está compuesto por una mezcla de arena gruesa y piedra chancada en proporciones similares. Su costo es más barato que comprar los dos elementos por separado, pero su uso está restringido a concretos de baja resistencia, como cimientos y falsos pisos.',
            'costo' => '1000',
            'stock' => '1000',
            'medida_id' => '9',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Ladrillos para techos',
            'descripcion' => 'Este ladrillo se usa para aligerar el peso de los techos. Por lo general, mide 30 cm de ancho por 30 cm de largo. Su altura dependerá del grosor del techo: existen ladrillos de 12 cm, 15 cm y 20 cm.',
            'costo' => '2.5',
            'stock' => '10000',
            'medida_id' => '8',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Alambre aislado Nº 10',
            'descripcion' => 'Rollo de 100 metros, 100 % cobre ideal para instalaciones electricas domiciliarias',
            'costo' => '500',
            'stock' => '10000',
            'medida_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('materiales')->insert([
            'nombre' => 'Alambre aislado Nº 12',
            'descripcion' => 'Rollo de 100 metros, 100 % cobre ideal para instalaciones electricas domiciliarias',
            'costo' => '400',
            'stock' => '10000',
            'medida_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
