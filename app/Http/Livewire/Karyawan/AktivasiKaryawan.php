<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use App\Models\UserPosisi;
use Livewire\Component;

class AktivasiKaryawan extends Component
{
    public $karyawan;

    public function render()
    {
        $status = [
            0 => [
                'nama' => 'Tidak Aktif',
                'warna' => 'danger',
            ],
            1 => [
                'nama' => 'Aktif',
                'warna' => 'success',
            ],
        ];
        $this->karyawan = User::orderBy('user_level', 'asc')->get();
        $posisi = UserPosisi::all();
        
        return view('livewire.karyawan.aktivasi-karyawan', [
            'karyawan' => $this->karyawan,
            'status' => $status,
            'posisi' => $posisi,
        ]);
    }
    
    public function update()
    {
        $this->karyawan = User::all();
    }

    public function status($status, $id)
    {
        User::find($id)->update([
            'status' => $status
        ]);
    }
}
