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
                                    @foreach ($posisi as $p)                                        
                                    @if ($p->kode == $k->user_level)
                                        {{$p->nama_posisi}}
                                    @endif
                                    @endforeach
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
