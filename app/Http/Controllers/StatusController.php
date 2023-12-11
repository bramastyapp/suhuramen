<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class StatusController extends Controller
{
    public function index()
    {    
        abort_if(Gate::denies('akses_daftar_menu') || Gate::denies('lihat_status_produk'), 403);
        
        return view('admin.produk.status');
    }
}
