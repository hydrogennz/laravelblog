<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        \App\Article::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 15; $i++) {
           \App\Article::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraphs($nb = 4, $asText = true),
                'author' => $faker->name,
                'num_views' => $faker->randomNumber($nbDigits = 4),
                'publish_state' => $faker->boolean,
                'publish_date' => ($faker->dateTimeThisYear($max = 'now'))->format('c')
            ]);
        }
    }
}
