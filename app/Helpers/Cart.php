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
    public function add($product, $idUser)

    {
        //mendapatkan index dari array transaksi dengan id_user tertentu
        $cart = $this->get();
        $idx = array_search($idUser, array_column($cart['transaksi'], 'id_user'));

        $idx_produk = -1;
        $cek = 0;
        //mengecek apakah sudah ada produk dengan id yang sama
        foreach ($cart['transaksi'][$idx]['products'] as $index => $c) {
            if ($product->id == $c['id_produk']) {
                $cek = 1;
                $idx_produk = $index;
                break;
            }
        }
        if ($cek == 1) {
            $cart['transaksi'][$idx]['products'][$idx_produk]['qty'] = $cart['transaksi'][$idx]['products'][$idx_produk]['qty']+1; 
        } else {
            $data = [
                'id_produk' => $product->id,
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
        // dd($index_transaksi);
        Transaksi::find($cart['transaksi'][$index_transaksi]['id_transaksi'])->delete();
        array_splice($cart['transaksi'], $index_transaksi, 1);
        $this->set($cart);
    }
    public function bayarClear($index_transaksi)
    {
        $cart = $this->get();
        // dd($index_transaksi);
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
            Transaksi::find($cart['transaksi'][$idx_transaksi]['id_transaksi'])->delete();
            array_splice($cart['transaksi'], $idx_transaksi, 1);
        }else{
            array_splice($cart['transaksi'][$idx_transaksi]['products'], $idx_produk, 1);
        }
        $this->set($cart);
    }

    public function tambah_transaksi($id_transaksi, $id_user)
    {
        $cart = $this->get();
        $data = ['id_transaksi' => $id_transaksi, 'id_user' => $id_user, 'products' => []];
        array_push($cart['transaksi'], $data);
        $this->set($cart);
    }
}
