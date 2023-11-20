<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\ItemTransaksi;
use App\Models\Transaksi;
use Livewire\Component;

class AntrianTransaksi extends Component
{
    protected $listeners = [
        'formClose',
        'lunas'
    ];
    public $transaksi;
    public $transaksiItem;
    public $transaksiPembayaran;
    public $formPembayaran;

    public function mount()
    {
        $this->getTransaksi();
    }
   
    public function render()
    {
        $status = [
            0 => [
                'nama' => 'Batal',
                'warna' => 'danger',
            ],
            1 => [
                'nama' => 'Lunas',
                'warna' => 'success',
            ],
            2 => [
                'nama' => 'Belum bayar',
                'warna' => 'dark',
            ],
        ];
        return view('livewire.transaksi.antrian-transaksi', [
            'datas' => $this->transaksi, 
            'status' => $status, 
        ]);
    }

    public function getTransaksi()
    {
        $this->transaksi = Transaksi::where('jenis', 2)->orderBy('created_at', 'asc')->get();
    }

    public function status($index, $id)
    {
        // dd($id);
        Transaksi::find($id)->update([
            'status' => $index,
        ]);
        $this->getTransaksi();
    }

    public function pembayaran($id)
    {
        $this->formPembayaran = true;
        $this->emit('pembayaran', $id);
        $this->transaksiItem = ItemTransaksi::find($id);
        $this->transaksiPembayaran = Transaksi::find($id);
    }
    public function formClose()
    {
        $this->formPembayaran = false;
    }
    public function lunas()
    {
        $this->formPembayaran = false;
        $this->getTransaksi();
    }
}
