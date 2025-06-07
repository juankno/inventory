<?php

use Illuminate\Support\Facades\Route;


Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/user', [\App\Http\Controllers\AuthController::class, 'user']);
});
