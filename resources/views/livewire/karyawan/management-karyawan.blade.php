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
                    <input type="text" class="form-control" wire:keydown.escape="resetQuery" wire:model="queryKaryawan"
                        placeholder="Cari karyawan..." autofocus>
                </div>
            </div>
            <table class="table table-hover text-center mb-3">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Posisi</th>
                    <th>Opsi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($karyawan as $k)
                        @if ($k->user_level != 1)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $k->name }}</td>
                                <td>{{ $k->email }}</td>
                                <td>
                                    @if ($k->user_role)
                                        <button class="btn btn-sm btn-gradient-success dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @foreach ($role as $r)
                                                @if ($k->user_role == $r->kode)
                                                    {{ $r->nama_role }}
                                                @endif
                                            @endforeach
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($role as $r)
                                                @if ($r->kode != $k->user_role && $k->user_level != 1)
                                                    <a class="dropdown-item" href="#"
                                                        wire:click.prevent="role({{ $r->kode }}, {{ $k->id }})">
                                                        {{ $r->nama_role }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <button class="btn btn-sm btn-gradient-danger dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pilih
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($role as $r)
                                            <a class="dropdown-item" href="#"
                                            wire:click.prevent="role({{ $r->kode }}, {{ $k->id }})">
                                            {{ $r->nama_role }}
                                        </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($k->user_level)
                                        <button class="btn btn-sm btn-gradient-success dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @foreach ($posisi as $p)
                                                @if ($k->user_level == $p->kode)
                                                    {{ $p->nama_posisi }}
                                                @endif
                                            @endforeach
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($posisi as $p)
                                                @if ($p->kode != 1 && $p->kode != $k->user_level)
                                                    <a class="dropdown-item" href="#"
                                                        wire:click.prevent="posisi({{ $p->kode }}, {{ $k->id }})">
                                                        {{ $p->nama_posisi }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <button class="btn btn-sm btn-gradient-danger dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pilih
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($posisi as $p)
                                                @if ($p->kode != 1)
                                                    <a class="dropdown-item" href="#"
                                                        wire:click.prevent="posisi({{ $p->kode }}, {{ $k->id }})">
                                                        {{ $p->nama_posisi }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                                <td></td>
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
</div>
