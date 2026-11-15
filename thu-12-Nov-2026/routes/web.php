<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatigoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\DashboardController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Users
Route::get('/users', [UserController::class, 'index'])->name('listUsers');
Route::get('/userCreate', [UserController::class, 'create'])->name('createUser');
Route::post('/userStore', [UserController::class, 'store'])->name('storeUser');
Route::get('/user/{id}', [UserController::class, 'show'])->name('showUser');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('editUser');
Route::put('/user/{id}', [UserController::class, 'update'])->name('updateUser');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('deleteUser');

//categories
Route::get('/categories', [CatigoreController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CatigoreController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CatigoreController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CatigoreController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CatigoreController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CatigoreController::class, 'destroy'])->name('categories.destroy');

//Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

//orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

//sellers
Route::get('/sellers', [SellerController::class, 'index'])->name('sellers.index');
Route::get('/sellers/create', [SellerController::class, 'create'])->name('sellers.create');
Route::get('/sellers/{seller}', [SellerController::class, 'show'])->name('sellers.show');
Route::post('/sellers', [SellerController::class, 'store'])->name('sellers.store');
Route::get('/sellers/{seller}/edit', [SellerController::class, 'edit'])->name('sellers.edit');
Route::put('/sellers/{seller}', [SellerController::class, 'update'])->name('sellers.update');
Route::delete('/sellers/{seller}', [SellerController::class, 'destroy'])->name('sellers.destroy');


