<div>
    @if (session('pelunasan'))     
    <div class="pt-5 pb-5">
        <div class="section-header mb-3">
            <div class="h2 judul">Pembayaran</div>
        </div>
        <p class="text-center fst-italic">Silahkam melakukan pembayaran di kasir. Terimakasih. </p>
        <div class="container">
            <div class="card mb-3" style="border: 1px solid #e0e5fa;">
                <div class="card-body">
                    <span class="btn {{$transaksi->status === 2 ? 'btn-cart' : 'btn-success'}} float-start btn-sm mb-3" >
                        {{$transaksi->status === 2 ? 'Belum bayar' : 'Lunas'}}
                        <i class="mdi mdi-{{ $transaksi->status === 2 ? 'close': 'check'}}"></i>
                    </span>
                    <span class="btn btn-info float-end btn-sm mb-3">
                        <i class="bi bi-person-check-fill"></i>
                        {{ session('no_meja') }} : {{ session('customer') }} 
                    </span>
                    <table class="table table-hover text-center">
                        <thead class="table-dark">
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>qty</th>
                            <th>Sub Total</th>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->item_transaksi as $item)
                                <tr>
                                    <td>{{ $item->produk_id }}</td>
                                    <td>Rp {{ number_format($item->harga_saat_transaksi, 0,'','.' ) }}
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rp {{ number_format($item->qty * $item->harga_saat_transaksi, 0, '', '.') }}
                                    </td>
                                </tr>
                            @endforeach
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
                                Rp {{ number_format($transaksi->total, 2, ',', '.') }}
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
                                Rp {{ number_format($transaksi->total * 0.1, 2, ',', '.') }}
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
                                Rp {{ number_format($transaksi->total + $transaksi->total * 0.1, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
