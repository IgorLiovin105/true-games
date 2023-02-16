<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;

Route::get('/', [CatalogController::class, 'index'])->name('main');
Route::get('/detail/{id}', [CatalogController::class, 'detail'])->name('detail');
Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'pages.login')->name('login');
    Route::view('/register', 'pages.register')->name('register');
    Route::post('/register-process', [AuthController::class, 'register'])->name('registerProcess');
    Route::post('/login-process', [AuthController::class, 'login'])->name('loginProcess');
});
Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'pages.profile')->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cart', [CatalogController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart', [CatalogController::class, 'addToCart'])->name('addToCart');
    Route::get('/change-quantity/{id}/{method}', [CatalogController::class, 'changeQuantity'])->name('changeQuantity');
    Route::get('/delete-from-cart/{id}', [CatalogController::class, 'deleteFromCart'])->name('deleteFromCart');
});
Route::middleware(['admin'])->group(function () {
    Route::view('/admin/create-product', 'admin.create-product')->name('createProductPage');
    Route::post('/admin/create-product', [AdminController::class, 'createProduct'])->name('createProduct');
});
