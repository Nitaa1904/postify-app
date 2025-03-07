<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register_form']);
Route::post('/register', [AuthController::class, 'register']);


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');