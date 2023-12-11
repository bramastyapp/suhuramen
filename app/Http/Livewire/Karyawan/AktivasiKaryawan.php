<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AktivasiKaryawan extends Component
{
    public $karyawan;

    public function render()
    {
        abort_if(Gate::denies('lihat_aktivasi_karyawan'), 403);
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
        $this->karyawan = User::all();
        $roles = Role::all();
        
        return view('livewire.karyawan.aktivasi-karyawan', [
            'karyawan' => $this->karyawan,
            'status' => $status,
            'roles' => $roles,
        ]);
    }
    
    public function status($status, $id)
    {
        User::find($id)->update([
            'status' => $status
        ]);
    }
}
