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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get( '/diskon', [App\Http\Controllers\DiskonController::class, 'index'])->name('diskon.index');
Route::post( '/checkValidationDiscount', [App\Http\Controllers\DiskonController::class, 'checkValidationDiscount'])->name('diskon.check');

Route::post( '/barang', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
Route::put( '/barang/{id}', [App\Http\Controllers\BarangController::class, 'update'])->name('barang.update');
Route::delete( '/barang/{id}', [App\Http\Controllers\BarangController::class, 'destroy'])->name('barang.delete');

