<?php

namespace App\Helpers;

use App\Models\Produk;

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
    public function add(Produk $product)

    {
        $cek = 0;
        $cart = $this->get();
        foreach ($cart['products'] as $c) {
            if ($product->id == $c->id) {
                $cek = 1;
                break;
            }
        }
        
        $index = array_search($product->id, array_column($cart['qty'], 'id'));

        if ($cek == 1) {
            $cart['qty'][$index]['qty'] = $cart['qty'][$index]['qty']+1; 
        } else {
            array_push($cart['products'], $product);
            array_push($cart['qty'], [
                'id' => $product->id,
                'qty' => 1,
            ]);
        }
        $this->set($cart);
    }
    public function empty()

    {
        return [
            'products' => [],
            'qty' => [],
        ];
    }
    public function clear()
    {
        $this->set($this->empty()); 
    }
    public function plus(Produk $product)
    {
        $cart = $this->get();
        $index = array_search($product->id, array_column($cart['qty'], 'id'));
        $cart['qty'][$index]['qty'] = $cart['qty'][$index]['qty']+1; 
        $this->set($cart);
    }
    public function minus(Produk $product)
    {
        $cart = $this->get();
        $index = array_search($product->id, array_column($cart['qty'], 'id'));
        if($cart['qty'][$index]['qty']>1)
        {
            $cart['qty'][$index]['qty'] = $cart['qty'][$index]['qty']-1; 
            $this->set($cart);
        }
    }
    public function remove(int $id)
    {
        $cart = $this->get(); 
        array_splice($cart['products'], array_search($id, array_column($cart['products'], 'id')),1); 
        array_splice($cart['qty'], array_search($id, array_column($cart['qty'], 'id')),1); 
        $this->set($cart); 
    }
    // public function hitung()
    // {
    //     $cart = $this->get();
    //     foreach($cart['products'] as $i => $c)
    //     {
    //             $cart['total'] += $c->harga*$cart['qty'][$i]['qty'];
    //     }
    //     $this->set($cart);
    // }
}
