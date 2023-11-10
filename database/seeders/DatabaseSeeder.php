<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Produk::factory(10)->create();
        
        ProdukKategori::create([
            'nama_kategori' => 'Makanan'
        ]);
        ProdukKategori::create([
            'nama_kategori' => 'Minuman'
        ]);
    }
}
