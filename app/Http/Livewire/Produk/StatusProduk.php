<?php

namespace App\Http\Livewire\Produk;

use App\Models\Produk;
use App\Models\ProdukKategori;
use Livewire\Component;

class StatusProduk extends Component
{
    public $kategoriId;

    public function render()
    {
        $kategori = $this->kategoriId ?  ProdukKategori::where('id', $this->kategoriId)->get() : ProdukKategori::all();        
        $kategori_pilih = ProdukKategori::all();        

        $status = [
            0 => [
                'id' => 0,
                'nama' => 'Habis',
                'warna' => 'danger',
            ],
            1 => [
                'id' => 1,
                'nama' => 'Aktif',
                'warna' => 'success',
            ]
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
            'kategori' => $kategori,
            'kategori_pilih' => $kategori_pilih,
            'status' => $status, 
            'status_produk' => $status_produk, 
        ]);
    }
    public function updateId($id)
    {
        $this->kategoriId = $id;
    }

    public function updateStatus($id, $status)
    {
        $data = Produk::find($id);
        $data->status = $status;
        $data->save();
    }

    public function updateStatusProduk($id, $status)
    {
        $data = Produk::find($id);
        $data->status_produk = $status;
        $data->save();
    }
}
