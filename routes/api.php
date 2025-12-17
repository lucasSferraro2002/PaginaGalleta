<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FortuneController;

Route::prefix('fortunes')->group(function () {
    Route::get('/', [FortuneController::class, 'index']);
    Route::get('/random', [FortuneController::class, 'random']);
    Route::post('/', [FortuneController::class, 'store'])->middleware('auth:sanctum');
    Route::put('/{id}', [FortuneController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{id}', [FortuneController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::get('/stats', [FortuneController::class, 'stats'])->middleware('auth:sanctum');
