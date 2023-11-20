<?php

namespace App\Http\Livewire\Produk;

use App\Models\Produk;
use App\Models\ProdukKategori;
use Livewire\Component;

class StatusProduk extends Component
{
    public function render()
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

        return view('livewire.produk.status-produk', ['datas' => $produk, 'status' => $status, 'kategori' => $kategori]);
    }

    public function updateStatus($id, $status)
    {        
        $data = Produk::find($id);
        $data->status = $status;
        $data->save();
        return back()->with('toast_success', 'Status berhasil diperbarui');
    }
}
