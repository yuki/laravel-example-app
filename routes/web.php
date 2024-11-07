<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::permanentRedirect('/', '/posts');

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
