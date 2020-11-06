<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use App\User;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<20; $i++) {
            $user = User::inRandomOrder()->first();
            $tag = Tag::inRandomOrder()->first();
            $newPost = new Post;
            $newPost->user_id = $user->id;
            $newPost->tags = $tag->name;
            $newPost->title = $faker->sentence(6, true);
            $newPost->content = $faker->paragraph(10, true);
            $newPost->published = rand(0,1);
            $newPost->save();
        }
    }
}
