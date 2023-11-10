<?php

namespace App\Http\Livewire\Pembeli;

use App\Facades\Cart;
use App\Models\Produk as ModelsProduk;
use App\Models\ProdukKategori;
use Livewire\Component;

class Produk extends Component
{
    // public $cart;
    // public function mount()
    // {
    //     $this->cart = Cart::get();
    // }
    public function render()
    {
        $kategori = ProdukKategori::all();
        $produk = ModelsProduk::all();
        return view('livewire.pembeli.produk', compact('produk', 'kategori'));
    }
}
