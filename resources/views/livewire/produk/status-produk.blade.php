<div>
    @foreach ($kategori as $k)
    <div class="row">
        <div class="card mb-3">
            <div class="card-body">
                
                <h3 class="page-title mb-3">{{$k->nama_kategori}}</h3>
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
                                        <a class="dropdown-item" href="" wire:click.prevent='updateStatus({{$data->id}},{{$s['id']}})'>{{$s['nama']}}</a>
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
</div>
