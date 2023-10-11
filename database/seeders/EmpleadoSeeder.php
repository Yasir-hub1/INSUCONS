<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            'dni' => fake()->unique()->randomNumber(8, true),
            'nombre' => 'Andrea garcia chavez',
            'telefono' => fake()->e164PhoneNumber(),
            'direccion' => 'av.santos dummont/calle #2',
            'cargo' => 'arquitecta',
            'salario' => '4000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
