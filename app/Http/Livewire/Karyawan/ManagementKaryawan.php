<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use App\Models\UserPosisi;
use App\Models\UserRole;
use Livewire\Component;

class ManagementKaryawan extends Component
{
    public $karyawan;

    public function render()
    {
        $this->karyawan = User::orderBy('user_level', 'asc')->get();
        $posisi = UserPosisi::all();
        $role = UserRole::all();
        
        return view('livewire.karyawan.management-karyawan', [
            'karyawan' => $this->karyawan,
            'posisi' => $posisi,
            'role' => $role,
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
    public function posisi($id_posisi, $id)
    {
        User::find($id)->update([
            'user_level' => $id_posisi
        ]);
    }
    public function role($id_role, $id)
    {
        User::find($id)->update([
            'user_role' => $id_role
        ]);
    }
}
