<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    
    public function index()
    {
        $kasir = User::all();
        $transaksi = Transaksi::all();
        return view('admin.transaksi.transaksi', compact('transaksi', 'kasir'));
    }
    public function create()
    {
        $produk = Produk::all();
        return view('admin.transaksi.tambahTransaksi', ['produk' => $produk]);
    }
    public function antrian()
    {
        return view('admin.transaksi.antrianTransaksi');
    }
}
