<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::permanentRedirect('/', '/posts');

Route::resources([
    'posts' => PostController::class,
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
