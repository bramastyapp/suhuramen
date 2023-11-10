@extends('admin.layouts.app')
@section('title', 'Produk | Edit Produk')

@section('main')
    <div class="h2 mb-3">Edit Data</div>
    <a href="{{url("adm/data-produk")}}" class="btn btn-gradient-success mb-3">Kembali</a>
    <div class="card">
        <div class="card-body">

    <form action="{{url("adm/produk/$data->id")}}" method="post">
        @csrf @method('PATCH')
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
        </div>
        <div class="mb-3 row">
            <label class="form-label">Kategori</label>
            <div class="col-lg-10">
                <select class="form-control form-control-sm" name="kategori">
                    @foreach ($kategori as $k)                            
                    <option value="{{$k->id}}" {{($k->id==$data->kategori ? "selected" : "")}}>{{$k->nama_kategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2">
                <a href="{{url('adm/produk/kategori/tambah')}}" class="btn btn-gradient-primary">+</a>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-gradient-primary text-white">Rp</span>
                    </div>
                    <input type="text" class="form-control" name="harga" value="{{$data->harga}}">
                  </div>
            </div>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" name="status" value="0">
        </div>
        <button type="submit" class="btn btn-gradient-primary">Simpan</button>
    </form>
        </div>
    </div>
    @endsection