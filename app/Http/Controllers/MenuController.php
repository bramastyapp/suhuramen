<?php

namespace App\Http\Controllers;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    public function index()
    {
        return view('admin.menu.noMeja');
    }
    public function meja($no_meja)
    {
        session()->put('no_meja', "MEJA $no_meja");
        return redirect('/');
    }
}
