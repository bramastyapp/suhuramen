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
use PhpOffice\PhpSpreadsheet\Shared\Date;

class KasirExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Transaksi::query()
            ->where('status', 1)
            ->whereDate('created_at', Carbon::today());
    }
    public function map($transaksi): array
    {
        return [
            Carbon::parse($transaksi->updated_at)->format('d-m-Y'),
            Carbon::parse($transaksi->updated_at)->setTimezone('Asia/Jakarta')->format('H:i') . ' WIB',
            $transaksi->jenis === 2 ? 'Pembeli' : 'Kasir',
            $transaksi->total,
        ];
    }
    public function headings(): array
    {
        return [
            'Tanggal',
            'Jam',
            'Jenis',
            'Total',
        ];
    }
}
