<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/auth.php';

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/posts/{post}/like', [PostLikeController::class, 'like'])->name('posts.like');
Route::delete('/posts/{post}/unlike', [PostLikeController::class, 'unlike'])->name('posts.unlike');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/indev', function () {
    return view('layouts.indev');
});
Route::get('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

