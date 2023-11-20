<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
