<?php

namespace App\Http\Livewire\Transaksi;

use App\Facades\Cart;
use App\Models\ItemTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProdukCart extends Component
{
    protected $listeners = [
        'CartDitambahkan' => 'updateCart',
    ];
    public $user_id;
    public $index_transaksi;
    public $bayar;
    public $cart;
    public $totalTransaksi = 0;

    public function mount()
    {
        $this->cart = Cart::get();
        $this->inisialisasi();
        $this->hitung();
    }

    public function render()
    {
        $kasir = User::find($this->user_id);
        // dd($this->cart);
        $this->index_transaksi = array_search($this->user_id, array_column($this->cart['transaksi'], 'user_id'));
        return view('livewire.transaksi.produk-cart', ['carts' => $this->cart, 'kasir' => $kasir]);
    }

    public function inisialisasi()
    {
        $this->user_id = Auth::user()->id;
        $this->index_transaksi = array_search($this->user_id, array_column($this->cart['transaksi'], 'user_id'));
    }

    public function cartTotalUpdate()
    {
        if (!empty($this->cart['transaksi'])) {
            $data = Transaksi::find($this->cart['transaksi']['transaksi_id']);
            $data->update([
                'total' => $this->totalTransaksi,
                'bayar' => $this->bayar == null ? 0 : $this->bayar,
            ]);
        }
    }

    public function updateCart()
    {
        $this->cart = Cart::get();
        $this->index_transaksi = array_search($this->user_id, array_column($this->cart['transaksi'], 'user_id'));
        $this->hitung();
    }

    public function clear()
    {
        // dd($this->index_transaksi);
        if ($this->index_transaksi || $this->index_transaksi === 0) {
            // dd('masuk');
            Cart::clear($this->index_transaksi);
            $this->updateCart();
        }
        // dd('diluar');
        $this->bayar = null;
    }

    public function qtyPlus($idx_produk)
    {
        Cart::plus($this->index_transaksi, $idx_produk);
        $this->updateCart();
    }

    public function qtyMin($idx_produk)
    {
        Cart::minus($this->index_transaksi, $idx_produk);
        $this->updateCart();
    }

    public function hapusCartId($index)
    {
        $cart = Cart::get();
        count($cart['transaksi'][$this->index_transaksi]['products']) == 1 ? Cart::clear($this->index_transaksi) : Cart::remove($this->index_transaksi, $index);
        $this->updateCart();
    }

    public function hitung()
    {
        $cart = Cart::get();
        $this->totalTransaksi = 0;
        //perbaiki
        if ($this->index_transaksi !== false) {
            foreach ($cart['transaksi'][$this->index_transaksi]['products'] as $c) {
                $this->totalTransaksi += $c['harga'] * $c['qty'];
            }
        }
    }

    public function pembayaran($total)
    {
        $data = Cart::get();
        Transaksi::where('id', $data['transaksi'][$this->index_transaksi]['transaksi_id'])->update([
            'total' => $total,
            'status' => 1,
        ]);
        foreach ($data['transaksi'][$this->index_transaksi]['products'] as $p) {
            ItemTransaksi::create(
                [
                    'user_id' => $data['transaksi'][$this->index_transaksi]['user_id'],
                    'transaksi_id' => $data['transaksi'][$this->index_transaksi]['transaksi_id'],
                    'produk_id' => $p['produk_id'],
                    'qty' => $p['qty'],
                    'harga_saat_transaksi' => $p['harga'],
                    'jenis_transaksi' => 1,
                    'status_transaksi' => 1,
                ]
            );
        }
        Cart::bayarClear($this->index_transaksi);
        $this->updateCart();

        $kembali = $this->bayar - ($total + ($total * 0.1));
        $this->dispatchBrowserEvent('alert-event', [
            'title' => 'Pembayaran berhasil',
            'text' => "Jumlah Kembalian = Rp" . number_format($kembali, 0, '', '.'),
            'icon' => 'success',
        ]);
        $this->bayar = '';
    }
}
