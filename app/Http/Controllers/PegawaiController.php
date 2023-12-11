<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class PegawaiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akses_karyawan') || Gate::denies('lihat_karyawan'), 403);
        return view('admin.karyawan.index');
    }
    public function aktivasi()
    {
        abort_if(Gate::denies('akses_karyawan') || Gate::denies('lihat_aktivasi_karyawan'), 403);
        return view('admin.karyawan.indexAktivasi');
    }
    public function management()
    {
        abort_if(Gate::denies('akses_user_management') || Gate::denies('lihat_user_management'), 403);
        return view('admin.karyawan.indexManagement');
    }
    public function user()
    {
        return view('admin.karyawan.userEdit');
    }
}
