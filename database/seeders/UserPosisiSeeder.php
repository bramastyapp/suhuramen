<?php

namespace Database\Seeders;

use App\Models\UserPosisi;
use Illuminate\Database\Seeder;

class UserPosisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(base_path('/database/data_json/user/user_posisi.json'));
        $data = json_decode($file, true);

        UserPosisi::insert($data);
    }
}
