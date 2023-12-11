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

    {{-- @if (Auth::user()->user_role == 1) --}}



    {{-- @endif --}}

</div>
