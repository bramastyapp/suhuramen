<?php

namespace App\Http\Livewire\Pembeli;

use App\Facades\Cart;
use App\Models\Produk as ModelsProduk;
use App\Models\ProdukKategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Livewire\Component;

class Produk extends Component
{
    public $id_user;
    public function mount(Request $request)
    {
        $this->id_user = $request->session()->get('no_meja');
    }
    public function render()
    {
        $kategori = ProdukKategori::all();
        $produk = ModelsProduk::all();
        return view('livewire.pembeli.produk', [
            'produk' => $produk,
            'kategori' => $kategori,
            'id_user' => $this->id_user,
        ]);
    }

    public function selectProduct($id_produk)
    {
        $data = Cart::get();
        $index_transaksi = array_search($this->id_user, array_column($data['transaksi'], 'id_user'));
        // dd($index_transaksi);
        if ($index_transaksi == false && $index_transaksi !== 0) {
            // dd('masuk');
            Transaksi::create([
                'id_user' => $this->id_user,
                'total' => 0,
                'bayar' => 0,
                'jenis' => 2,
                'status' => -1,
            ]);
            $transaksi = Transaksi::latest()->first();
            Cart::tambah_transaksi($transaksi->id, $this->id_user);
        }
        $produk = ModelsProduk::where('id', $id_produk)->first();
        Cart::add($produk, $this->id_user);
        $this->emit('produkDitambahkan');
    }
}
