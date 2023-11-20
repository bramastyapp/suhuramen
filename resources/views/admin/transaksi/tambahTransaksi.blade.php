@extends('admin.layouts.app')

@section('title', 'Admin | Transaksi')

@section('main')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-cart-plus"></i>
        </span> Buat Transaksi
    </h3>
</div>
    <div class="card mb-4">
        @livewire('transaksi.tabel-produk')
    </div>
    @livewire('transaksi.produk-cart')


@endsection
