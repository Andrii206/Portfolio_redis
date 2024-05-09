<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::rememberForever('posts:all', function () {
            return Post::all();
        });
        return inertia('Post/Index', compact('posts'));
    }

    public function show($id)
    {
        $posts = Cache::get('posts:' . $id);
        dd($posts->title);
    }

    public function create()
    {
        return inertia('Post/Create', compact('cache'));
    }
}
