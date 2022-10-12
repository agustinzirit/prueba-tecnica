<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Auth::routes();

Route::get("/", function() {
    return redirect('/home');
});

Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::get('/order/{id}/detail', [OrderController::class, 'show'])->name('order.resume');

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order.list');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
