<?php

use App\Livewire\MenuKatalog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', MenuKatalog::class)->name('menu.katalog');
