<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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
Route::get('/', Produk::class);

//Admin
Route::get('/adm', function(){
    return view('admin.beranda');
});
//Kelola Produk Kategori
Route::get('/adm/produk-kategori', [KategoriController::class, 'index']);
Route::post('/adm/produk-kategori', [KategoriController::class, 'store']);
Route::get('/adm/produk-kategori/{id}/edit', [KategoriController::class, 'show']);
Route::patch('/adm/produk-kategori/{id}', [KategoriController::class, 'update']);
Route::get('/adm/produk-kategori/{id}', [KategoriController::class, 'destroy']);

//Kelola Produk
Route::get('/adm/data-produk', [ProdukController::class, 'index']);
Route::post('/adm/produk', [ProdukController::class, 'store']);
Route::get('/adm/produk/tambah-data', [ProdukController::class, 'create']);
Route::get('/adm/produk/status', [ProdukController::class, 'status']);
Route::get('/adm/produk/status/{id}/{status}', [ProdukController::class, 'updateStatus']);
Route::get('/adm/produk/{id}/edit', [ProdukController::class, 'show']);
Route::patch('/adm/produk/{id}', [ProdukController::class, 'update']);
Route::get('/adm/produk/{id}', [ProdukController::class, 'destroy']);

//Kelola Transaksi
Route::get('/adm/data-transaksi', [TransaksiController::class, 'index']);
Route::get('/adm/transaksi/tambah', [TransaksiController::class, 'create']);
