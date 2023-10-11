<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'ci' => '14785214',
            'name' => 'Admin',
            'telefono' => '+59178451236',
            'email' => 'admin@insucons.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Admin');

        User::create([
            'ci' => fake()->unique()->randomNumber(8, true),
            'name' => 'Mauricio Choque Nogales',
            'telefono' => fake()->e164PhoneNumber(),
            'email' => 'mauricio@insucons.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Empleado');



        User::create([
            'ci' => fake()->unique()->randomNumber(8, true),
            'name' => 'Kasandra Mamani Rodriguez',
            'telefono' => fake()->e164PhoneNumber(),
            'email' => 'kasandra@insucons.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Empleado');



        User::create([
            'ci' => fake()->unique()->randomNumber(8, true),
            'name' => 'Bill',
            'telefono' => fake()->e164PhoneNumber(),
            'email' => 'bill@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Cliente');
    }
}
