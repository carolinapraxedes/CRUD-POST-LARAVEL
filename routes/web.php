<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use PhpParser\Node\Expr\PostInc;

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

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::any('/posts/search',[PostController::class,'search'])->name('posts.search');

Route::post('/posts/{id}',[CommentsController::class,'storeComment'])->name('posts.comment');
Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{id}',[PostController::class,'update'])->name('posts.update');

Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');
Route::delete('/posts/{id}',[PostController::class,'destroy'])->name('posts.destroy');



Route::get('/', function () {
    return view('welcome');
});
