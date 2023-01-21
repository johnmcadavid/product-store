<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'products'], function () {
    Route::get('index', [ProductController::class, 'index'])->name('products.index');
    Route::get('detail/id/{id}', [ProductController::class, 'detail'])->name('products.detail');
    Route::get('create', [ProductController::class, 'create'])->name('products.create');
    Route::get('edit/{id}', [ProductController::class, 'create'])->name('products.edit');
    Route::post('save', [ProductController::class, 'save'])->name('products.save');
});

Route::group(['prefix' => 'sales'], function () {
    Route::get('index', [SaleController::class, 'index'])->name('sales.index');
    Route::get('detail/id/{id}', [SaleController::class, 'detail'])->name('sales.detail');
    Route::get('create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('save', [SaleController::class,  'save'])->name('sales.save');
});
