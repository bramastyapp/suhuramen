<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\UserAccessMenu;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleManagement extends Component
{
    protected $listeners = [
        'formRoleOpen'
    ];
    public $role;
    public $roleId;

    public function render()
    {
        return view('livewire.karyawan.role-management');
    }

    public function formRoleOpen($id)
    {
        $this->roleId = $id;
        $this->role = Role::with('permissions')->find($id);
    }

    public function updateRole($permission)
    {
        if ($this->role->hasPermissionTo($permission)) {
            $this->role->revokePermissionTo($permission);
        } else {
            $this->role->givePermissionTo($permission);
        }

        $this->dispatchBrowserEvent('alert-toast', [
            'title' => 'Berhasil',
            'text' => "Role diperbarui",
            'icon' => 'success',
        ]);
    }
}
