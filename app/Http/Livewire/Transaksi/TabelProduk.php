<?php

namespace App\Http\Livewire\Transaksi;

use App\Facades\Cart;
use App\Models\Produk;
use Illuminate\Support\Collection;
use Livewire\Component;

class TabelProduk extends Component
{   
    public $query;
    public $search_results;

    public function mount() {
        $this->query = '';
        $this->search_results = Collection::empty();
    }

    public function render() {
        return view('livewire.transaksi.tabel-produk');
    }

    public function updatedQuery() {
        $this->search_results = Produk::where('nama','like','%'.$this->query.'%')->get();
    }

    public function resetQuery() {
        $this->query = '';
        $this->search_results = Collection::empty();
    }

    public function selectProduct(int $id) {
        Cart::add(Produk::where('id', $id)->first());
        $this->emit('CartDitambahkan');
    }
}
