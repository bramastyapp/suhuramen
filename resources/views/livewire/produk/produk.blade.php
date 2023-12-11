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
    <div class="row">
        <div class="col">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-view-dashboard"></i>
                    </span> Kelola Produk
                </h3>
            </div>
            <div class="dropdown mb-3">
                <button class="btn btn-gradient-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @if ($kategoriId)
                        @foreach ($kategori_pilih as $kp)
                            @if ($kp->id === $kategoriId)
                                {{ $kp->nama_kategori }}
                            @endif
                        @endforeach
                    @else
                        Pilih Kategori
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                    @foreach ($kategori_pilih as $kp)
                        <li><a wire:click.prevent='updateId({{ $kp->id }})'
                                class="dropdown-item {{ $kategoriId === $kp->id ? 'active' : '' }}"
                                href="#">{{ $kp->nama_kategori }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            @can('tambah_produk')                
            <button wire:click='formTambahOpen' type="button"
                class="btn btn-gradient-success btn-icon-text mb-3 float-end">
                Tambah Produk
                <i class="mdi mdi-shape-square-plus btn-icon-append"></i>
            </button>
            @endcan

        </div>
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
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($k->produk as $index => $data)
                                @if ($data->produk_kategori_id == $k->id)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>
                                            <img src="{{ asset('/storage/' . $data->gambar) }}" alt=""
                                                style="border-radius: 0%; height: 100px; width: 100px; object-fit: cover">
                                        </td>
                                        <td>{{ $data->harga }}</td>
                                        <td>
                                            @can('edit_produk')
                                                <a wire:click.prevent='formEditOpen({{ $data->id }})' href=""
                                                    class="btn btn-gradient-dark btn-sm">
                                                    <i class="mdi mdi-lead-pencil"></i>
                                                </a>
                                            @endcan
                                            @can('hapus_produk')
                                                <a wire:click.prevent='konfirmasiHapus({{ $data->id }})'
                                                    class="btn btn-gradient-danger btn-sm">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </a>
                                            @endcan
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
