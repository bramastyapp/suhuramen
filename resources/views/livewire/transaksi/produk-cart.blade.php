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
                                    Bram</span>
                                <input type="hidden" readonly class="form-control-plaintext form-control-sm"
                                    value="Bram">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="btn btn-gradient-info btn-sm float-end mb-3" wire:click="clear">
                            Kosongkan <i class="mdi mdi-delete-variant btn-icon-append"></i>
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
                        @if (!empty($carts['products']))

                            @foreach ($carts['products'] as $item)
                                <tr>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                    <td>

                                        @php
                                            $index = array_search($item['id'], array_column($cart['qty'], 'id'));
                                        @endphp
                                        <span>
                                            <i class="mdi mdi-minus-box menu-icon"
                                                wire:click="qtyMin({{ $item['id'] }})" style="cursor: pointer"></i>
                                            {{ $carts['qty'][$index]['qty'] }}
                                            <i class="mdi mdi-plus-box menu-icon"
                                                wire:click="qtyPlus({{ $item['id'] }})" style="cursor: pointer"></i>
                                        </span>
                                    </td>
                                    <td>Rp
                                        {{ number_format($carts['qty'][$index]['qty'] * $item['harga'], 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <div class="btn btn-gradient-dark btn-sm"
                                            wire:click="hapusCartId({{ $item['id'] }})">
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
                        {{-- <tr>
                            <th class="border-0">Pajak</th>
                            <td class="border-0">10%</td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td>10%</td>
                        </tr> --}}
                        <tr>
                            <th class="border-0 p-0">Total</th>
                            <td class="border-0 p-0 float-end">
                                Rp {{ number_format($totalTransaksi, 0, '', '.') }}
                            </td>
                        </tr>
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
                        @if ($totalTransaksi > $bayar)
                            <p class="text-danger text-center fw-light mb-0 mt-1" style="font-size: 0.8rem">Uang tidak
                                cukup!</p>
                        @endif
                    </div>
                </div>
            </div>
            @if ($totalTransaksi > $bayar || $totalTransaksi == 0)
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Total</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="Rp {{ $totalTransaksi }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Bayar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control rupiah">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-gradient-dark" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-gradient-info">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
