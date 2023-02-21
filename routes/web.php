<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\RepairController;

// public routes
Route::get('/', [CatalogController::class, 'index'])->name('main');
Route::get('/catalog/{id}', [CatalogController::class, 'category'])->name('category');
Route::get('/detail/{id}', [CatalogController::class, 'detail'])->name('detail');

// routes for quest
Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'pages.login')->name('login');
    Route::view('/register', 'pages.register')->name('register');
    Route::post('/register-process', [AuthController::class, 'register'])->name('registerProcess');
    Route::post('/login-process', [AuthController::class, 'login'])->name('loginProcess');
});

// routes for auth user
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profilePage'])->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cart', [CatalogController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart', [CatalogController::class, 'addToCart'])->name('addToCart');
    Route::get('/change-quantity/{id}/{method}', [CatalogController::class, 'changeQuantity'])->name('changeQuantity');
    Route::get('/delete-from-cart/{id}', [CatalogController::class, 'deleteFromCart'])->name('deleteFromCart');
    Route::view('/user-check', 'pages.user-check')->name('userCheck');
    Route::post('/make-repair', [RepairController::class, 'makeRepair'])->name('makeRepair');
    Route::get('/repair/{id}', [RepairController::class, 'repair'])->name('repair');
    Route::get('/cancel-repair/{id}', [RepairController::class, 'cancelRepair'])->name('cancelRepair');
});

// routes for admin
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/create-product', [AdminController::class, 'createProductPage'])->name('createProductPage');
    Route::post('/admin/create-product', [AdminController::class, 'createProduct'])->name('createProduct');
    Route::get('/admin/delete-product/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('/admin/repairs', [AdminController::class, 'repairsPage'])->name('repairsPage');
    Route::get('/admin/cancel-repair-form/{id}', [AdminController::class, 'cancelRepairPage'])->name('cancelRepairPage');
    Route::post('/admin/cancel-repair-process', [AdminController::class, 'cancelRepair'])->name('cancelRepairProcess');
});
