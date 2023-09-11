<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::latest();

        // if (request('search')) {
        //     $posts
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->get(), // get all posts with its corresposnding category
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        // $path = __DIR__ . "/../resources/posts/{$slug}.html";

        // if (!file_exists($path)) {
        //     return redirect('/');
        // }

        // $post = cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));

        // $post = Post::findOrFail($id);

        // $post = file_get_contents($path);

        return view('post', ['post' => $post]);
    }
}
