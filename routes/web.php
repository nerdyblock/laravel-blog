<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentController;


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

Route::get('ping', function () {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us11'
    ]);

    //id = "19d9c01a3f"

    // $response = $mailchimp->lists->getList("19d9c01a3f");

    $response = $mailchimp->lists->addListMember("19d9c01a3f", [
        "email_address" => "lzz08245@zbock.com",
        "status" => "subscribed",
    ]);

    dd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('category/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'categories' => Category::all(),
//         'currentCategory' => $category
//     ]);
// });

// Route::get('author/{author:username}', function (User $author) {
//     return view('posts.index', [
//         'posts' => $author->posts,
//     ]);
// });

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
