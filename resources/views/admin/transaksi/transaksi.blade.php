@extends('admin.layouts.app')

@section('title', 'Admin | Semua Transaksi')

@section('main')

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-list"></i>
            </span> Semua Transaksi
        </h3>
    </div>
   @livewire('transaksi.kasir-transaksi')
@endsection
