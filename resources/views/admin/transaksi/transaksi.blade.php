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
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <th>Kasir</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    @foreach ($transaksi as $t)
                        <tr>
                            <td>
                                @foreach ($kasir as $k)
                                    @if ($t->id_user == $k->id)
                                        {{ $k->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $t->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
