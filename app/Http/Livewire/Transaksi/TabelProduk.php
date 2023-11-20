<?php

namespace App\Http\Livewire\Transaksi;

use App\Facades\Cart;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TabelProduk extends Component
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
        $kasir = User::find(Auth::user()->id);
        // dd(Cart::get());
        return view('livewire.transaksi.tabel-produk', [
            'kasir' => $kasir,
        ]);
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

    public function selectProduct(int $id, int $idKasir)
    {
        $data = Cart::get();
        $index_transaksi = array_search($idKasir, array_column($data['transaksi'], 'id_user'));

        if ($index_transaksi == false && $index_transaksi !== 0) {
            Transaksi::create([
                'id_user' => $idKasir,
                'total' => 0,
                'bayar' => 0,
                'jenis' => 1,
                'status' => 0,
            ]);
            $transaksi = Transaksi::latest()->first();
            Cart::tambah_transaksi($transaksi->id, $idKasir);
        }
        $produk = Produk::where('id', $id)->first();
        Cart::add($produk, $idKasir);
        $this->emit('CartDitambahkan');
    }
}
