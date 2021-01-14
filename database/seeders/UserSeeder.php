<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'ci' => '13673797',
            'name' => 'Jose Luis Miranda',
            'direction' => 'los lotes/b. el triunfo',
            'phone' => '65047299',
            'email' => 'miranda.devel@gmail.com',
            'password' => Hash::make('12345678'),
            'active' => true,
            'type' => 'a',
        ]);
        User::create([
            'ci' => '12345678',
            'name' => 'Ronal Vargas Medrano',
            'direction' => 'Av. alemana',
            'phone' => '71234234',
            'email' => 'ronal@gmail.com',
            'password' => Hash::make('12345678'),
            'active' => true,
            'type' => 'a',
        ]);

        User::create([
            'ci' => '63643192',
            'name' => 'Maria Vasquez Revollo',
            'direction' => 'Av. centenario #385',
            'phone' => '60999452',
            'email' => 'li_vasq@hotmail.com',
            'password' => Hash::make('12345678'),
            'active' => true,
            'type' => 't',
        ]);

        User::create([
            'ci' => '89524615',
            'name' => 'Ademar Medrano Quinteros',
            'direction' => 'los lotes/b. 18 de julio',
            'phone' => '79521496',
            'email' => 'medrano_09@gmail.com',
            'password' => Hash::make('12345678'),
            'active' => true,
            'type' => 't',
        ]);
        User::create([
            'ci' => '32145674',
            'name' => 'Adriana Rivero Rojas',
            'direction' => 'la colorada #8026',
            'phone' => '78924316',
            'email' => 'rojas.rivero@hotmail.com',
            'password' => Hash::make('12345678'),
            'active' => true,
            'type' => 't',
        ]);
        User::create([
            'ci' => '89524615',
            'name' => 'Raul Aguilera Cruz',
            'direction' => 'los lotes/b. 18 de julio',
            'phone' => '61237852',
            'email' => 'raul_05_cruz@gmail.com',
            'password' => Hash::make('12345678'),
            'active' => true,
            'type' => 't',
        ]);
    }
}
