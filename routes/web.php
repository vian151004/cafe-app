<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cashier')->name('cashier.')->group(function () {
    Route::redirect('/', '/cashier/pesanan');

    Route::get('/pesanan', [CashierController::class, 'orders'])->name('orders');
    Route::get('/pesanan/create', [CashierController::class, 'orderCreate'])->name('order.create');
    Route::get('/menu', [CashierController::class, 'menu'])->name('menu');
    Route::get('/history', [CashierController::class, 'history'])->name('history');
    Route::get('/shift', [CashierController::class, 'shift'])->name('shift');
    Route::get('/profile', [CashierController::class, 'profile'])->name('profile');
});

Route::post('/logout', function () {
})->name('logout');
