<?php

namespace App\Exports;

use App\Models\Transaksi;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiPeriodeExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function query()
    {
        $query = Transaksi::query()->where('status', 1)->orderByDesc('updated_at');
        if ($this->start && $this->end) {
            $query = Transaksi::query()->where('status', 1)->whereBetween('updated_at', [$this->start, $this->end])->orderByDesc('updated_at');
        }
        return $query;
    }
    public function map($transaksi): array
    {
        return [
            Carbon::parse($transaksi->updated_at)->format('d-m-Y'),
            Carbon::parse($transaksi->updated_at)->setTimezone('Asia/Jakarta')->format('H:i'),
            $transaksi->jenis === 2 ? 'Pembeli' : 'Kasir',
            $transaksi->user->name,
            $transaksi->total,
            $transaksi->meja,
            $transaksi->customer,
        ];
    }
    public function headings(): array
    {
        return [
            'Tanggal',
            'Waktu (WIB)',
            'Jenis',
            'Kasir',
            'Total',
            'Meja',
            'Customer',
        ];
    }
}
