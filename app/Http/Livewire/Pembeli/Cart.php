<?php

namespace App\Http\Livewire\Pembeli;

use App\Facades\Cart as FacadesCart;
use App\Models\ItemTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'produkDitambahkan' => 'updateCart',
    ];
    public $formVisible;
    public $cart;
    public $user_id;
    public $index_transaksi;
    public $bayar;
    public $customer;
    public $totalTransaksi = 0;

    public function mount(Request $request)
    {
        $this->user_id = $request->session()->get('no_meja');
        $this->cart = FacadesCart::get();
        $this->inisialisasi();
        $this->hitung();
    }

    public function render()
    {
        $data = $this->cart;
        $this->index_transaksi = array_search($this->user_id, array_column($this->cart['transaksi'], 'user_id'));
        return view('livewire.pembeli.cart', ['carts' => $data]);
    }

    public function inisialisasi()
    {
        $this->index_transaksi = array_search($this->user_id, array_column($this->cart['transaksi'], 'user_id'));
    }

    public function qtyPlus($idx_produk)
    {
        FacadesCart::plus($this->index_transaksi, $idx_produk);
        $this->updateCart();
        $this->emit('produkDitambahkan');
    }

    public function qtyMin($idx_produk)
    {
        FacadesCart::minus($this->index_transaksi, $idx_produk);
        $this->updateCart();
        $this->emit('produkDitambahkan');
    }
    
    public function updateCart()
    {
        $this->cart = FacadesCart::get();
        $this->index_transaksi = array_search($this->user_id, array_column($this->cart['transaksi'], 'user_id'));
        $this->hitung();
    }
    
    public function hapusCartId($index)
    {
        FacadesCart::remove($this->index_transaksi, $index);
        $this->updateCart();
        $this->emit('produkDihapus');
    }

    public function hitung()
    {
        $cart = FacadesCart::get();
        $this->totalTransaksi = 0;
        if($this->index_transaksi !== false)
        {
            foreach ($cart['transaksi'][$this->index_transaksi]['products'] as $c) {
                $this->totalTransaksi += $c['harga'] * $c['qty'];
            }
        }
    }

    public function pembayaran($total)
    {
        $this->validate([
            'customer' => 'required|min:3'
        ]);
        $data = FacadesCart::get();
        Transaksi::where('id', $data['transaksi'][$this->index_transaksi]['transaksi_id'])->update([
            'customer' => $this->customer,
            'total' => $total,
            'status' => 2,
        ]);
        foreach ($data['transaksi'][$this->index_transaksi]['products'] as $p) {
            ItemTransaksi::create(
                [
                    'user_id' => null,
                    'transaksi_id' => $data['transaksi'][$this->index_transaksi]['transaksi_id'],
                    'produk_id' => $p['produk_id'],
                    'qty' => $p['qty'],
                    'harga_saat_transaksi' => $p['harga'],
                    'jenis_transaksi' => 2,
                    'status_transaksi' => 0,
                ]
            );
        }
        FacadesCart::bayarClear($this->index_transaksi);
        $this->updateCart();

        session()->put('pelunasan', $data['transaksi'][$this->index_transaksi]['transaksi_id']);
        session()->put('customer', $this->customer);
        
        // $this->dispatchBrowserEvent('alert-event', [
        //     'type' => 'success',
        //     'title' => 'Total bayar = Rp' . number_format($total+($total*0.1), 0, '', '.'),
        //     'text' => 'Silahkan melakukan pembayaran di kasir, terimakasih',
        // ]);
        $this->emit('pembayaran');
        $this->redirect('/pembayaran');
        // $this->customer = '';
    }
}
