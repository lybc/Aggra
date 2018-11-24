<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
//        $categories = Category::with('allChildren')->where('parent_id', 0)->get();
        $posts = Post::published()->orderByDesc('created_at')->paginate();
        return view('blog.category', compact('posts'));
    }


    public function chooseCategory(Category $category)
    {
        $posts = $category->posts()->published()->orderByDesc('created_at')->paginate();
        return view('blog.category', compact('posts', 'category'));
    }
}
