<div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" wire:keydown.escape="resetQuery" wire:model="query"
                        placeholder="Cari karyawan...">
                </div>
            </div>
            <table class="table table-hover text-center mb-3">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($karyawan as $k)
                        @if ($k->status == 0)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $k->name }}</td>
                                <td>{{ $k->email }}</td>
                                <td>
                                    @if ($k->status == 0)
                                        <button
                                            class="btn btn-sm btn-gradient-{{ $status[0]['warna'] }} dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ $status[0]['nama'] }}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"
                                                wire:click.prevent="status(1, {{ $k->id }})">{{ $status[1]['nama'] }}</a>
                                        </div>
                                    @endif
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

    @if (Auth::user()->user_level == 1)
        {{-- Aktif --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="btn btn-gradient-success mb-3" style="cursor: default">
                    <i class=" mdi mdi-account-switch"></i> &nbsp;Aktif
                </div>
                <table class="table table-hover text-center mb-3">
                    <thead class="table-dark">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Posisi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($karyawan as $k)
                            @if ($k->user_level != 1 && $k->status == 1)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->email }}</td>
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
                                                @if (Auth::user()->user_level == 1)
                                                    <a class="dropdown-item" href="#"
                                                        wire:click.prevent="status(2, {{ $k->id }})">Resign</a>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($posisi as $p)
                                            @if ($k->user_level == $p->kode)
                                                {{ $p->nama_posisi }}
                                            @endif
                                        @endforeach
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
        <div class="card mb-3">
            <div class="card-body">
                <div class="btn btn-gradient-dark mb-3" style="cursor: default">
                    <i class=" mdi mdi-account-switch"></i> &nbsp;Resign
                </div>
                <table class="table table-hover text-center mb-3">
                    <thead class="table-dark">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Posisi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($karyawan as $k)
                            @if ($k->user_level != 1 && $k->status == 2)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->email }}</td>
                                    <td>
                                        @if ($k->status == 2)
                                            <button
                                                class="btn btn-sm btn-gradient-dark dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Resign
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="status(0, {{ $k->id }})">{{ $status[0]['nama'] }}</a>
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="status(1, {{ $k->id }})">{{ $status[1]['nama'] }}</a>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($posisi as $p)
                                            @if ($k->user_level == $p->kode)
                                                {{ $p->nama_posisi }}
                                            @endif
                                        @endforeach
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
    @endif

</div>
