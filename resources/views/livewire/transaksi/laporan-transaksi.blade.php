<div>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-list"></i>
            </span> Laporan Transaksi
        </h3>
        <div class="btn btn-gradient-primary btn-md float-end mb-3">
            <i class=" mdi mdi-timetable btn-icon-prepend"></i>
            {{ $bulan->setTimezone('Asia/Jakarta')->format('F Y') }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('vendor/purpleadmin') }}/assets/images/dashboard/circle.svg"
                        class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Hari ini <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">Rp {{ number_format($hari_ini[2], 0, '', '.') }}</h2>
                    <h6 class="card-text">Total pelanggan {{ $hari_ini[0] }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('vendor/purpleadmin') }}/assets/images/dashboard/circle.svg"
                        class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Bulan ini <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">Rp {{ number_format($bulan_ini[2], 0, '', '.') }}</h2>
                    <h6 class="card-text">Total pelanggan {{ $bulan_ini[0] }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('vendor/purpleadmin') }}/assets/images/dashboard/circle.svg"
                        class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Tahun ini <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">Rp {{ number_format($tahun_ini[2], 0, '', '.') }}</h2>
                    <h6 class="card-text">Total {{ $tahun_ini[0] }} Transaksi</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center mb-3">
                <div class="col">
                    <div class="btn btn-gradient-dark">{{$totalData}}</div>
                </div>
                <div class="col-4">
                    <input type="date" class="form-control @error('start') is-invalid @enderror" wire:model="start">
                    @error('start')
                        <span class="invalid-feedback">
                            <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="col-4">
                    <input type="date" class="form-control @error('end') is-invalid @enderror" wire:model="end">
                    @error('end')
                        <span class="invalid-feedback">
                            <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <div class="float-end">
                        <a wire:click.prevent='export' class="btn btn-gradient-success" href="">Export</a>
                    </div>
                </div>
            </div>
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Kasir</th>
                    <th>Total</th>
                    <th>Customer</th>
                    <th>Meja</th>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->index + ($datas->currentPage() - 1) * $datas->perPage() + 1 }}</td>
                            <td>{{ $data->updated_at->format('d-m-Y') }}</td>
                            <td>{{ $data->jenis === 2 ? 'Pembeli' : 'Kasir' }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>Rp {{ number_format($data->total, 0, '', '.') }}</td>
                            <td>{{ $data->customer }}</td>
                            <td>{{ $data->meja }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $datas->links() }}
            </div>
        </div>
    </div>
</div>
