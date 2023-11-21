<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class KasirTransaksi extends Component
{
    public $tanggal;
    public $total;
    
    public function render()
    {
        $this->tanggal = Carbon::today();
        $kasir = User::find(Auth::user()->id);
        $transaksi = Transaksi::where('id_user', $kasir->id)->orWhere('verifikator', $kasir->id)->whereDate('updated_at', '=',  $this->tanggal)->orderBy('updated_at', 'desc')->get();

        foreach ($transaksi as $t) {
            $this->total += ($t->total + ($t->total*0.1));
        }
        return view('livewire.transaksi.kasir-transaksi', [
            'kasir' => $kasir,
            'transaksi' => $transaksi,
        ]);
    }
}
