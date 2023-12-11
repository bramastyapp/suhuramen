<?php

namespace App\Http\Livewire\Karyawan;


use App\Models\UserRole;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ManagementKaryawan extends Component
{  
    protected $listeners = [
        'formRoleClose',
        'formUserRoleClose',
        'hapus-user-role' => 'destroy'
    ];
    public $formRoleVisible;
    public $userRoleTambah;
    public $userRoleEdit;
    public $userRoleId;

    public function render()
    {
        $roles = Role::with('permissions')->get();
        $permissions = DB::table('role_has_permissions')->get();
        return view('livewire.karyawan.management-karyawan', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    public function formRoleOpen($id)
    {
        $this->emit('formRoleOpen', $id);
        $this->formRoleVisible = true;
    }
    public function formRoleClose()
    {
        $this->formRoleVisible = false;
    }
    public function userRoleTambah()
    {
        $this->formRoleVisible = true;
        $this->userRoleTambah = true;
    }
    public function formUserRoleOpen($id)
    {
        $this->emit('formUserRoleOpen', $id);
        $this->formRoleVisible = true;
        $this->userRoleEdit = true;
    }
    public function formUserRoleClose()
    {
        $this->formRoleVisible = false;
        $this->userRoleTambah = false;
        $this->userRoleEdit = false;
    }
    public function formUserRoleHapus($id)
    {
        $this->userRoleId = $id;
        $this->dispatchBrowserEvent('konfirmasi-hapus', [
            'action' => 'hapus-user-role'
        ]);
    }

    public function destroy()
    {
        Role::find($this->userRoleId)->delete();
        $this->dispatchBrowserEvent('terhapus', [
            'text' => 'User Role telah dihapus.'
        ]);
    }
}
