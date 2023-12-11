<div>
    <div class="card bg-gradient-primary card-img-holder text-white mb-3">
        <div class="card-body">
            <img src="{{ asset('vendor/purpleadmin/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                alt="circle-image">
            <h4 class="font-weight-normal mb-3">{{ $tanggal->setTimezone('Asia/Jakarta')->format('l, j F Y') }} <i
                    class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">Rp {{ number_format($total, 0, '', '.') }}</h2>
            <h6 class="card-text">Total pelanggan : {{ count($transaksi) }}</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col">
                            <span class="btn btn-gradient-dark float-start btn-sm" style="cursor: default;">
                                <i class="mdi mdi-account-check btn-icon-prepend"></i>
                                {{ $kasir->name }}</span>
                            <span wire:click='export' class="btn btn-gradient-success float-start btn-sm" style="margin-left: 1rem">
                                <i class="mdi mdi-file-document btn-icon-prepend"></i>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="btn btn-gradient-info btn-sm float-end mb-3" style="cursor: default;">
                        <i class=" mdi mdi-timetable btn-icon-prepend"></i>
                        {{ $tanggal->setTimezone('Asia/Jakarta')->format('l, j F Y') }}
                    </div>
                </div>

            </div>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <th>No</th>
                    <th>Jam</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @if ($transaksi->isNotEmpty())
                        @foreach ($transaksi as $t)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $t->updated_at->setTimezone('Asia/Jakarta')->format('H:i') }}</td>
                                <td>{{ $t->jenis == 1 ? 'Kasir' : 'Pembeli' }}</td>
                                <td>{{ $t->jenis == 2 ? $t->customer . ' - ' . $t->meja : '' }}</td>
                                <td>Rp {{ number_format($t->total + $t->total * 0.1, 0, '', '.') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                Belum ada transaksi.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
