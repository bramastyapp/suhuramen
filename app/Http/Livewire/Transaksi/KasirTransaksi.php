<?php

namespace App\Http\Livewire\Transaksi;

use App\Exports\KasirExport;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class KasirTransaksi extends Component
{
    public $tanggal;

    public function render()
    {
        $total = 0;
        $this->tanggal = Carbon::today();
        $kasir = User::find(Auth::user()->id);
        $transaksi = Transaksi::where(function($query) use ($kasir){
          $query->where('user_id', $kasir->id);  
        })->where('status', 1)->whereDate('updated_at', '=',  $this->tanggal)->orderBy('updated_at', 'desc')->get();
        foreach ($transaksi as $t) {
            $total += ($t->total + ($t->total * 0.1));
        }
        return view('livewire.transaksi.kasir-transaksi', [
            'total' => $total,
            'kasir' => $kasir,
            'transaksi' => $transaksi,
        ]);
    }
    public function export()
    {
        return Excel::download(new KasirExport, str_replace(" ", "-", Auth::user()->name)."-".Carbon::today()->format('d-m-Y').".xlsx");
    }
}
