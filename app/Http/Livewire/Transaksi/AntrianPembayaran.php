<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\ItemTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AntrianPembayaran extends Component
{
    protected $listeners = [
        'pembayaran',
        'productSelect',
    ];
    public $subTotal;
    public $produk;
    public $bayar;
    public $itemTransaksi;
    public $transaksiPembayaran;
    public $transaksiId;

    public function render()
    {
        return view('livewire.transaksi.antrian-pembayaran');
    }

    public function qtyMin($id_item, $transaksi_id)
    {
        $item = ItemTransaksi::find($id_item);
        $produk = Produk::find($item->produk_id);
        if ($item->qty > 1) {
            $item->update([
                'qty' => $item->qty - 1,
            ]);
        }
        $this->pembayaran($transaksi_id);
    }

    public function qtyPlus($id_item, $transaksi_id)
    {
        $item = ItemTransaksi::find($id_item);
        $produk = Produk::find($item->produk_id);
        $item->update([
            'qty' => $item->qty + 1,
        ]);

        $this->pembayaran($transaksi_id);
    }

    public function hapusCartId($id_item, $transaksi_id)
    {
        ItemTransaksi::find($id_item)->delete();
        $this->pembayaran($transaksi_id);
    }

    public function pembayaran($transaksi_id)
    {
        $this->produk = Produk::all();
        $this->itemTransaksi = ItemTransaksi::where('transaksi_id', $transaksi_id)->get();
        $this->transaksiPembayaran = Transaksi::find($transaksi_id);
        $this->subTotal = 0;
        foreach ($this->itemTransaksi as $item) {
            $this->subTotal += $item->harga_saat_transaksi*$item->qty;
        } 
        // dd($this->subTotal);
        $this->transaksiId = $transaksi_id;
    }

    public function productSelect($produk_id)
    {
        $item_transaksi = ItemTransaksi::where('produk_id', $produk_id)->where('transaksi_id', $this->transaksiId)->first();
        $transaksi = Transaksi::find($this->transaksiId);
        $produk = Produk::find($produk_id);
        if ($item_transaksi) {
            $item_transaksi->update([
                'qty' => $item_transaksi->qty + 1,
            ]);
        } else {
            ItemTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produk_id,
                'qty' => 1,
                'harga_saat_transaksi' => $produk->harga,
                'jenis_transaksi' => 2,
                'status_transaksi' => 0,
            ]);
        }
        $this->pembayaran($this->transaksiId);
    }

    public function pelunasan()
    {;
        Transaksi::find($this->transaksiId)->update([
            'total' => $this->subTotal,
            'total_saat_transaksi' => $this->subTotal + ($this->subTotal*0.1),
            'status' => 1,
            'user_id' => Auth::user()->id,
        ]);
        $item_transaksi = ItemTransaksi::where('transaksi_id', $this->transaksiId)->get();

        foreach ($item_transaksi as $item) {
            ItemTransaksi::where('transaksi_id', $item->transaksi_id)->where('produk_id', $item->produk_id)->update([
                'status_transaksi' => 1
            ]);
        }

        $kembali = $this->bayar - $this->subTotal;
        $this->dispatchBrowserEvent('alert-event', [
            'type' => 'success',
            'title' => 'Pembayaran berhasil',
            'text' => "Jumlah Kembalian = Rp" . number_format($kembali, 0, '', '.'),
        ]);
        $this->bayar = '';
        $this->emit('lunas');
    }
}
