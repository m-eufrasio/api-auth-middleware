<?php
/*
 * Copyright 2024 Matheus Eufrásio
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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
        Route::delete('/delete/{postId}', [PostController::class, 'destroy'])->name('post.delete');
    });
});
