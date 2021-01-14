<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre' => 'Marilyn Severiche Gomez',
            'direccion' => 'Av. alemana',
            'telefono' => '65423648',
            'correo' =>'marilyn@gmail.com',
        ]);
        Cliente::create([
            'nombre' => 'Ricardo Soto Perez',
            'direccion' => 'Radial 13',
            'telefono' => '78543169',
            'correo' =>'ricardo_soto@gmail.com',
        ]);
        Cliente::create([
            'nombre' => 'Pedro Canaza Quiroga',
            'direccion' => 'los lotes/b. fortaleza',
            'telefono' => '65237894',
            'correo' =>'pedrocan@gmail.com',
        ]);
    }
}
