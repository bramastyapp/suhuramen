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
            'nama' => 'Habis',
            'warna' => 'danger',
        ];
        $status[] = [
            'id' => 1,
            'nama' => 'Aktif',
            'warna' => 'success',
        ];
        $status_produk = [
            0 => [
                'id' => 0,
                'nama' => 'Tidak Aktif',
                'warna' => 'dark'
            ],
            1 => [
                'id' => 1,
                'nama' => 'Aktif',
                'warna' => 'success'
            ],
        ];

        return view('livewire.produk.status-produk', [
            'datas' => $produk, 
            'status' => $status, 
            'status_produk' => $status_produk, 
            'kategori' => $kategori
        ]);
    }

    public function updateStatus($id, $status)
    {
        $data = Produk::find($id);
        $data->status = $status;
        $data->save();
        // return back()->with('toast_success', 'Status berhasil diperbarui');
    }
    public function updateStatusProduk($id, $status)
    {
        $data = Produk::find($id);
        $data->status_produk = $status;
        $data->save();
        // return back()->with('toast_success', 'Status berhasil diperbarui');
    }
}
