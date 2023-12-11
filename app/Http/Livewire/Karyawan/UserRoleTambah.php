<?php

namespace App\Http\Livewire\Karyawan;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRoleTambah extends Component
{
    public $userRole;

    public function render()
    {
        return view('livewire.karyawan.user-role-tambah');
    }
    public function store()
    {
        $message = [
            'required' => 'bagian ini harus diisi.'
        ];
        $this->validate([
            'userRole' => 'required'
        ], $message);

        $role = Role::create([
            'name' => $this->userRole
        ]);

        $role->givePermissionTo(['akses_daftar_menu','lihat_meja', 'lihat_status_produk']);

        $this->dispatchBrowserEvent('alert-toast', [
            'title' => 'Berhasil',
            'text' => "User Role ditambahkan",
            'icon' => 'success',
        ]);
        $this->emit('formUserRoleClose');
    }
}
