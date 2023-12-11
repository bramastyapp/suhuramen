<?php

namespace App\Http\Livewire\Pembeli;

use App\Models\Transaksi;
use Livewire\Component;

class Pelunasan extends Component
{
    public function render()
    {
        $transaksi = Transaksi::find(session('pelunasan'));
        // dd($transaksi->item_transaksi);
        return view('livewire.pembeli.pelunasan', [
            'transaksi' => $transaksi
        ]);
    }
}
