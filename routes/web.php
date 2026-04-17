<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cashier')->name('cashier.')->group(function () {
    Route::redirect('/', '/cashier/pesanan');
    
    Route::get('/pesanan', function () {
        return view('cashier.orders');
    })->name('orders');
    
    Route::get('/pesanan/create', function () {
        return view('cashier.order-create');
    })->name('order.create');
    
    Route::get('/menu', function () {
        return view('cashier.menu');
    })->name('menu');
    
    Route::get('/history', function () {
        return view('cashier.history');
    })->name('history');
    
    Route::get('/shift', function () {
        return view('cashier.shift');
    })->name('shift');
    
    Route::get('/profile', function () {
        return view('cashier.profile');
    })->name('profile');
});

Route::post('/logout', function () {
})->name('logout');