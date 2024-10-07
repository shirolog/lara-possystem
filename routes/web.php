<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/category', [CategoryController::class, 'index'])
->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])
->name('category.store');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])
->name('category.edit');
Route::put('/category/edit/{category}', [CategoryController::class, 'update'])
->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])
->name('category.destroy');

Route::get('/brand', [BrandController::class, 'index'])
->name('brand.index');
Route::post('/brand', [BrandController::class, 'store'])
->name('brand.store');
Route::get('/brand/edit/{brand}', [BrandController::class, 'edit'])
->name('brand.edit');
Route::put('/brand/edit/{brand}', [BrandController::class, 'update'])
->name('brand.update');
Route::delete('/brand/{brand}', [BrandController::class, 'destroy'])
->name('brand.destroy');

Route::get('/product', [ProductController::class, 'index'])
->name('product.index');
Route::post('/product', [ProductController::class, 'store'])
->name('product.store');
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])
->name('product.edit');
Route::put('/product/edit/{product}', [ProductController::class, 'update'])
->name('product.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])
->name('product.destroy');