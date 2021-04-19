<?php

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

Route::get('/productos/index', [\App\Http\Controllers\ProductsController::class, 'registerProducts'])->name('products.index');


Route::post('/productos/registrar', [\App\Http\Controllers\ProductsController::class, 'saveProduct'])->name('products.registrarProducto');