<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Only show published posts
        $posts = Post::published()->latest('published_at')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        // Find post by slug, ensure it's published
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }
}
