<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hello', function(){
//     return view('hello');
// });

// Cara 1
// Route::get('hello', 'App\Http\Controllers\HelloController@index');
// Cara 2
// Route::get('hello', [HelloController::class, 'index']);
// Route::get('word', [HelloController::class, 'word_message']);
// Route::post('hello', [HelloController::class, 'create']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');