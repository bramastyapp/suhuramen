<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleSeeder::class);
        $this->call(UserPosisiSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(OutletSeeder::class);
        // User::factory(5)->create();
        // Produk::factory(10)->create();

        User::create([
            'name' => 'Bramastya',
            'email' => 'bram@test.com',
            'user_role' => 1,
            'user_level' => 1,
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
    }
}
