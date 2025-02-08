<?php

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

Route::get('/admin_produk', [ProdukController::class, 'index'])->name('dashboard');
Route::get('/tambah_produk', [ProdukController::class, 'PageTambahProduk']);
Route::post('/action_tambah_produk', [ProdukController::class, 'Store']);
Route::get('/ubah_produk/{id}', [ProdukController::class, 'PageUbahProduk']);
Route::put('/action_ubah_produk/{id}', [ProdukController::class, 'Edit']);
// Route::get('/dashboard', [Dashboard::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
