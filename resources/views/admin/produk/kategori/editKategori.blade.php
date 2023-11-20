@extends('admin.layouts.app')
@section('title', 'Produk | Edit Produk Kategori')

@section('main')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-lead-pencil"></i>
            </span> Edit Kategori
        </h3>
        <a href="{{url("adm/produk-kategori")}}" class="btn btn-gradient-success mb-3">Kembali</a>
    </div>
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