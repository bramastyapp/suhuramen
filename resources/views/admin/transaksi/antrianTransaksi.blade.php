@extends('admin.layouts.app')

@section('title', 'Admin | Antrian Pembeli')

@section('main')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-format-list-numbered"></i>
            </span> Antrian Transaksi
        </h3>
    </div>
    <div class="mb-4">
        @livewire('transaksi.antrian-transaksi')
    </div>
    {{-- @livewire('transaksi.produk-cart') --}}


@endsection