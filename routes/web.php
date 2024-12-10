<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/beli-produk', [TransaksiController::class, 'beliProduk'])->name('beli_produk');
Route::post('/beli-produk', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/top-products', [ProdukController::class, 'topProducts'])->name('top_products');

Route::get('/history', [TransaksiController::class, 'history'])->name('history');
Route::get('/', function () {
    return view('basepage');
});