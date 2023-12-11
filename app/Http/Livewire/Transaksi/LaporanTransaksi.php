<?php

namespace App\Http\Livewire\Transaksi;

use App\Exports\TransaksiPeriodeExport;
use App\Models\Transaksi;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class LaporanTransaksi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $bulan;
    public $start;
    public $end;
    public $totalData;

    public function render()
    {
        $this->bulan = Carbon::now();
        $hari_ini = $this->getTransaksi('hari', Carbon::now());
        $bulan_ini = $this->getTransaksi('bulan', Carbon::now()->month);
        $tahun_ini = $this->getTransaksi('tahun', Carbon::now()->year);
        $datas = $this->getDatas();

        return view('livewire.transaksi.laporan-transaksi', [
            'hari_ini' => $hari_ini,
            'bulan_ini' => $bulan_ini,
            'tahun_ini' => $tahun_ini,
            'datas' => $datas
        ]);
    }
    public function getTransaksi($opsi, $tanggal)
    {
        switch ($opsi) {
            case 'hari':
                $query = Transaksi::where('status', 1)->whereDate('updated_at', '=',  $tanggal)->get();
                return [count($query), $this->totalTransaksiPajak($query), $this->totalTransaksiBersih($query)];
                break;
            case 'bulan':
                $query = Transaksi::where('status', 1)->whereMonth('updated_at', '=',  $tanggal)->get();
                return [count($query), $this->totalTransaksiPajak($query), $this->totalTransaksiBersih($query)];
                break;
            case 'tahun':
                $query = Transaksi::where('status', 1)->whereYear('updated_at', '=',  $tanggal)->get();
                return [count($query), $this->totalTransaksiPajak($query), $this->totalTransaksiBersih($query)];
                break;
        }
    }
    public function totalTransaksiPajak($array)
    {
        $total = 0;
        foreach ($array as $v) {
            $total += $v->total + ($v->total * 0.1);
        }
        return $total;
    }
    public function totalTransaksiBersih($array)
    {
        $total = 0;
        foreach ($array as $v) {
            $total += $v->total;
        }
        return $total;
    }

    public function getDatas()
    {
        $query = Transaksi::where('status', 1)->orderByDesc('updated_at')->paginate(10);
        if ($this->start && $this->end) {
            $query = Transaksi::where('status', 1)->whereBetween('updated_at', [$this->start, $this->end])->orderByDesc('updated_at')->paginate(10);
        }
        $this->totalData = $query->total();
        return $query;
    }

    public function export()
    {
        if ($this->start && $this->end) {
            return Excel::download(new TransaksiPeriodeExport($this->start, $this->end), 'Periode ' . $this->start . " sampai " . $this->end . ".xlsx");
        } else {
            return Excel::download(new TransaksiPeriodeExport(null,null), 'Periode.xlsx');
        }
    }
}
