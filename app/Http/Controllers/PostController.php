<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show($point)
    {
        $post = Post::where('slug', $point)
            ->orWhere('title', $point)
            ->first();
        abort_if(empty($post), 404);
        return view('blog.post', compact('post'));
    }
}
