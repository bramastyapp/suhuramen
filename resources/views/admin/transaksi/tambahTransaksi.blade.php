@extends('admin.layouts.app')

@section('title', 'Admin | Transaksi')

@section('main')
    <div class="h2 mb-3">Buat Pesanan</div>
    <div class="card mb-4">
        @livewire('transaksi.tabel-produk')
    </div>
    @livewire('transaksi.produk-cart')


@endsection
