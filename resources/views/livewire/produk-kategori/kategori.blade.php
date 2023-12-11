<div>
    @if ($formVisible)
        @if (!$formEdit)
            @livewire('produk-kategori.tambah-kategori')
        @else
            @livewire('produk-kategori.edit-kategori')
        @endif
    @endif
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-day"></i>
            </span> Kelola Kategori
        </h3>
        @can('tambah_kategori')
            <button wire:click='formTambahOpen' type="button" class="btn btn-gradient-success mb-3" data-bs-toggle="modal"
                data-bs-target="#tambah-kategori">
                Tambah Kategori
                <i class="mdi mdi-shape-square-plus btn-icon-append"></i>
            </button>
        @endcan
    </div>

    <div class="row">
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($datas as $index => $data)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>
                                    @can('edit_kategori')
                                        <a wire:click.prevent="updateKategori({{ $data->id }})"
                                            class="btn btn-gradient-dark btn-sm">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('hapus_kategori')
                                        <a wire:click.prevent='hapusKategori({{ $data->id }})' href=""
                                            class="btn btn-gradient-danger btn-sm">
                                            <i class="mdi mdi-delete-forever"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
