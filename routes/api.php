<?php

use Illuminate\Support\Facades\Route;


Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/user', [\App\Http\Controllers\AuthController::class, 'user']);

    Route::middleware('role:admin')->group(function () {
        Route::apiResource('products', \App\Http\Controllers\ProductController::class)->except(['index', 'show']);
        Route::apiResource('categories', \App\Http\Controllers\CategoryController::class)->except(['index', 'show']);
        Route::apiResource('users', \App\Http\Controllers\UserController::class);
    });

    Route::middleware('role:user,admin')->group(function () {

        Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index']);
        Route::get('categories/{id}', [\App\Http\Controllers\CategoryController::class, 'show']);

        Route::get('products', [\App\Http\Controllers\ProductController::class, 'index']);
        Route::get('products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
    });
});
