<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();

        $faker = \Faker\Factory::create();
        $password = bcrypt('secret');

        \App\Models\User::create([
            'name'     => $faker->name,
            'email'    => 'graphql@test.com',
            'password' => $password,
        ]);

        for ($i = 0; $i < 10; ++$i) {
            \App\Models\User::create([
                'name'     => $faker->name,
                'email'    => $faker->email,
                'password' => $password,
            ]);
        }
    }
    
}
