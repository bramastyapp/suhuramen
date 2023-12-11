<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Gate;

class TransaksiController extends Controller
{   
    public function index()
    {
        abort_if(Gate::denies('akses_transaksi') || Gate::denies('lihat_daftar_transaksi'), 403);
        return view('admin.transaksi.transaksi');
    }
    public function create()
    {
        abort_if(Gate::denies('akses_transaksi') || Gate::denies('lihat_transaksi'), 403);
        $produk = Produk::all();
        return view('admin.transaksi.tambahTransaksi', ['produk' => $produk]);
    }
    public function antrian()
    {
        abort_if(Gate::denies('akses_transaksi') || Gate::denies('lihat_antrian_transaksi'), 403);
        return view('admin.transaksi.antrianTransaksi');
    }
    public function laporan_transaksi()
    {
        abort_if(Gate::denies('akses_laporan') || Gate::denies('lihat_laporan'), 403);
        return view('admin.transaksi.laporanTransaksi');
    }
}
