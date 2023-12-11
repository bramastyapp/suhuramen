<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransaksiController;
use App\Http\Livewire\Pembeli\Cart;
use App\Http\Livewire\Pembeli\Pelunasan;
use App\Http\Livewire\Pembeli\Produk;
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

// Pembeli
Route::middleware('pembayaran')->group(function(){
    Route::get('/', Produk::class);
    Route::get('/keranjang', Cart::class);
});
Route::get('/pembayaran', Pelunasan::class);
Route::get('/meja/{id}', [MenuController::class, 'meja']);

//Admin
Route::middleware('auth', 'pegawai_aktif')->group(function () {

    Route::get('/adm', function () {
        return redirect('/adm/login');
    });
    Route::get('/adm/meja', [MenuController::class, 'index']);
    Route::get('/adm/dashboard', [MenuController::class, 'dashboard']);
    Route::get('/adm/status', [StatusController::class, 'index']);

    //kategori
    Route::get('/adm/kategori', [KategoriController::class, 'index']);

    //produk
    Route::get('/adm/produk', [ProdukController::class, 'index']);

    //karyawan
    Route::get('/adm/user', [PegawaiController::class, 'user']);
    Route::get('/adm/aktivasi-karyawan', [PegawaiController::class, 'aktivasi']);
    Route::get('/adm/daftar-karyawan', [PegawaiController::class, 'index']);
    Route::get('/adm/user-management', [PegawaiController::class, 'management']);

    //transaksi
    Route::get('/adm/antrian', [TransaksiController::class, 'antrian']);
    Route::get('/adm/tambah-transaksi', [TransaksiController::class, 'create']);
    Route::get('/adm/daftar-transaksi', [TransaksiController::class, 'index']);
    Route::get('/adm/laporan-transaksi', [TransaksiController::class, 'laporan_transaksi']);
});
