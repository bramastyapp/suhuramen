<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(OutletSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TransaksiSeeder::class);
        // Produk::factory(10)->create();
        
        User::factory(8)->create();
    }
}
