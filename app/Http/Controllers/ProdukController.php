<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class ProdukController extends Controller
{    
    public function index()
    {
        abort_if(Gate::denies('akses_produk') || Gate::denies('lihat_produk'), 403);
        
        return view('admin.produk.produk');
    }
}
