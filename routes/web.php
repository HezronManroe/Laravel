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

Auth::routes();
Route::get( '/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get( '/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
