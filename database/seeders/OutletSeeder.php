<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outlet::create([
            'nama_outlet' => 'SuhuRamen',
            'alamat_outlet' => 'Solo, Jawa Tengah',
            'jumlah_meja' => 10,
        ]);
    }
}
