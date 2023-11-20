<?php

namespace App\Http\Livewire\Menu;

use App\Models\Outlet;
use Livewire\Component;

class NoMeja extends Component
{
    public $meja;
    
    public function render()
    {
        $this->meja = Outlet::find(1)->jumlah_meja;
        return view('livewire.menu.no-meja');
    }
    public function mejaPlus()
    {
        $outlet = Outlet::find(1);
        $outlet->update([
            'jumlah_meja' => $outlet->jumlah_meja + 1
        ]);
        $this->meja = Outlet::find(1)->jumlah_meja;
    }
    public function mejaMin()
    {
        $outlet = Outlet::find(1);
        $outlet->update([
            'jumlah_meja' => $outlet->jumlah_meja - 1
        ]);
        $this->meja = Outlet::find(1)->jumlah_meja;
    }
}
