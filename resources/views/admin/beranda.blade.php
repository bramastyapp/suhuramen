@extends('admin.layouts.app')

@section('title', 'Admin | Beranda')

@section('main')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-dashboard"></i>
            </span> Dashboard Admin
        </h3>
    </div>
    @if (!Auth::user()->status)
        <div class="card">
            <div class="card-header p-4">
            </div>
            <div class="card-body text-center pt-5 pb-5">
                <span class="fs-5 fw-semibold">Haloo <b>{{ Auth::user()->name }}</b> ! <br>
                    Selamat datang di Website Admin <b style="font-family: 'Caveat', cursive; font-size: 2rem">SuhuRamen</b>,
                    tunggu akun anda
                    diverifikasi, terimakasih.</span>
            </div>
        </div>
    @elseif (!Auth::user()->user_level)
        <div class="card">
            <div class="card-header p-4">
            </div>
            <div class="card-body text-center pt-5 pb-5">
                <span class="fs-5 fw-semibold">Haloo <b>{{ Auth::user()->name }}</b> ! <br>
                    Selamat datang di Website Admin <b
                        style="font-family: 'Caveat', cursive; font-size: 2rem">SuhuRamen</b>. Akun Anda telah diverifikasi,
                    silahkan konfirmasi jika belum dapat mengakses web ini, terimakasih.</span>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header p-4">
            </div>
            <div class="card-body text-center pt-5 pb-5">
                <span class="fs-5 fw-semibold">Haloo <b>{{ Auth::user()->name }}</b> ! <br>
                    Selamat datang di Website Admin <b
                        style="font-family: 'Caveat', cursive; font-size: 2rem">SuhuRamen</b>. Posisi pekerjaan anda sebagai
                    <b>
                        @foreach ($posisi as $p)
                            @if ($p->kode == Auth::user()->user_level)
                                {{ $p->nama_posisi }}
                            @endif
                        @endforeach
                    </b>.</span>
            </div>
        </div>
    @endif
@endsection
