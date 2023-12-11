<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEdit extends Component
{
    use WithFileUploads;

    public $user_id;
    public $gambar;
    public $gambarOld;
    public $nama;
    public $email;
    public $alamat;

    public function mount()
    {
        $this->show();
    }
    public function render()
    {
        return view('livewire.karyawan.user-edit');
    }
    public function show()
    {
        $user = Auth::user();
        $this->user_id = $user->id;
        $this->nama = $user->name;
        $this->email = $user->email;
        $this->alamat = $user->alamat;
        if ($user->foto) {
            $this->gambarOld = $user->foto;
        }
    }
    public function update()
    {
        $messages = [
            'required' => 'Bagian ini harus diisi.',
            'numeric'    => 'format harus angka.',
            'min'    => 'Bagian ini tidak boleh kurang dari 3 karakter.',
            'image' => 'file yang di upload harus gambar.'
        ];
        $this->validate([
            'nama' => 'required|min:3',
            'email' => 'required',
            // 'gambar' => 'image|max:1024',
        ], $messages);

        $user_edit = User::find($this->user_id);
        $nama_gambar = '';
        if ($this->gambar) {
            Storage::disk('public')->delete($user_edit->foto);
            $nama_gambar = \Str::slug($this->nama, '-')
                . '-'
                . uniqid()
                . '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('public', $nama_gambar, 'local');
        } else {
            $nama_gambar = $user_edit->foto;
        }

        $user_edit->update([
            'name' => $this->nama,
            'alamat' => $this->alamat,
            'foto' => $nama_gambar,
        ]);
        $this->dispatchBrowserEvent('alert-event', [
            'title' => 'Berhasil',
            'text' => "Profil sudah diperbarui",
            'icon' => 'success',
        ]);
    }
}
