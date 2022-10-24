<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
    Important
*/
Route::resource('posts', PostController::class);

Route::post('comments/{postid}', [CommentController::class,'store'])->name('comments.store');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

