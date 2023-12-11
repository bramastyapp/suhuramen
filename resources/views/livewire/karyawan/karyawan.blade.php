<div>
    @if ($formVisible)
        @if ($detailKaryawan)
            @livewire('karyawan.detail-karyawan')
        @else
            @livewire('karyawan.tambah-karyawan')
        @endif
    @endif
    {{-- Aktif --}}
    <div class="card mb-3">
        <div class="card-body">
            <div class="btn btn-gradient-info mb-3" style="cursor: default">
                <i class=" mdi mdi-account-switch"></i> &nbsp;Aktif
            </div>
            <div wire:click='formTambahKaryawanOpen' class="btn btn-gradient-success mb-3 float-end">
                <i class="mdi mdi-shape-square-plus"></i> &nbsp;Tambah
            </div>
            <table class="table table-hover text-center mb-3">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama</th>
                    @can('edit_karyawan')
                        <th>Posisi</th>
                    @endcan
                    <th>Email</th>
                    @can('edit_karyawan')
                        <th>Status</th>
                    @endcan
                    <th>Opsi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($karyawan as $k)
                        @if ($k->status == 1 && implode('', $k->roles->pluck('id')->toArray()) != 1)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $k->name }}</td>

                                @can('edit_karyawan')
                                    <td>
                                        <button
                                            class="btn btn-sm btn-gradient-{{ implode('', $k->roles->pluck('name')->toArray()) ? 'dark' : 'danger' }} dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ implode('', $k->roles->pluck('name')->toArray()) ? implode('', $k->roles->pluck('name')->toArray()) : 'Tidak ada' }}
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($roles as $role)
                                                @can('owner_karyawan')
                                                    <a wire:click.prevent="updateRole({{ $k->id }}, {{ $role->id }})"
                                                        class="dropdown-item" href="#">{{ $role->name }}</a>
                                                @else
                                                    @if ($role->id > 2)
                                                        <a wire:click.prevent="updateRole({{ $k->id }}, {{ $role->id }})"
                                                            class="dropdown-item" href="#">{{ $role->name }}</a>
                                                    @endif
                                                @endcan
                                            @endforeach
                                            <a wire:click.prevent="tidakAdaRole({{ $k->id }})" class="dropdown-item"
                                                href="#">Tidak ada</a>
                                        </div>
                                    </td>
                                @endcan
                                <td>{{ $k->email }}</td>
                                @can('edit_karyawan')
                                    <td>
                                        @if ($k->status == 1)
                                            <button
                                                class="btn btn-sm btn-gradient-{{ $status[1]['warna'] }} dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                {{ $status[1]['nama'] }}
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="status(0, {{ $k->id }})">{{ $status[0]['nama'] }}</a>
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="status(-1, {{ $k->id }})">Resign</a>
                                            </div>
                                        @endif
                                    </td>
                                @endcan
                                <td>
                                    <a wire:click.prevent='detailKaryawanOpen({{ $k->id }})' href=""
                                        class="btn btn-gradient-dark btn-sm">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                </td>

                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Resign --}}
    @can('edit_karyawan')
        <div class="card mb-3">
            <div class="card-body">
                <div class="btn btn-gradient-dark mb-3" style="cursor: default">
                    <i class=" mdi mdi-account-switch"></i> &nbsp;Resign
                </div>
                <table class="table table-hover text-center mb-3">
                    <thead class="table-dark">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Posisi</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($karyawan as $k)
                            @if ($k->status == -1 && implode('', $k->roles->pluck('id')->toArray()) != 1)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ \Carbon\Carbon::parse($k->updated_at)->setTimezone('Asia/Jakarta')->format('j F Y') }}
                                    </td>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->email }}</td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-gradient-dark @can('owner_karyawan') dropdown-toggle @endcan"
                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Resign
                                        </button>
                                        @can('owner_karyawan')
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="status(0, {{ $k->id }})">{{ $status[0]['nama'] }}</a>
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="status(1, {{ $k->id }})">{{ $status[1]['nama'] }}</a>
                                            </div>
                                        @endcan
                                    </td>
                                    <td>
                                        {{ implode('', $k->roles->pluck('name')->toArray()) ? implode('', $k->roles->pluck('name')->toArray()) : 'Tidak ada' }}
                                    </td>
                                    <td>
                                        <a wire:click.prevent="detailKaryawanOpen({{ $k->id }})" href=""
                                            class="btn btn-gradient-dark btn-sm">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcan
</div>
