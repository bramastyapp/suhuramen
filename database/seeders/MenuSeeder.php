<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\ProdukKategori;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = file_get_contents(base_path('/database/data_json/menu/produk.json'));
        $data_produk = json_decode($produk, true);

        Produk::insert($data_produk);

        $produk_kategori = file_get_contents(base_path('/database/data_json/menu/produk_kategori.json'));
        $data_produk_kategori = json_decode($produk_kategori, true);

        ProdukKategori::insert($data_produk_kategori);
    }
}
