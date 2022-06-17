<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\UserCheckMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

     Route::get('/admin',[HomeController::class,'index'])->name('admin');
     Route::get('/',[HomeController::class,'home'])->name('home');

    Route::prefix('product')->middleware(AdminCheckMiddleware::class)->group(function(){
        // product list
        Route::get('/',[AdminController::class,'product'])->name('product');
        // create product
        Route::get('/create-product',[AdminController::class,'createProduct'])->name('create-product');
        Route::post('/upload',[AdminController::class,'upload'])->name('upload');
        // edit product
        Route::get('/edit/{id}',[AdminController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[AdminController::class,'update'])->name('update');
        // delete product route
        Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete');
        // search product route
        Route::get('/search',[AdminController::class,'search'])->name('search');
        // order list
        Route::get('/order-list',[AdminController::class,'orderList'])->name('order-list');
        // deliver route
        Route::get('/deliver/{id}',[AdminController::class,'orderDeliver'])->name('deliver');
    });

    Route::middleware(UserCheckMiddleware::class)->group(function(){

        // add card route
         Route::post('/add-card/{id}',[HomeController::class,'addCard'])->name('add-card');
        // show cart
         Route::get('/show-cart',[HomeController::class,'showCart'])->name('show-cart');
        // cart delete
         Route::get('/cart-delete/{id}',[HomeController::class,'cartDelete'])->name('cart-delete');
        // order route
         Route::post('/order',[HomeController::class,'order'])->name('order');
    });




