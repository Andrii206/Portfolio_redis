<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
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
        $post = Cache::get('posts:' . $id);
        return inertia('Post/Show', compact('post'));
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        $post = Post::create($data);
        $posts = Cache::get('posts:all', collect());
        $posts->push($post);
        Cache::put('posts:all', $posts);
        Cache::put('posts:' . $post->id, $post);
        return inertia('Post/Index', compact('posts'));
    }

public function delete($id)
{

    $post = Post::find($id);

    $post->delete();

    $cachedPosts = Cache::get('posts:all', collect());

    $updatedPosts = $cachedPosts->reject(function ($cachedPost) use ($id) {
        return $cachedPost->id == $id;
    });

    Cache::put('posts:all', $updatedPosts);
    $posts = Cache::get('posts:all');
    Cache::forget('posts:' . $id);
    return inertia('Post/Index', [
        'posts' => $posts,
    ]);

}
    

    public function create()
    {
        return inertia('Post/Create');
    }
}
