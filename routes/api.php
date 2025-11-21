<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:api')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Route::resource('/posts', PostController::class);
    //Route::post('/posts/reorder', [PostController::class, 'reorder'])->name('posts.reorder');
});
