<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\User;
use Illuminate\Http\Request;
// use Alert;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    
    public function index()
    {
        $produk = Produk::all();
        $kategori = ProdukKategori::all();

        return view('admin.produk.produk', [
            'datas' => $produk,
            'kategori' => $kategori,
        ]);
    }
    public function create()
    {
        $data = ProdukKategori::all();
        return view('admin.produk.tambahProduk', ['kategori' => $data]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
        Produk::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'status' => $request->status
        ]);
        // Alert::success('Selamat!', 'Data berhasil ditambahkan');
        return redirect('adm/data-produk')->with('success', 'Data berhasil ditambahkan!');
    }
    public function show($id)
    {
        $kategori = ProdukKategori::all();
        $data = Produk::find($id);
        return view('admin.produk.editProduk', ['data' => $data, 'kategori' => $kategori]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
        $data = Produk::find($id);
        $data->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);
        return redirect('adm/data-produk')->with('success', 'Data berhasil diubah!');
    }
    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();
        return redirect('adm/data-produk')->with('info', 'Data berhasil dihapus!');
    }
}
