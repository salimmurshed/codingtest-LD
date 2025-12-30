<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ShortenUrlController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected route example
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/users', [AuthController::class, 'userlist']);
    Route::get('/urls', [ShortenUrlController::class, 'index']);
    Route::post('/shorter', [ShortenUrlController::class, 'shortenUrl']);
    Route::get('/url', [ShortenUrlController::class, 'getUrl']);
});
