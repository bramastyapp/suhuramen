<?php

namespace App\Http\Livewire\Produk;

use App\Models\Produk as ModelsProduk;
use App\Models\ProdukKategori;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Produk extends Component
{
    protected $listeners = [
        'formClose',
        'formKategoriProdukOpen',
        'formKategoriClose',
        'produkTerhapus' => 'destroy'
    ];

    public $kategoriId;
    public $produkId;
    public $formVisible;
    public $formEdit; 
    public $formVisibleKategori;

    public function render()
    {
        $kategori_pilih = ProdukKategori::all();
        $kategori = $this->kategoriId ? ProdukKategori::where('id', $this->kategoriId)->get() : ProdukKategori::all();
        
        return view('livewire.produk.produk', [
            'kategori_pilih' => $kategori_pilih,
            'kategori' => $kategori,
        ]);
    }

    public function updateId($id)
    {
        $this->kategoriId = $id;
    }
    
    public function konfirmasiHapus($id)
    {
        $this->produkId = $id;
        $this->dispatchBrowserEvent('konfirmasi', [
            'action' => 'produkTerhapus'
        ]);
    }

    public function destroy()
    {
        $produk = ModelsProduk::where('id',$this->produkId)->first();
        if($produk->gambar)
        {
            Storage::disk('public')->delete($produk->gambar);
        }
        $produk->delete();

        $this->dispatchBrowserEvent('terkonfirmasi', [
            'text' => 'Produk telah dihapus.'
        ]);
    }

    public function formTambahOpen()
    {
        $this->formVisible = true;
        $this->formEdit = false;
    }
    public function formEditOpen($id)
    {
        $this->produkId = $id;
        $produk = ModelsProduk::find($id);
        $this->emit('editProduk', $produk);
        $this->formVisible = true;
        $this->formEdit = true;
    }

    public function formClose()
    {
        $this->formVisible = false;
        $this->formEdit = false;
    }
    
    public function formKategoriProdukOpen()
    {
        $this->formVisible = false;
        $this->formVisibleKategori = true;    
    }
    public function formKategoriClose()
    {
        $produk = ModelsProduk::find($this->produkId);
        $this->emit('editProduk', $produk);
        $this->formVisible = true;
        $this->formVisibleKategori = false;
    }
}
