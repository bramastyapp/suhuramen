@extends('admin.layouts.app')

@section('title', 'Produk | Kategori')

@section('main')
@include('sweetalert::alert')

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-day"></i>
            </span> Kelola Kategori
        </h3>
        <button type="button" class="btn btn-gradient-success mb-3" data-bs-toggle="modal" data-bs-target="#tambah-kategori">
            Tambah Kategori
            <i class="mdi mdi-shape-square-plus btn-icon-append"></i>
        </button>
    </div>
      
    <div class="row">
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($datas as $index => $data)               
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$data->nama_kategori}}</td>
                            <td>
                                <a href="{{url("adm/produk-kategori/$data->id/edit")}}" class="btn btn-gradient-dark btn-sm">
                                    <i class="mdi mdi-lead-pencil"></i>
                                </a>
                                <a href="{{url("adm/produk-kategori/$data->id")}}" class="btn btn-gradient-info btn-sm" onclick="confirmation(event)">
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah-kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('adm/produk-kategori')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group mt-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="contoh: Makanan">
                </div>
            </div>
            <div class="modal-footer mt-3">
            <button type="button" class="btn btn-gradient-dark" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-gradient-primary">Simpan</button>
            </div>
            </form>
        </div>
        </div>
    </div>
  

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