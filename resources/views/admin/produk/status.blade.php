@extends('admin.layouts.app')

@section('title', 'Produk | Status')

@section('main')
<div class="h2 mb-3">Kelola Status Produk</div>

@include('sweetalert::alert')

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
                            <th>Status</th>
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
                            <td>
                                @foreach ($status as $st)                            
                                    @if ($data->status == $st['id'])
                                    <button class="btn btn-sm btn-gradient-{{$st['warna']}} dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$st['nama']}}
                                    </button>
                                    @endif
                                    <div class="dropdown-menu">
                                        @foreach ($status as $s)                                            
                                        <a class="dropdown-item" href="{{url("adm/produk/status/$data->id")}}/{{$s['id']}}">{{$s['nama']}}</a>
                                        @endforeach
                                      </div>
                                @endforeach
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function status(e)
        {
            e.preventDefault();
            const urlRedirect = e.currentTarget.getAttribute('href');
            console.log(urlRedirect);
       
            $.ajax({    
            type: "GET",
            url: urlRedirect, 
            data:{page:urlRedirect},            
            dataType: "html",                  
            success: function(data){
                $('#pageContent').html(data); 
                console.log('halo')
            }
            });
        }
    </script>
@endsection