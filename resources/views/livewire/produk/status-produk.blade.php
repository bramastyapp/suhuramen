<div>
    <div class="row">
        <div class="col">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-view-agenda"></i>
                    </span> Kelola Status Produk
                </h3>
            </div>
        </div>
        <div class="col-3">
            <div class="dropdown float-end">
                <button class="btn btn-gradient-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @if ($kategoriId)
                        @foreach ($kategori_pilih as $kp)
                            @if ($kp->id === $kategoriId)
                                {{ $kp->nama_kategori }}
                            @endif
                        @endforeach
                    @else
                        Pilih Kategori
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                    @foreach ($kategori_pilih as $kp)
                        <li><a wire:click.prevent='updateId({{ $kp->id }})'
                                class="dropdown-item {{ $kategoriId === $kp->id ? 'active' : '' }}"
                                href="#">{{ $kp->nama_kategori }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @foreach ($kategori as $k)
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="page-title mb-3">{{ $k->nama_kategori }}</h3>
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                @can('aktivasi_status_produk')
                                    <th>Aktivasi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($k->produk as $index => $data)
                                @if ($data->produk_kategori_id == $k->id)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>
                                            @if ($data->status_produk != 0)
                                                @foreach ($status as $st)
                                                    @if ($data->status == $st['id'])
                                                        @can('edit_status_produk')
                                                            <button
                                                                class="btn btn-sm btn-gradient-{{ $st['warna'] }} dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                {{ $st['nama'] }}
                                                            </button>
                                                        @else
                                                            <div class="btn btn-sm btn-gradient-{{ $st['warna'] }}">
                                                                {{ $st['nama'] }}
                                                            </div>
                                                        @endcan
                                                    @endif
                                                    <div class="dropdown-menu">
                                                        @foreach ($status as $s)
                                                            <a class="dropdown-item" href=""
                                                                wire:click.prevent='updateStatus({{ $data->id }},{{ $s['id'] }})'>{{ $s['nama'] }}</a>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            @else
                                                <button class="btn btn-sm btn-secondary" type="button">
                                                    Tidak Aktif
                                                </button>
                                            @endif
                                        </td>

                                        @can('aktivasi_status_produk')
                                            <td>
                                                @foreach ($status_produk as $sp)
                                                    @if ($data->status_produk == $sp['id'])
                                                        <button
                                                            class="btn btn-sm btn-gradient-{{ $sp['warna'] }} dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            {{ $sp['nama'] }}
                                                        </button>
                                                    @endif
                                                    <div class="dropdown-menu">
                                                        @foreach ($status_produk as $s)
                                                            <a class="dropdown-item" href=""
                                                                wire:click.prevent='updateStatusProduk({{ $data->id }},{{ $s['id'] }})'>{{ $s['nama'] }}</a>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </td>
                                        @endcan

                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
