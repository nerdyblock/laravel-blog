<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
// use App\Models\Category;

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

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(
                    ['search', 'category', 'author']
                )
            )->paginate(6)->withQueryString(), // get all posts with its corresposnding category
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

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }
}
