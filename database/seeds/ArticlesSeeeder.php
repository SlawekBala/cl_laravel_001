<?php

use Illuminate\Database\Seeder;

class ArticlesSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pl_PL');

        for($i = 0; $i < 200; $i++) {
            $article = new \App\Article();
            $article->title = $faker->firstName;
            $article->body = $faker->sentence(20);
            $article->save();
        }
    }
}
