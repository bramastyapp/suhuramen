<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <span class="btn btn-gradient-success float-start btn-sm">
                                    <i class="mdi mdi-account-check btn-icon-prepend"></i>
                                    {{ $kasir->name }}</span>                                
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="btn btn-gradient-info btn-sm float-end mb-3" wire:click="clear">
                            Reset <i class=" mdi mdi-recycle btn-icon-append"></i>
                        </div>
                    </div>
                </div>
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>qty</th>
                        <th>Sub Total</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @if (!empty($carts['transaksi'][$index_transaksi]) && $carts['transaksi'][$index_transaksi]['id_user'] == $id_user)

                            @foreach ($carts['transaksi'][$index_transaksi]['products'] as $index => $item)
                                <tr>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                    <td>
                                        <span>
                                            <i class="mdi mdi-minus-box menu-icon"
                                                wire:click="qtyMin({{ $index }})"
                                                style="cursor: pointer"></i>
                                            {{ $item['qty'] }}
                                            <i class="mdi mdi-plus-box menu-icon"
                                                wire:click="qtyPlus({{ $index }})"
                                                style="cursor: pointer"></i>
                                        </span>
                                    </td>
                                    <td>Rp
                                        {{ number_format($item['qty'] * $item['harga'], 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <div class="btn btn-gradient-dark btn-sm"
                                            wire:click="hapusCartId({{ $index }})">
                                            <i class="mdi mdi-delete-forever"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">
                                    <span class="text-danger">
                                        Pilih produk di pencarian!
                                    </span>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="border-0 p-0 pb-3">Sub Total</td>
                            <td class="border-0 p-0 float-end">{{ number_format($totalTransaksi, 0, '', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="border-0 p-0 pb-3">Pajak</td>
                            <td class="border-0 p-0 float-end">{{ number_format($totalTransaksi*0.1, 0, '', '.') }}</td>
                        </tr>
                        {{-- <tr>
                            <th>Diskon</th>
                            <td>10%</td>
                        </tr> --}}
                        <tr>
                            <th class=" border-0 p-0">Total</th>
                            <th class=" border-0 p-0 float-end">
                                Rp {{ number_format($totalTransaksi + ($totalTransaksi*0.1), 0, '', '.') }}
                            </th>
                        </tr>
                        {{-- <tr>
                            <th class="border-0 p-0 pt-3">Kembali</th>
                            <td class="border-0  p-0 pt-3 float-end">
                                Rp {{ $bayar>$totalTransaksi ? number_format($bayar-$totalTransaksi, 0, '', '.') : 0 }}
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="p-4 pb-0">
                <div class="form-group mb-0">
                    <label class="form-label">Masukkan Uang</label>
                    <div>
                        <input type="text" class="form-control" wire:model="bayar" placeholder="0">
                        @if ($totalTransaksi + ($totalTransaksi*0.1) > $bayar)
                            <p class="text-danger text-center fw-light mb-0 mt-1" style="font-size: 0.8rem">Uang tidak
                                cukup!</p>
                        @endif
                    </div>
                </div>
            </div>
            @if ($totalTransaksi + ($totalTransaksi*0.1) > $bayar || $totalTransaksi == 0)
                <div class="btn bg-secondary m-4">
                    Pembayaran
                    <i class="mdi mdi-checkbox-marked-outline"></i>
                </div>
            @else
                <button class="btn btn-gradient-info m-4" wire:click="pembayaran({{ $totalTransaksi }})">
                    Pembayaran
                    <i class="mdi mdi-checkbox-marked-outline"></i>
                </button>
        </div>
        @endif
    </div>
</div>
