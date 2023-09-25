<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::truncate();
        \App\Models\Article::unguard();

        $faker = \Faker\Factory::create();

        \App\Models\User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                \App\Models\Article::create([
                    'user_id' => $user->id,
                    'title'   => $faker->sentence,
                    'content' => $faker->paragraphs(3, true),
                ]);
            }
        });
    }
    
}
