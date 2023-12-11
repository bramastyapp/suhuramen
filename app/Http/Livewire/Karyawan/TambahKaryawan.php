<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TambahKaryawan extends Component
{
    public $name;
    public $email;

    public function render()
    {
        return view('livewire.karyawan.tambah-karyawan');
    }

    public function store()
    {
        $message = [
            'required' => 'bagian ini harus diisi.',
            'string' => 'bagian ini harus diisi dengan karakter.',
            'email' => 'email tidak valid',
            'unique' => 'Email sudah digunakan oleh pengguna lain.',
        ];
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
        ], $message);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('12345678'),
            'status' => 0
        ]);
        $this->dispatchBrowserEvent('alert-event', [
            'title' => 'Berhasil!',
            'text' => 'Karyawan baru berhasil ditambahkan.',
            'icon' => 'success',
        ]);
    }
}
