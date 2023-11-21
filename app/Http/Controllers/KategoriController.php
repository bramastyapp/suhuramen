<?php

namespace App\Http\Controllers;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    
    public function index()
    {
        return view('admin.produk.kategori.kategori');
    }

}
