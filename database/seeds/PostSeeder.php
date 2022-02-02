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
            $post->title = $faker->sentence(3);
            $post->img = 'placeholders/' . $faker->image('storage/app/public/placeholders', 600, 400, 'Posts', false);
            $post->body = $faker->paragraphs(5, true);
            $post->slug = Str::slug($post->title);
            $post->sub_title = $faker->sentence(5);
            $post->save();
        }
    }
}
