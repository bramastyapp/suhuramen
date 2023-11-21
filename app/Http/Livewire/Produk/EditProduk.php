<?php

namespace App\Http\Livewire\Produk;

use App\Models\Produk;
use App\Models\ProdukKategori;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduk extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'editProduk' => 'show'
    ];

    public $produkId;
    public $nama;
    public $kode;
    public $kategori;
    public $deskripsi;
    public $gambar;
    public $gambarOld;
    public $harga;

    public function render()
    {
        $kategori = ProdukKategori::all();
        return view('livewire.produk.edit-produk', [
            'allKategori' => $kategori
        ]);
    }
    public function show($produk)
    {
        $this->produkId = $produk['id'];
        $this->nama = $produk['nama'];
        $this->kode = $produk['kode'];
        $this->kategori = $produk['kategori'];
        $this->deskripsi = $produk['deskripsi'];
        $this->harga = $produk['harga'];
        if ($produk['gambar']) {
            $this->gambarOld = asset('/storage/' . $produk['gambar']);
        }
        // dd($this->gambarOld);
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

    public function update()
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

        $produk = Produk::find($this->produkId);
        $nama_gambar = '';

        if($this->gambar)
        {
            Storage::disk('public')->delete($produk->gambar);
            $nama_gambar = \Str::slug($this->nama, '-')
            . '-'
            . uniqid()
            . '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('public', $nama_gambar, 'local');
        }else{
            $nama_gambar = $produk->gambar;
        }

        $produk->update([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'kategori' => $this->kategori,
            'deskripsi' => $this->deskripsi,
            'gambar' => $nama_gambar,
            'harga' => $this->harga,
        ]);
        $this->emit('formClose');
    }
}
