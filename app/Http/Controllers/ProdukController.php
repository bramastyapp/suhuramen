<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukKategori;
use Illuminate\Http\Request;
// use Alert;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $kategori = ProdukKategori::all();

        return view('admin.produk.produk', ['datas' => $produk, 'kategori' => $kategori]);
    }
    public function create()
    {
        $data = ProdukKategori::all();
        return view('admin.produk.tambahProduk', ['kategori' => $data]);
    }
    public function store(Request $request)
    {
        Produk::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
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
        $data = Produk::find($id);
        $data->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
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
    public function status()
    {
        $produk = Produk::all();
        $kategori = ProdukKategori::all();
        $status[] = [
            'id' => 0,
            'nama' => 'Belum Dijual',
            'warna' => 'dark',
        ];
        $status[] = [
            'id' => 1,
            'nama' => 'Habis',
            'warna' => 'danger',
        ];
        $status[] = [
            'id' => 2,
            'nama' => 'Aktif',
            'warna' => 'success',
        ];

        return view('admin.produk.status', ['datas' => $produk, 'status' => $status, 'kategori' => $kategori]);
    }
    public function updateStatus($id, $status)
    {
        $data = Produk::find($id);
        $data->status = $status;
        $data->save();
        return back()->with('toast_success', 'Status berhasil diperbarui');
    }
}
