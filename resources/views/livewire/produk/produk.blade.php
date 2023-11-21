<div>
    @if ($formVisible)
        @if (!$formEdit)
            @livewire('produk.tambah-produk')
        @else
            @livewire('produk.edit-produk')
        @endif
    @endif
    @if ($formVisibleKategori)
        @livewire('produk-kategori.tambah-kategori')
    @endif
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-dashboard"></i>
            </span> Kelola Produk
        </h3>
        <button wire:click='formTambahOpen' type="button" class="btn btn-gradient-success btn-icon-text mb-3">
            Tambah Produk
            <i class="mdi mdi-shape-square-plus btn-icon-append"></i>
        </button>
    </div>
    @foreach ($kategori as $k)
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="page-title mb-3">{{ $k->nama_kategori }}</h3>
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($datas as $index => $data)
                                @if ($data->kategori == $k->id)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->harga }}</td>
                                        <td>
                                            <a wire:click.prevent='formEditOpen({{ $data->id }})' href=""
                                                class="btn btn-gradient-dark btn-sm">
                                                <i class="mdi mdi-lead-pencil"></i>
                                            </a>
                                            <a wire:click.prevent='konfirmasiHapus({{ $data->id }})'
                                                href="javascript:void(0)" class="btn btn-gradient-info btn-sm">
                                                <i class="mdi mdi-delete-forever"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

</div>
