<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $numUsers = 5;
        $numCategories = 10;
        $numPosts = 30;
        $maxCommentsPerPost = 10;

        $users = User::factory($numUsers)->create();
        $categories = Category::factory($numCategories)->create();

        for ($i=0; $i<$numPosts; $i++){
            $user = rand(0, $numUsers-1);
            $category = rand(0, $numCategories-1);

            $post = Post::factory()->create([
                'user_id' => $users[$user]->id,
                'category_id' => $categories[$category]->id
            ]);

            Comment::factory(rand(0, $maxCommentsPerPost))->create([
                'post_id' => $post
            ]);
        }
    }

}
