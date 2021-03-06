<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-products', [\App\Http\Controllers\ProductsController::class, 'getAll'])->name('api-getAll');
Route::put('save-products', [\App\Http\Controllers\ProductsController::class, 'saveProduct'])->name('api-saveProduct');
Route::delete('delete-products/{id}', [\App\Http\Controllers\ProductsController::class, 'deleteProduct'])->name('api-deleteProduct');
Route::post('edit-products/{id}', [\App\Http\Controllers\ProductsController::class, 'editProduct'])->name('api-editProduct');