@extends('admin.layouts.app')

@section('title', 'Produk | Tambah Produk')

@section('main')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-shape-square-plus"></i>
            </span> Tambah Produk
        </h3>
        <a href="{{ url('adm/data-produk') }}" class="btn btn-gradient-success mb-3">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">

            <form action="{{ url('adm/produk') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text"
                        class="form-control @error('nama') is-invalid                    
                @enderror"
                        name="nama" placeholder="Ultimate Ramen">
                    @error('nama')
                        <span class="invalid-feedback">
                            <p class="fst-italic" style="font-size: 0.8rem">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label class="form-label">Kategori</label>
                    <div class="col-lg-10">
                        <select
                            class="form-control form-control-sm @error('kategori') is-invalid                    
                    @enderror"
                            name="kategori">
                            <option selected disabled>--Pilih Kategori--</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
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
                                name="harga" placeholder="30000">
                            @error('harga')
                                <span class="invalid-feedback">
                                    <p class="fst-italic" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled=""
                                placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control @error('deskripsi') is-invalid                    
                        @enderror"
                                name="deskripsi" placeholder="Deskripsi produk..." style="height: 100px">
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
