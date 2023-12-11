<?php

namespace App\Http\Livewire\Karyawan;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRoleEdit extends Component
{
    protected $listeners = [
        'formUserRoleOpen'
    ];
    public $userRoleId;
    public $userRole;

    public function render()
    {
        return view('livewire.karyawan.user-role-edit');
    }

    public function formUserRoleOpen(Role $role)
    {
        $this->userRoleId = $role->id;
        $this->userRole = $role->name;
    }

    public function update()
    {
        $message = [
            'required' => 'bagian ini harus diisi'
        ];
        $this->validate([
            'userRole' => 'required'
        ], $message);

        Role::find($this->userRoleId)->update([
            'name' => $this->userRole
        ]);

        $this->dispatchBrowserEvent('alert-toast', [
            'title' => 'Berhasil',
            'text' => "User Role diperbarui",
            'icon' => 'success',
        ]);
        $this->emit('formUserRoleClose');
    }
}
