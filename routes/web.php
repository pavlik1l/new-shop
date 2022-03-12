<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/cart', [CartController::class, 'index'])->name('showCart');
Route::get('/product/{cat}/{product_id}', [ProductController::class, 'show'])->name('showProduct');
Route::get('/category/{cat}', [ProductController::class, 'showCategory'])->name('showCategory');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
