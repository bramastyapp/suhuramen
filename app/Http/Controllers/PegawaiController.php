<?php

namespace App\Http\Controllers;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    public function index()
    {
        return view('admin.karyawan.index');
    }
    public function aktivasi()
    {
        return view('admin.karyawan.indexAktivasi');
    }
    public function management()
    {
        return view('admin.karyawan.indexManagement');
    }
}
