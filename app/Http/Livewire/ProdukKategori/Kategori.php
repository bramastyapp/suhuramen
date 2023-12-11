<?php

namespace App\Http\Livewire\ProdukKategori;

use App\Models\Produk;
use App\Models\ProdukKategori;
use Livewire\Component;

class Kategori extends Component
{
    protected $listeners = [
        'formKategoriClose',
        'kategoriTerhapus'
    ];
    public $kategoriId;
    public $formVisible;
    public $formEdit;

    public function render()
    {
        $data = ProdukKategori::all();
        return view('livewire.produk-kategori.kategori', ['datas' => $data]);
    }

    public function updateKategori($kategoriId)
    {
        $kategori = ProdukKategori::find($kategoriId);
        $this->emit('updateKategori', $kategori);
        $this->formVisible = true;
        $this->formEdit = true;
    }

    public function formTambahOpen()
    {
        $this->formVisible = true;
        $this->formEdit = false;
    }

    public function formEditOpen()
    {
        $this->formVisible = true;
        $this->formEdit = true;
    }

    public function formKategoriClose()
    {
        $this->formVisible = false;
        $this->formEdit = false;
    }

    public function hapusKategori($id)
    {
        $this->kategoriId = $id;
        $this->dispatchBrowserEvent('konfirmasi', [
            'action' => 'kategoriTerhapus',
            'text' => 'Pastikan bahwa kategori yang dihapus tidak ada produk yang masih tampil di menu.',
        ]);
    }

    public function kategoriTerhapus()
    {
        $produk = Produk::where('produk_kategori_id', $this->kategoriId)->first();

        if ($produk) {
            $this->dispatchBrowserEvent('terkonfirmasi', [
                'title' => 'Perhatian!',
                'text' => 'Kategori tidak dapat dihapus karena masih ada produk di dalam kategori, pastikan lagi tidak ada produk yang memakai kategori yang akan dihapus.',
                'icon' => 'info',
            ]);
        } else {
            ProdukKategori::find($this->kategoriId)->delete();
            $this->dispatchBrowserEvent('terkonfirmasi', [
                'text' => 'Kategori dihapus.'
            ]);
        }
    }
}
