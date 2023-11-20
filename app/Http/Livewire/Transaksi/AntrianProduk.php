<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\ItemTransaksi;
use App\Models\Produk;
use Illuminate\Support\Collection;
use Livewire\Component;

class AntrianProduk extends Component
{
    public $query;
    public $search_results;

    public function mount()
    {
        $this->query = '';
        $this->search_results = Collection::empty();
    }

    public function render()
    {
        return view('livewire.transaksi.antrian-produk');
    }

    public function updatedQuery()
    {
        $this->search_results = Produk::where('nama', 'like', '%' . $this->query . '%')->get();
    }

    public function resetQuery()
    {
        $this->query = '';
        $this->search_results = Collection::empty();
    }

    public function selectProduct($id)
    {
        $this->emit('productSelect', $id);
    }
}
