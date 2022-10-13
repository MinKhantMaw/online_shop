<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\UserCheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/product', [ProductController::class, 'index'])->name('admin');
Route::get('/', [ProductController::class, 'home'])->name('home');

Route::prefix('product')->middleware(AdminCheckMiddleware::class)->group(function () {
    // product list
    Route::get('/', [AdminController::class, 'product'])->name('product');
    // create product
    Route::get('/create-product', [AdminController::class, 'createProduct'])->name('create-product');
    Route::post('/upload', [AdminController::class, 'upload'])->name('upload');
    // edit product
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    // delete product route
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');

    //products detail route
    Route::get('/details/{id}', [AdminController::class, 'details'])->name('details');

    // search product route
    Route::get('/search', [AdminController::class, 'search'])->name('search');
    // order list
    Route::get('/order-list', [OrderController::class, 'orderList'])->name('order-list');
    // deliver route
    Route::get('/deliver/{id}', [OrderController::class, 'orderDeliver'])->name('deliver');
});

Route::middleware(UserCheckMiddleware::class)->group(function () {

    // add card route
    Route::post('/add-card/{id}', [ProductController::class, 'addCard'])->name('add-card');
    // show cart
    Route::get('/show-cart', [ProductController::class, 'showCart'])->name('show-cart');
    // cart delete
    Route::get('/cart-delete/{id}', [ProductController::class, 'cartDelete'])->name('cart-delete');
    // order route
    Route::post('/order', [ProductController::class, 'order'])->name('order');
});

Route::prefix('/user')->name('user.')->group(function () {
    // user list
    Route::get('/list', [\App\Http\Controllers\UserController::class, 'index'])->name('list');
    Route::get('/detail/{id}', [\App\Http\Controllers\UserController::class, 'detail'])->name('detail');
});
