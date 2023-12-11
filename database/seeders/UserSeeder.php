<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bramastya',
            'email' => 'bram@test.com',
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => "Farhan",
            'email' => "manager@test.com",
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => "Zaki",
            'email' => "kasir@test.com",
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => "Tio",
            'email' => "koki@test.com",
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => "Ramdan",
            'email' => "pelayan@test.com",
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => "Kemal",
            'email' => "ob@test.com",
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
    }
}
