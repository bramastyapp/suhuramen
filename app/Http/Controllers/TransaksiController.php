<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi.transaksi');
    }
    public function create()
    {
        $produk = Produk::all();
        return view('admin.transaksi.tambahTransaksi', ['produk' => $produk]);
    }
}
