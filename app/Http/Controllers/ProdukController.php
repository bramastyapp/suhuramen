<?php

namespace App\Http\Controllers;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    
    public function index()
    {
        return view('admin.produk.produk');
    }
}
