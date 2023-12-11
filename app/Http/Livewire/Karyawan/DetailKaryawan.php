<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetailKaryawan extends Component
{
    protected $listeners = [
        'detailKaryawan' => 'show',
        'konfirmasiUpdate'
    ];

    use WithFileUploads;

    public $user_id;
    public $gambarOld;
    public $nama;
    public $email;
    public $alamat;
    public $zipFile;
    public $zipFileOld;
    
    public function render()
    {
        return view('livewire.karyawan.detail-karyawan');
    }

    public function show($id)
    {
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->nama = $user->name;
        $this->email = $user->email;
        $this->alamat = $user->alamat;
        if ($user->foto) {
            $this->gambarOld = $user->foto;
        }
        if ($user->file_karyawan) {
            $this->zipFileOld = $user->file_karyawan;
        }
    }
    public function update()
    {
        $this->validate([
            'zipFile' => 'required|mimes:zip|max:3000'
        ]);
       $this->dispatchBrowserEvent('konfirmasi', [
        'action' => 'konfirmasiUpdate',
        'text' => 'Apa anda yakin ingin menyimpan file ini? file tidak dapat dirubah.',
        'buttonText' => 'Ya'
       ]);
    }

    public function konfirmasiUpdate()
    {
        $nama_zip = '';
        
        if($this->zipFileOld)
        {
            Storage::disk('public')->delete($this->zipFileOld);
        }

        $nama_zip = \Str::slug($this->nama, '-')
        . '-'
        . uniqid()
        . '.' . $this->zipFile->getClientOriginalExtension();
        $this->zipFile->storeAs('public/file-karyawan', $nama_zip, 'local');
        $this->zipFile = null;
        User::find($this->user_id)->update([
            'file_karyawan' => $nama_zip
        ]);
        
        $this->dispatchBrowserEvent('terkonfirmasi', [
            'text' => 'File karyawan berhasil di upload.' 
        ]);
        $this->emit('detailKaryawanClose');
    }
}
