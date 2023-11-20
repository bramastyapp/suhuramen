<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\ItemTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
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
    public $idTransaksi;

    public function render()
    {
        return view('livewire.transaksi.antrian-pembayaran');
    }

    public function qtyMin($id_item, $id_transaksi)
    {
        $item = ItemTransaksi::find($id_item);
        $produk = Produk::find($item->id_produk);
        if ($item->qty > 1) {
            $item->update([
                'qty' => $item->qty - 1,
            ]);
        }
        $this->pembayaran($id_transaksi);
    }

    public function qtyPlus($id_item, $id_transaksi)
    {
        $item = ItemTransaksi::find($id_item);
        $produk = Produk::find($item->id_produk);
        $item->update([
            'qty' => $item->qty + 1,
        ]);

        $this->pembayaran($id_transaksi);
    }

    public function hapusCartId($id_item, $id_transaksi)
    {
        ItemTransaksi::find($id_item)->delete();
        $this->pembayaran($id_transaksi);
    }

    public function pembayaran($id_transaksi)
    {
        $this->produk = Produk::all();
        $this->itemTransaksi = ItemTransaksi::where('id_transaksi', $id_transaksi)->get();
        $this->transaksiPembayaran = Transaksi::find($id_transaksi);
        $this->subTotal = 0;
        foreach ($this->itemTransaksi as $item) {
            $this->subTotal += $item->harga_saat_transaksi*$item->qty;
        } 
        // dd($this->subTotal);
        $this->idTransaksi = $id_transaksi;
    }

    public function productSelect($id_produk)
    {
        $item_transaksi = ItemTransaksi::where('id_produk', $id_produk)->where('id_transaksi', $this->idTransaksi)->first();
        $transaksi = Transaksi::find($this->idTransaksi);
        $produk = Produk::find($id_produk);
        if ($item_transaksi) {
            $item_transaksi->update([
                'qty' => $item_transaksi->qty + 1,
            ]);
        } else {
            ItemTransaksi::create([
                'id_user' => $transaksi->id_user,
                'id_transaksi' => $transaksi->id,
                'id_produk' => $id_produk,
                'qty' => 1,
                'harga_saat_transaksi' => $produk->harga,
                'jenis_transaksi' => 2,
                'status_transaksi' => 0,
            ]);
        }
        $this->pembayaran($this->idTransaksi);
    }

    public function pelunasan()
    {;
        Transaksi::find($this->idTransaksi)->update([
            'total' => $this->subTotal,
            'total_saat_transaksi' => $this->subTotal + ($this->subTotal*0.1),
            'status' => 1,
            'verifikator' => 'di isi id_kasir',
        ]);
        $item_transaksi = ItemTransaksi::where('id_transaksi', $this->idTransaksi)->get();

        foreach ($item_transaksi as $item) {
            ItemTransaksi::where('id_transaksi', $item->id_transaksi)->where('id_produk', $item->id_produk)->update([
                'status_transaksi' => 1
            ]);
        }

        $kembali = $this->bayar - $this->subTotal;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Pembayaran berhasil',
            'text' => "Jumlah Kembalian = Rp" . number_format($kembali, 0, '', '.'),
        ]);
        $this->bayar = '';
        $this->emit('lunas');
    }
}
