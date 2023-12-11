<?php

namespace App\Helpers;

use App\Models\Produk;
use App\Models\Transaksi;

class Cart
{

    public function __construct()

    {
        if ($this->get() === null) {
            $this->set($this->empty());
        }
    }
    public function get()
    {
        return session()->get('cart');
    }
    public function set($cart)
    {
        session()->put('cart', $cart);
    }
    public function add($product, $user_id)
    {
        //mendapatkan index dari array transaksi dengan user_id tertentu
        $cart = $this->get();
        $idx = array_search($user_id, array_column($cart['transaksi'], 'user_id'));

        $idx_produk = -1;
        $cek = 0;
        //mengecek apakah sudah ada produk dengan id yang sama
        foreach ($cart['transaksi'][$idx]['products'] as $index => $c) {
            if ($product->id == $c['produk_id']) {
                $cek = 1;
                $idx_produk = $index;
                break;
            }
        }
        if ($cek == 1) {
            $cart['transaksi'][$idx]['products'][$idx_produk]['qty'] = $cart['transaksi'][$idx]['products'][$idx_produk]['qty']+1; 
        } else {
            $data = [
                'produk_id' => $product->id,
                'nama' => $product->nama,
                'harga' => $product->harga,
                'qty' => 1,
            ];
            array_push($cart['transaksi'][$idx]['products'], $data);
        }
        $this->set($cart);
    }

    public function empty()
    {
        return [
            'transaksi' => [],
        ];
    }

    public function clear($index_transaksi)
    {
        $cart = $this->get();
        Transaksi::find($cart['transaksi'][$index_transaksi]['transaksi_id'])->update([
            'status' => -1
        ]);
        array_splice($cart['transaksi'], $index_transaksi, 1);

        $this->set($cart);
    }
    public function bayarClear($index_transaksi)
    {
        $cart = $this->get();
        array_splice($cart['transaksi'], $index_transaksi, 1);
        $this->set($cart);
    }

    public function plus($idx_transaksi, $idx_produk)
    {
        $cart = $this->get();
        $cart['transaksi'][$idx_transaksi]['products'][$idx_produk]['qty'] = $cart['transaksi'][$idx_transaksi]['products'][$idx_produk]['qty'] + 1;
        $this->set($cart);
    }

    public function minus($idx_transaksi, $idx_produk)
    {
        $cart = $this->get();
        if ($cart['transaksi'][$idx_transaksi]['products'][$idx_produk]['qty'] > 1) {
            $cart['transaksi'][$idx_transaksi]['products'][$idx_produk]['qty'] = $cart['transaksi'][$idx_transaksi]['products'][$idx_produk]['qty'] - 1;
            $this->set($cart);
        }
    }

    public function remove($idx_transaksi, $idx_produk)
    {
        $cart = $this->get();
        if(count($cart['transaksi'][$idx_transaksi]['products']) === 1)
        {
            Transaksi::find($cart['transaksi'][$idx_transaksi]['transaksi_id'])->delete();
            array_splice($cart['transaksi'], $idx_transaksi, 1);
        }else{
            array_splice($cart['transaksi'][$idx_transaksi]['products'], $idx_produk, 1);
        }
        $this->set($cart);
    }

    public function tambah_transaksi($transaksi_id, $user_id)
    {
        $cart = $this->get();
        $data = ['transaksi_id' => $transaksi_id, 'user_id' => $user_id, 'products' => []];
        array_push($cart['transaksi'], $data);
        $this->set($cart);
    }
}
