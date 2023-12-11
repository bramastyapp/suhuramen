<div class="row">
    <div class="col-8">
        <div class="card mb-3">
            <div class="card-body">
                @livewire('transaksi.antrian-produk')
                @if ($transaksiPembayaran && $transaksiPembayaran->count() > 0)
                    <div class="row mt-3">
                        <div class="col mb-3">
                            <div class="row">
                                <div class="col">
                                    <span class="btn btn-success float-start btn-sm">
                                        <i class="mdi mdi-account-check"></i>
                                        {{ $transaksiPembayaran->customer }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <th>nama</th>
                        <th>qty</th>
                        <th>sub total</th>
                        <th>opsi</th>
                    </thead>
                    <tbody>
                        @if ($itemTransaksi && $itemTransaksi->isNotEmpty())
                            @foreach ($itemTransaksi as $item)
                                <tr>
                                    @foreach ($produk as $p)
                                        @if ($p->id == $item->produk_id)
                                            <td>{{ $p->nama }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <span>
                                            <div class="btn btn-dark btn-sm"
                                                wire:click="qtyMin({{ $item->id }},{{ $item->transaksi_id }})"
                                                style="cursor: pointer">
                                                <i class="mdi mdi-minus"></i>
                                            </div>
                                            &nbsp;{{ $item->qty }}&nbsp;
                                            <div class="btn btn-dark btn-sm"
                                                wire:click="qtyPlus({{ $item->id }},{{ $item->transaksi_id }})"
                                                style="cursor: pointer">
                                                <i class="mdi mdi-plus"></i>
                                            </div>
                                        </span>
                                    </td>
                                    <td>{{ $item->harga_saat_transaksi * $item->qty }}</td>
                                    <td>
                                        <div class="btn btn-danger btn-sm"
                                            wire:click="hapusCartId({{ $item->id }},{{ $item->transaksi_id }})">
                                            <i class="mdi mdi-close-circle-outline"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    {{ 'loading...' }}
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card mb-3">
            <div class="card-body" style="font-size: 0.9rem">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="border-0 p-0 pb-2">Sub Total</td>
                            <td class="float-end border-0 p-0 pb-2">Rp {{ number_format($subTotal, 0, '', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="border-0 p-0 pb-2">Pajak (10% PPN)</td>
                            <td class="float-end border-0 p-0 pb-2">Rp {{ number_format($subTotal * 0.1, 0, '', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-0 p-0 pb-2 fw-bold">Total</td>
                            <td class="float-end border-0 p-0 pb-2 fw-bold">Rp
                                {{ number_format($subTotal + $subTotal * 0.1, 0, '', '.') }}</td>
                        </tr>

                    </tbody>
                </table>
                <div class="row mt-2">
                    <input type="text" class="form-control" wire:model="bayar"
                        placeholder="masukkan nominal uang...">
                    @if ($subTotal + $subTotal * 0.1 > $bayar && !empty($bayar))
                        <p class="text-danger text-center fw-light mb-0 mt-1" style="font-size: 0.8rem">Uang tidak
                            cukup!</p>
                    @endif
                </div>
                <div class="row mt-2">
                    @if ($subTotal + $subTotal * 0.1 > $bayar || empty($bayar))
                    <button class="col btn btn-secondary">
                        Bayar
                    </button>
                    @else
                    <div class="col btn btn-gradient-success" wire:click="pelunasan">
                        Bayar
                    </div>
                    @endif
                </div>
                <div class="row mt-2">
                    <div class="col btn btn-gradient-dark" wire:click="$emit('formClose')">
                        Tutup
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
