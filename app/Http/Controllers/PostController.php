<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($point)
    {
        $post = Post::whereOr('title', $point)
            ->whereOr('slug', $point)
            ->first();

        abort_if(empty($post), 404);
        return view('blog.post', compact('post'));
    }
}
