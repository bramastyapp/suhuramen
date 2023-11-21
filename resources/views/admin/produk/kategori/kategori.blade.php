@extends('admin.layouts.app')

@section('title', 'Produk | Kategori')

@section('main')
@include('sweetalert::alert')

@livewire('produk-kategori.kategori')
@endsection