<?php

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


    $posts = Post::all();
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function ($id) {
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // if (!file_exists($path)) {
    //     return redirect('/');
    // }

    // $post = cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));

    $post = Post::findOrFail($id);

    // $post = file_get_contents($path);

    return view('post', ['post' => $post]);
});
