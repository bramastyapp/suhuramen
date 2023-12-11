<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 100; $i++) { 
            Transaksi::create([
                'user_id' => 3,
                'total' => mt_rand(70, 1000)*1000,
                'bayar' => 0,
                'jenis' => mt_rand(1,2),
                'status' => 1,
                'customer' => $faker->name,
                'meja' => 'MEJA '. mt_rand(1,10),
                'created_at' => Carbon::create()->setYear(2023)->setMonth(11)->setDay(rand(1, 30)),
                'updated_at' => Carbon::create()->setYear(2023)->setMonth(11)->setDay(rand(1, 30))
            ]);
        }
        for ($i=0; $i < 105; $i++) { 
            Transaksi::create([
                'user_id' => 3,
                'total' => mt_rand(70, 1000)*1000,
                'bayar' => 0,
                'jenis' => mt_rand(1,2),
                'status' => 1,
                'customer' => $faker->name ,
                'meja' => 'MEJA '. mt_rand(1,10),
                'created_at' => Carbon::create()->setYear(2023)->setMonth(10)->setDay(rand(1, 30))->setHour(0,23),
                'updated_at' => Carbon::create()->setYear(2023)->setMonth(10)->setDay(rand(1, 30))->setHour(0,23)
            ]);
        }
        for ($i=0; $i < 24; $i++) { 
            Transaksi::create([
                'user_id' => 3,
                'total' => mt_rand(70, 1000)*1000,
                'bayar' => 0,
                'jenis' => mt_rand(1,2),
                'status' => 1,
                'customer' => $faker->name ,
                'meja' => 'MEJA '. mt_rand(1,10),
                'created_at' => Carbon::now()->setDay(rand(1, 7))->setHour(0,23),
                'updated_at' => Carbon::now()->setDay(rand(1, 7))->setHour(0,23)
            ]);
        }
        for ($i=0; $i < 15; $i++) { 
            Transaksi::create([
                'user_id' => 3,
                'total' => mt_rand(70, 1000)*1000,
                'bayar' => 0,
                'jenis' => mt_rand(1,2),
                'status' => 1,
                'customer' => $faker->name ,
                'meja' => 'MEJA '. mt_rand(1,10),
                'created_at' => Carbon::yesterday()->setHour(0,23),
                'updated_at' => Carbon::yesterday()->setHour(0,23)
            ]);
        }
    }
}
