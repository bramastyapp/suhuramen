<?php

namespace App\Http\Controllers;

use App\Models\ProdukKategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = ProdukKategori::all();
        return view('admin.produk.kategori.kategori', ['datas' => $data]);
    }
    public function store(Request $request)
    {
        ProdukKategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('adm/produk-kategori')->with('success', 'Kategori baru berhasil disimpan!');
    }
    public function show($id)
    {
        $data = ProdukKategori::find($id);
        return view('admin.produk.kategori.editKategori', ['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $data = ProdukKategori::find($id);
        $data->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('adm/produk-kategori')->with('success', 'Kategori baru berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $data = ProdukKategori::find($id);
        $data->delete();
        return redirect('adm/produk-kategori')->with('info', 'Data berhasil dihapus!');
    }
}
