<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class MenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akses_daftar_menu') || Gate::denies('lihat_meja'), 403);
        
        return view('admin.menu.noMeja');
    }
    public function meja($no_meja)
    {
        session()->forget(['no_meja', 'pelunasan', 'customer']);
        session()->put('no_meja', "MEJA ".decrypt($no_meja));
        return redirect('/');
    }
    public function dashboard()
    {
        $user = Auth::user();
        // dd(Auth::user()->roles->pluck('name')->toArray());
        $roles = Role::all();
        return view('admin.beranda', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
}
