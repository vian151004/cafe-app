<?php

use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\MenuController as V1MenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);

    Route::middleware('auth:sanctum')->group(function () {
    
        Route::post('/logout', [AuthController::class, 'logout']);
        
        // Contoh penggunaan ability jika sudah didaftarkan di Kernel/Bootstrap
        // Route::get('/orders', [OrderController::class, 'index'])
        //     ->middleware('ability:kasir,admin');
            
    Route::get('/menu', [V1MenuController ::class, 'getKatalog']);
    });
});
