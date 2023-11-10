<?php

namespace App\Http\Livewire\Transaksi;

use App\Facades\Cart;
use App\Models\Produk;
use Illuminate\Support\Collection;
use Livewire\Component;

class ProdukCart extends Component
{
    protected $listeners = [
        'CartDitambahkan' => 'updateCart',
    ];

    public $bayar;
    public $cart;
    public $totalTransaksi = 0;
    public function mount()
    {
        $this->cart = Cart::get();
        $this->hitung();
    }

    public function render()
    {
        $data = $this->cart;
        return view('livewire.transaksi.produk-cart', ['carts' => $data]);
    }

    public function updateCart()
    {
        $this->cart = Cart::get();
        $this->hitung();
    }
    public function clear()
    {
        Cart::clear();
        $this->updateCart();
    }
    public function qtyPlus(int $id)
    {
        Cart::plus(Produk::where('id', $id)->first());
        $this->updateCart();
    }
    public function qtyMin(int $id)
    {
        Cart::minus(Produk::where('id', $id)->first());
        $this->updateCart();
    }
    public function hapusCartId(int $id)
    {
        Cart::remove($id);
        $this->updateCart();
    }
    public function hitung()
    {
        $cart = Cart::get();
        $this->totalTransaksi = 0;
        foreach ($cart['products'] as $i => $c) {
            $this->totalTransaksi += $c->harga * $cart['qty'][$i]['qty'];
        }
    }
    public function pembayaran($total)
    {
        Cart::clear();
        $this->updateCart();

        $kembali = $this->bayar - $total;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Pembayaran berhasil',
            'text' => "Jumlah Kembalian = Rp". number_format($kembali, 0, '', '.'),
        ]);
        $this->bayar = '';
    }
}
