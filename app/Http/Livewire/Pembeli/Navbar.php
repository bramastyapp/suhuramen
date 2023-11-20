<?php

namespace App\Http\Livewire\Pembeli;

use App\Facades\Cart;
use Illuminate\Http\Request;
use Livewire\Component;

class Navbar extends Component
{
    protected $listeners = [
        'produkDitambahkan' => 'hitungCart',
        'produkDihapus' => 'hitungCart',
        'pembayaran' => 'hitungCart',
    ];
    public $cartTotal;
    public $id_user;
    public $cart;
    public function mount(Request $request)
    {
        $this->id_user = $request->session()->get('no_meja');
        $this->cart = Cart::get();
        $this->hitungCart();
    }
    public function render()
    {
        return view('livewire.pembeli.navbar');
    }
    public function hitungCart()
    {
        $this->cartTotal = 0; 
        $data = Cart::get();
        $index_transaksi = array_search($this->id_user, array_column($data['transaksi'], 'id_user'));
        if ($index_transaksi !== false ) {
            foreach ($data['transaksi'][$index_transaksi]['products'] as $p) {
                $this->cartTotal += $p['qty'];
            }
        }
    }
}
