<div>
    @if ($formPembayaran)
        @livewire('transaksi.antrian-pembayaran')
    @endif
    <div class="card mb-3">
        <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" wire:keydown.escape="resetQuery" wire:model="queryTransaksi"
                        placeholder="Cari transaksi..." autofocus>
                </div>
            </div>
            <table class="table table-hover text-center mb-3">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Customer</th>
                    <th>Meja</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        @if ($data->status == 2)
                            <tr>
                                <td>1</td>
                                <td>{{ $data->customer }}</td>
                                <td>{{ $data->id_user }}</td>
                                <td>Rp {{ number_format($data->total + ($data->total*0.1), 0, '', '.') }}</td>
                                <td>
                                    @foreach ($status as $index => $st)
                                        @if ($index == $data->status)
                                            <button class="btn btn-sm btn-gradient-{{ $st['warna'] }} dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                {{ $st['nama'] }}
                                            </button>
                                        @endif
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"
                                                wire:click.prevent="status(0,{{ $data->id }})">{{ $status[0]['nama'] }}</a>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    <div wire:click="pembayaran({{ $data->id }})"
                                        class="btn btn-gradient-info btn-sm">
                                        <i class="mdi mdi-cash-multiple"></i>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Customer</th>
                    <th>Meja</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        @if ($data->status != 2 && $data->status != -1)
                            <tr>
                                <td>1</td>
                                <td>{{ $data->customer }}</td>
                                <td>{{ $data->id_user }}</td>
                                <td>Rp {{ number_format($data->total+($data->total*0.1), 0, '', '.') }}</td>
                                <td>
                                    @foreach ($status as $index => $st)
                                        @if ($index == $data->status)
                                            <button class="btn btn-sm btn-gradient-{{ $st['warna'] }} {{$data->status == 1 ? '': 'dropdown-toggle'}} "
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                {{ $st['nama'] }}
                                            </button>
                                        @endif
                                        @if ($data->status == 0)
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="status(2,{{ $data->id }})">{{ $status[2]['nama'] }}</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('adm/') }}" class="btn btn-gradient-dark btn-sm">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </a>
                                    <a href="{{ url('adm/') }}" class="btn btn-gradient-info btn-sm"
                                        onclick="confirmation(event)">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
