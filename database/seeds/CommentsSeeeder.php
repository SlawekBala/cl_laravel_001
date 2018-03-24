<?php

use Illuminate\Database\Seeder;

class CommentsSeeeder extends Seeder
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
            $comment = new \App\Comment();
            $comment->author = $faker->firstName;
            $comment->content = $faker->sentence(20);
            $comment->save();
        }
    }
}
