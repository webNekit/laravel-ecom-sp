<?php

use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

// Открытие главной страницы
Route::get('/', [HomeController::class, 'index'])->name('page.home');