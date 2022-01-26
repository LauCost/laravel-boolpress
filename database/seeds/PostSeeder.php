<?php

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 10; $i++) {
            $post = new Post;
            $post->title = $faker->sentence();
            $post->image = $faker->imageUrl(600, 400, 'Posts');
            $post->description = $faker->paragraphs(5, true);
            $post->author = $faker->name();
            $post->posted_at = $faker->date()->nullable();
            $post->save();
        }
    }
}