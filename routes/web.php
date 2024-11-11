<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;

Route::permanentRedirect('/', '/posts');

Route::middleware(['auth'])->group(function () {
    Route::resources([
      'posts' => PostController::class,
    ]);
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
})->withoutMiddleware([Auth::class]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
