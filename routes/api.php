<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::any('/home', [HomeController::class, 'home']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::controller(PostController::class)->group(function () {
    //     Route::get('/index', 'index');
    // });

    Route::middleware('gate')->prefix('post')->group(function () {
        Route::get('/index', [PostController::class, 'index'])->name('post.index');
        Route::get('/show', [PostController::class, 'show'])->name('post.show');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/delete/{userId}/{postId}', [PostController::class, 'destroy'])->name('post.delete');
    });
});
