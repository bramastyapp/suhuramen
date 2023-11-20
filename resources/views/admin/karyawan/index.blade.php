@extends('admin.layouts.app')

@section('title', 'Karyawan | Dashboard')

@section('main')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-card-details"></i>
            </span> Kelola Karyawan
        </h3>
    </div>
    @livewire('karyawan.karyawan')
@endsection
