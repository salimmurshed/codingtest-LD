<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// use App\Http\Controllers\Api\ShortenUrlController;

Route::get('/login', function (Request $request) {
    return response()->json([
        'status' => 'success',
        'test' => 'Route is working without a controller',
        'received_email' => $request->input('email'),
        'timestamp' => now()->toDateTimeString()
    ]);
});
