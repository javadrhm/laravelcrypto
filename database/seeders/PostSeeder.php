<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'First Blog Post',
            'slug' => 'first-blog-post',
            'excerpt' => 'This is the excerpt for the first blog post.',
            'content' => 'This is the content of the first blog post.',
            'user_id' => 1, // Assuming user with ID 1 exists
            'status' => 'published',
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Second Blog Post',
            'slug' => 'second-blog-post',
            'excerpt' => 'This is the excerpt for the second blog post.',
            'content' => 'This is the content of the second blog post.',
            'user_id' => 1,
            'status' => 'draft',
        ]);
    }
}
