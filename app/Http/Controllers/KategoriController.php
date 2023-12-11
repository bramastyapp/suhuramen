<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class KategoriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akses_produk') || Gate::denies('lihat_kategori'), 403);

        return view('admin.produk.kategori.kategori');
    }

}
