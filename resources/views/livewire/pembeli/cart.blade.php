<section id="cart">
    <div class="pt-5 pb-5">
        <div class="section-header mb-3">
            <div class="h2 judul">Keranjang</div>
        </div>
        <div class="container">
            <div class="card mb-3" style="border: 1px solid #e0e5fa;">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <span class="btn btn-success float-start btn-sm">
                                        <i class="bi bi-person-check-fill"></i>
                                        {{ $id_user }}</span>
                                    <input type="hidden" readonly class="form-control-plaintext form-control-sm"
                                        value="18">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <a href="/" class="btn btn-success btn-sm float-end mb-3">Tambah Produk
                                <i class="mdi mdi-shape-square-plus"></i>
                            </a>
                            {{-- <div class="btn btn-warning btn-sm float-end mb-3" wire:click="clear">
                                <i class="mdi mdi-delete"></i>
                            </div> --}}
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
                                        <td>Rp
                                            {{ number_format($item['harga'], 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <span>
                                                <div class="btn btn-dark btn-sm"
                                                    wire:click="qtyMin({{ $index }})" style="cursor: pointer">
                                                    <i class="mdi mdi-minus"></i>
                                                </div>
                                                &nbsp;{{ $item['qty'] }}&nbsp;
                                                <div class="btn btn-dark btn-sm"
                                                    wire:click="qtyPlus({{ $index }})" style="cursor: pointer">
                                                    <i class="mdi mdi-plus"></i>
                                                </div>
                                            </span>
                                        </td>
                                        <td>Rp {{ number_format($item['qty'] * $item['harga'], 0, ',', '.') }}

                                        </td>
                                        <td>
                                            <div class="btn btn-danger-2 btn-sm"
                                                wire:click="hapusCartId({{ $index }})">
                                                <i class="mdi mdi-close-circle-outline"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <span class="text-danger">
                                            Belum ada makanan di keranjang.
                                        </span>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card" style="border: 1px solid #e0e5fa;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <div class="float-start">
                                Sub Total
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="float-end">
                                Rp {{ number_format($totalTransaksi, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <div class="float-start">
                                Pajak (10% ppn)
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="float-end">
                                Rp {{ number_format($totalTransaksi * 0.1, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8"></div>
                        <div class="h4 col-2 font-weight-bold">
                            <div class="float-start">
                                Total
                            </div>
                        </div>
                        <div class="h4 col-2 font-weight-bold">
                            <div class="float-end">
                                Rp {{ number_format($totalTransaksi + $totalTransaksi * 0.1, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                    @if ($totalTransaksi > 0)                                    
                    <div class="row">
                        <form wire:submit.prevent='pembayaran({{ $totalTransaksi }})'
                            method="post">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Pembeli</label>
                                <input type="text" class="form-control @error('customer') is-invalid @enderror"
                                    wire:model="customer" placeholder="masukkan nama anda...">
                                @error('customer')
                                    <span class="invalid-feedback">
                                        <p class="fst-italic" style="font-size: 0.8rem">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dark">Bayar</button>
                            </div>
                        </form>
                    </div>
                                @endif
                </div>
            </div>
        </div>
    </div>
</section>
