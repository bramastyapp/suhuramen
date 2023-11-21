<?php

namespace App\Http\Livewire\Produk;

use App\Models\Produk;
use App\Models\ProdukKategori;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahProduk extends Component
{
    use WithFileUploads;

    public $nama;
    public $kode;
    public $kategori;
    public $deskripsi;
    public $gambar;
    public $harga;
    
    public function render()
    {
        $kategori = ProdukKategori::all();
        return view('livewire.produk.tambah-produk', [
            'allKategori' => $kategori
        ]);
    }

    public function updateKode()
    {
        $kategori = ProdukKategori::find($this->kategori);
        $produk = count(Produk::where('kategori', $this->kategori)->get());

        if($this->kategori)
        {
            $this->kode = $kategori->kode_kategori . $produk+1;
        }else{
            $this->kode = "";
        }
    }

    public function store()
    {
        $messages = [
            'required' => ':attribute harus diisi.',
            'numeric'    => 'format :attribute harus angka.',
            'min'    => ':attribute tidak boleh kurang dari 3 karakter.',
            'image' => 'file yang di upload harus gambar.'
        ];
        $this->validate([
            'nama' => 'required|min:3',
            'kode' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            // 'gambar' => 'image|max:1024',
        ], $messages);

        $nama_gambar = '';

        if($this->gambar)
        {
            $nama_gambar = \Str::slug($this->nama, '-')
            . '-'
            . uniqid()
            . '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('public', $nama_gambar, 'local');

        }

        Produk::create([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'kategori' => $this->kategori,
            'deskripsi' => $this->deskripsi,
            'gambar' => $nama_gambar,
            'harga' => $this->harga,
            'status' => 0,
            'status_produk' => 0,
        ]);

        $this->nama = '';
        $this->kode = '';
        $this->kategori = '';
        $this->deskripsi = '';
        $this->gambar = '';
        $this->harga = '';

        $this->emit('formClose');
    }

}
