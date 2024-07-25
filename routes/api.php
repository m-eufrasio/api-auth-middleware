<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('/home', [HomeController::class, 'home']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });

    // Route::controller(PostController::class)->group(function () {
    //     Route::get('/index', 'index');
    // });

    Route::middleware('gate')->prefix('post')->group(function () {
        Route::get('/index', [PostController::class, 'index'])->name('post.index');
        Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/delete/{userId}/{postId}', [PostController::class, 'destroy'])->name('post.delete');
    });
});
