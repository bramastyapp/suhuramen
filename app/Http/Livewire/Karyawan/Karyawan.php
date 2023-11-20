<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use App\Models\UserPosisi;
use Illuminate\Support\Collection;
use Livewire\Component;

class Karyawan extends Component
{
    public function render()
    {
        $karyawan = User::where('status', 1)->orderBy('user_level', 'asc')->get();
        $posisi = UserPosisi::all();
        return view('livewire.karyawan.karyawan', [
            'karyawan' => $karyawan,
            'posisi' => $posisi,
        ]);
    }
}
