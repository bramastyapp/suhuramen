@extends('admin.layouts.app')
@section('title', 'Produk | Edit Produk Kategori')

@section('main')
    <div class="h2 mb-3">Edit Data</div>
    <a href="{{url("adm/produk-kategori")}}" class="btn btn-gradient-success mb-3">Kembali</a>
    <div class="card">
        <div class="card-body">
            <form action="{{url("adm/produk-kategori/$data->id")}}" method="post">
                @csrf @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" value="{{$data->nama_kategori}}">
                </div>
                <button type="submit" class="btn btn-gradient-primary">Simpan</button>
            </form>
        </div>
    </div>
    @endsection