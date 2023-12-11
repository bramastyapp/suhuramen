<?php

namespace App\Http\Livewire\Pembeli;

use App\Facades\Cart;
use App\Models\Produk as ModelsProduk;
use App\Models\ProdukKategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;

class Produk extends Component
{
    public $user_id;

    public function mount(Request $request)
    {
        $this->user_id = $request->session()->get('no_meja');
    }
    public function render()
    {
        $kategori = ProdukKategori::all();
        $produk = ModelsProduk::all();
        return view('livewire.pembeli.produk', [
            'produk' => $produk,
            'kategori' => $kategori,
            'user_id' => $this->user_id,
        ]);
    }

    public function selectProduct($produk_id)
    {
        $data = Cart::get();
        $index_transaksi = array_search($this->user_id, array_column($data['transaksi'], 'user_id'));

        if ($index_transaksi == false && $index_transaksi !== 0) {
            $uuid = Str::uuid();
            Transaksi::create([
                'total' => 0,
                'bayar' => 0,
                'jenis' => 2,
                'status' => -1,
                'meja' => $this->user_id,
                'customer' => $uuid,
            ]);
            $transaksi = Transaksi::where('customer', $uuid)->first();
            Cart::tambah_transaksi($transaksi->id, $this->user_id);
        }
        $produk = ModelsProduk::where('id', $produk_id)->first();
        Cart::add($produk, $this->user_id);
        $this->emit('produkDitambahkan');
        $this->dispatchBrowserEvent('alert-toast', [
            'text' => 'Produk ditambahkan.'
        ]);
    }
}
