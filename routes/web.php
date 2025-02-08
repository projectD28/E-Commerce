<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [PageController::class, 'index']);
Route::get('/detail_produk/{id}', [PageController::class, 'DetailProduk']);

Route::get('/show_cart/{id}', [OrdersController::class, 'ShowCart']);
Route::post('/cart', [OrdersController::class, 'ChartProduct']);
Route::post('/cart_delete', [OrdersController::class, 'ActionDelete']);
Route::get('/total_item/{id}', [OrdersController::class, 'CountQtyProduct']);

Route::get('/checkout/{id}', [OrdersController::class, 'PageCheckout']);
Route::post('/checkout_proses', [OrdersController::class, 'Checkout']);

Route::prefix('admin')->group(function () {
    Route::get('/daftar_produk', [ProdukController::class, 'index']);
    Route::get('/tambah_produk', [ProdukController::class, 'PageTambahProduk']);
    Route::post('/action_tambah_produk', [ProdukController::class, 'Store']);
    Route::get('/ubah_produk/{id}', [ProdukController::class, 'PageUbahProduk']);
    Route::put('/action_ubah_produk/{id}', [ProdukController::class, 'Edit']);
    Route::delete('/action_delete', [ProdukController::class, 'Delete']);
});

// Route::get('/dashboard', [Dashboard::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
