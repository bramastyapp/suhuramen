<?php

namespace App\Http\Livewire\ProdukKategori;

use App\Models\ProdukKategori;
use Livewire\Component;

class EditKategori extends Component
{
    protected $listeners = [
        'updateKategori' => 'show'
    ];

    public $kategoriId;
    public $kode;
    public $nama;
    
    public function render()
    {
        return view('livewire.produk-kategori.edit-kategori');
    }

    public function show($kategori)
    {
        $this->kategoriId = $kategori['id'];
        $this->kode = $kategori['kode_kategori'];
        $this->nama = $kategori['nama_kategori'];
    }

    public function update()
    {
        $messages = [
            'required' => 'Bagian ini harus diisi.',
        ];
        $this->validate([
            'nama' => 'required|min:3',
            'kode' => 'required',
        ], $messages);
        
        ProdukKategori::find($this->kategoriId)->update([
            'kode_kategori' => $this->kode,
            'nama_kategori' => $this->nama,
        ]);
        $this->emit('formKategoriClose');
    }
}
