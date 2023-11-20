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
    public $cart;
    public $id_user;
    public $index_transaksi;
    public $bayar;
    public $customer;
    public $totalTransaksi = 0;

    public function mount(Request $request)
    {
        $this->id_user = $request->session()->get('no_meja');
        $this->cart = FacadesCart::get();
        $this->inisialisasi();
        $this->hitung();
    }

    public function render()
    {
        $data = $this->cart;
        // dd($data);
        $this->index_transaksi = array_search($this->id_user, array_column($this->cart['transaksi'], 'id_user'));
        return view('livewire.pembeli.cart', ['carts' => $data]);
    }

    public function inisialisasi()
    {
        $this->index_transaksi = array_search($this->id_user, array_column($this->cart['transaksi'], 'id_user'));
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
        $this->index_transaksi = array_search($this->id_user, array_column($this->cart['transaksi'], 'id_user'));
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
        Transaksi::where('id', $data['transaksi'][$this->index_transaksi]['id_transaksi'])->update([
            'customer' => $this->customer,
            'total' => $total,
            'status' => 2,
        ]);
        foreach ($data['transaksi'][$this->index_transaksi]['products'] as $p) {
            ItemTransaksi::create(
                [
                    'id_user' => $data['transaksi'][$this->index_transaksi]['id_user'],
                    'id_transaksi' => $data['transaksi'][$this->index_transaksi]['id_transaksi'],
                    'id_produk' => $p['id_produk'],
                    'qty' => $p['qty'],
                    'harga_saat_transaksi' => $p['harga'],
                    'jenis_transaksi' => 2,
                    'status_transaksi' => 0,
                ]
            );
        }
        FacadesCart::bayarClear($this->index_transaksi);
        $this->updateCart();
        
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Total bayar = Rp' . number_format($total+($total*0.1), 0, '', '.'),
            'text' => 'Silahkan melakukan pembayaran di kasir, terimakasih',
        ]);
        $this->emit('pembayaran');
        $this->customer = '';
    }
}
