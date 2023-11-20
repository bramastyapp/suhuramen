@extends('admin.layouts.app')

@section('title', 'Menu | Daftar Meja')

@section('main')
    @include('sweetalert::alert')
    @livewire('menu.no-meja')
@endsection