<?php

namespace App\Http\Livewire\ProdukKategori;

use App\Models\ProdukKategori;
use Livewire\Component;

class TambahKategori extends Component
{
    public $kode;
    public $nama;

    public function render()
    {
        return view('livewire.produk-kategori.tambah-kategori');
    }
    public function store()
    {
        $messages = [
            'required' => 'Bagian ini harus diisi.',
        ];
        $this->validate([
            'nama' => 'required|min:3',
            'kode' => 'required',
        ], $messages);

        ProdukKategori::create([
            'kode_kategori' => $this->kode,
            'nama_kategori' => $this->nama,
        ]);
        $this->emit('formKategoriClose');
    }
}
