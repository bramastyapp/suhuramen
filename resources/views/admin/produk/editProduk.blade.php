@extends('admin.layouts.app')
@section('title', 'Produk | Edit Produk')

@section('main')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-lead-pencil"></i>
            </span> Edit Produk
        </h3>
        <a href="{{ url('adm/data-produk') }}" class="btn btn-gradient-success mb-3">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ url("adm/produk/$data->id") }}" method="post" enctype="multipart/form-data">
                @csrf @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text"
                        class="form-control @error('nama') is-invalid                    
        @enderror" name="nama"
                        placeholder="Ultimate Ramen" value="{{ $data->nama }}">
                    @error('nama')
                        <span class="invalid-feedback">
                            <p class="fst-italic" style="font-size: 0.8rem">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label class="form-label">Kategori</label>
                    <div class="col-lg-10">
                        <select class="form-control form-control-sm @error('kategori') is-invalid @enderror"
                            name="kategori">
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $data->kategori ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{ url('adm/produk/kategori/tambah') }}" class="btn btn-gradient-primary">+</a>
                    </div>
                    @error('kategori')
                        <span class="invalid-feedback" style="display: block">
                            <p class="fst-italic" style="font-size: 0.8rem">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white">Rp</span>
                            </div>
                            <input type="text"
                                class="form-control @error('harga') is-invalid                    
                @enderror"
                                name="harga" placeholder="30000" value="{{ $data->harga }}">
                            @error('harga')
                                <span class="invalid-feedback">
                                    <p class="fst-italic" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control @error('deskripsi') is-invalid                    
                @enderror"
                                name="deskripsi" placeholder="Deskripsi produk..." style="height: 100px">{{ $data->deskripsi }}
                </textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback">
                                    <p class="fst-italic" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="status" value="0">
                </div>
                <button type="submit" class="btn btn-gradient-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
@endsection
