@extends('admin.layouts.app')

@section('title', 'Produk | Status')

@section('main')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-view-agenda"></i>
        </span> Kelola Status Produk
    </h3>
</div>

@include('sweetalert::alert')

@livewire('produk.status-produk')

@endsection