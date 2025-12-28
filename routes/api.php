<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('buku')->group(function () {
    Route::get('/', [BukuController::class, 'index']);
    Route::get('{id}', [BukuController::class, 'show']);
    Route::post('/', [BukuController::class, 'store']);
    Route::put('{id}', [BukuController::class, 'update']);
    Route::delete('{id}', [BukuController::class, 'destroy']);
});

// route::apiResource('buku', BukuController::class);

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy']);

    Route::post('login', [UserController::class, 'login']);
});

Route::apiResource('booking', BookingController::class);