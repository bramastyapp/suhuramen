<?php

namespace App\Http\Livewire\Includes;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.includes.sidebar');
    }
}
