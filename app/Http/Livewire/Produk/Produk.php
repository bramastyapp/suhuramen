<?php

namespace App\Http\Livewire\Produk;

use App\Models\Produk as ModelsProduk;
use App\Models\ProdukKategori;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Produk extends Component
{
    protected $listeners = [
        'formClose',
        'produkTerhapus' => 'destroy'
    ];

    public $produkId;
    public $formVisible;
    public $formEdit;

    public function render()
    {
        $produk = ModelsProduk::all();
        $kategori = ProdukKategori::all();
        
        return view('livewire.produk.produk', [
            'datas' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function konfirmasiHapus($id)
    {
        $this->produkId = $id;
        $this->dispatchBrowserEvent('konfirmasi-hapus-show');
    }

    public function destroy()
    {
        $produk = ModelsProduk::where('id',$this->produkId)->first();
        if($produk->gambar)
        {
            Storage::disk('public')->delete($produk->gambar);
        }
        $produk->delete();

        $this->dispatchBrowserEvent('produk-terhapus');
    }

    public function formTambahOpen()
    {
        $this->formVisible = true;
        $this->formEdit = false;
    }
    public function formEditOpen($produkId)
    {
        $produk = ModelsProduk::find($produkId);
        $this->emit('editProduk', $produk);
        $this->formVisible = true;
        $this->formEdit = true;
    }

    public function formClose()
    {
        $this->formVisible = false;
        $this->formEdit = false;
    }
}
