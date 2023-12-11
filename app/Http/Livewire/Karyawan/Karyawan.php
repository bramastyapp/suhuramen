<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Karyawan extends Component
{
    protected $listeners = [
        'konfirmasiUpdateRole',
        'formTambahKaryawanClose',
        'detailKaryawanClose'
    ];
    public $userId;
    public $roleId;
    public $formVisible;
    public $detailKaryawan;

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
        $karyawan = User::all();
        $roles = Role::all();
        return view('livewire.karyawan.karyawan', [
            'karyawan' => $karyawan,
            'roles' => $roles,
            'status' => $status,
        ]);
    }
    public function status($status, $id)
    {
        User::find($id)->update([
            'status' => $status
        ]);
    }

    public function konfirmasiUpdateRole()
    {
        $cek = DB::table('model_has_roles')->where('model_id', $this->userId)->first();
        $user = User::find($this->userId);
        $role = Role::find($this->roleId);

        if ($this->roleId === -1) {
            DB::table('model_has_roles')->where('model_id', $this->userId)->delete();
        } else {
            if (!$cek) {
                $user->assignRole($role);
            } else {
                $user->syncRoles([$role]);
            }
        }
        $this->dispatchBrowserEvent('terkonfirmasi', [
            'text' => 'Posisi karyawan berhasil dirubah.',
        ]);
    }
    public function updateRole($userId, $roleId)
    {
        $this->userId = $userId;
        $this->roleId = $roleId;
        $this->dispatchBrowserEvent('konfirmasi', [
            'action' => 'konfirmasiUpdateRole',
            'buttonText' => 'Ya',
            'text' => 'Apa anda yakin ingin mengubah posisi karyawan?',
        ]);
    }
    public function tidakAdaRole($userId)
    {
        $this->userId = $userId;
        $this->roleId = -1;
        $this->dispatchBrowserEvent('konfirmasi', [
            'action' => 'konfirmasiUpdateRole',
            'buttonText' => 'Ya',
            'text' => 'Apa anda yakin ingin mengubah posisi karyawan?',
        ]);
    }

    public function formTambahKaryawanOpen()
    {
        $this->formVisible = true;
    }
    public function formTambahKaryawanClose()
    {
        $this->formVisible = false;
    }
    public function detailKaryawanOpen($id)
    {
        $this->formVisible = true;
        $this->detailKaryawan = true;
        $this->emit('detailKaryawan', $id);
    }
    public function detailKaryawanClose()
    {
        $this->formVisible = false;
        $this->detailKaryawan = false;
    }
}
