<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
})->name('home');

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);
Route::get('/login', function () {
    return view('home');
})->name('login'); 

// Routes related to blog posts
Route::post('/create-post', [PostController::class, 'createPost']);

Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);

Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);

Route::delete('/edit-post/{post}', [PostController::class, 'deletePost']);
