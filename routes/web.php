<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

// Открытие главной страницы
Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/products/{id}', [ProductController::class, 'index'])->name('page.products');
Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('page.single-product');