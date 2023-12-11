@extends('admin.layouts.app')

@section('title', 'Produk | Status')

@section('main')

@include('sweetalert::alert')

@livewire('produk.status-produk')

@endsection