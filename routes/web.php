<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {



    return view('posts', [
        'posts' => Post::with('category')->get() // get all posts with its corresposnding category
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // if (!file_exists($path)) {
    //     return redirect('/');
    // }

    // $post = cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));

    // $post = Post::findOrFail($id);

    // $post = file_get_contents($path);

    return view('post', ['post' => $post]);
});

Route::get('category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
