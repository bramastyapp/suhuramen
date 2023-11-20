<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransaksiController;
use App\Http\Livewire\Pembeli\Cart;
use App\Http\Livewire\Pembeli\Produk;
use Illuminate\Support\Facades\Route;
use App\Models\UserPosisi;

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
Route::get('/keranjang', Cart::class);
Route::get('/adm/no-meja', [MenuController::class, 'index'])->middleware('hak_akses:1,2,3,4,5,6');
Route::get('/meja/{id}', [MenuController::class, 'meja']);

//Admin
Route::get('/adm/dashboard', function(){
    $posisi = UserPosisi::all();
    return view('admin.beranda', compact('posisi'));
})->middleware('auth');

//owner, superadmin, manager
Route::middleware(['hak_akses:1,2,3'])->group(function(){
    //kategori
    Route::get('/adm/produk-kategori', [KategoriController::class, 'index']);
    Route::post('/adm/produk-kategori', [KategoriController::class, 'store']);
    Route::get('/adm/produk-kategori/{id}/edit', [KategoriController::class, 'show']);
    Route::patch('/adm/produk-kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/adm/produk-kategori/{id}', [KategoriController::class, 'destroy']);

    //produk
    Route::get('/adm/data-produk', [ProdukController::class, 'index']);
    
    //karyawan
    Route::get('/adm/aktivasi-karyawan', [PegawaiController::class, 'aktivasi']);
});

// owner, superadmin, kasir
Route::middleware(['hak_akses:1,2,4'])->group(function(){
    //transaksi
    Route::get('/adm/data-transaksi', [TransaksiController::class, 'index']);
    Route::get('/adm/transaksi/tambah', [TransaksiController::class, 'create']);
    Route::get('/adm/antrian-pembeli', [TransaksiController::class, 'antrian']);
});

//owner, superadmin, manager, kasir, koki
Route::middleware(['hak_akses:1,2,3,4,5'])->group(function(){
    Route::get('/adm/status-produk', [StatusController::class, 'index']);
    Route::get('/adm/produk/status/{id}/{status}', [StatusController::class, 'updateStatus']);
});

//owner, superadmin
Route::middleware(['hak_akses:1,2'])->group(function(){
    Route::get('/adm/data-karyawan', [PegawaiController::class, 'index']);
});
Route::get('/adm/karyawan/management', [PegawaiController::class, 'management'])->middleware('hak_akses:1');

