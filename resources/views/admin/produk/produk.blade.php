@extends('admin.layouts.app')

@section('title', 'Produk | Dashboard')

@section('main')
@include('sweetalert::alert')

        <div class="h2 mb-3">Kelola Produk</div>
        <a href="{{url("adm/produk/tambah-data")}}" class="btn btn-gradient-success btn-icon-text mb-3">
            Tambah
            <i class="mdi mdi-shape-square-plus btn-icon-append"></i>
        </a>

    @foreach ($kategori as $k)

    <div class="row">
        <div class="card mb-3">
            <div class="card-body">
                <div class="h3 mb-3">{{$k->nama_kategori}}</div>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($datas as $index => $data)
                        @if ($data->kategori == $k->id)                
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->harga}}</td>
                            <td>
                                <a href="{{url("adm/produk/$data->id/edit")}}" class="btn btn-gradient-dark btn-sm">
                                    <i class="mdi mdi-lead-pencil"></i>
                                </a>
                                <a href="{{url("adm/produk/$data->id")}}" class="btn btn-gradient-info btn-sm" onclick="confirmation(event)">
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
           
    @endforeach
    <script type="text/javascript">
        function confirmation(e)
        {
            e.preventDefault();
            const urlRedirect = e.currentTarget.getAttribute('href');
            // console.log(urlRedirect);

            swal({
                title:"Perhatian!",
                text:"Apa anda yakin ingin menghapus?",
                icon:'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel)=>{
                if(willCancel){
                    window.location.href = urlRedirect;
                }
            });
        }
    </script>
@endsection