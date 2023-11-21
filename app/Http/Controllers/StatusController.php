<?php

namespace App\Http\Controllers;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {    
        return view('admin.produk.status');
    }
}
