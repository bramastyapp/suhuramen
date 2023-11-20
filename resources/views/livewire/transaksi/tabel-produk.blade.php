<div class="position-relative">
    <div class="card-body">
        <div class="form-group mb-0">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="mdi mdi-magnify"></i>
                </span>
            </div>
            <input type="text" class="form-control" wire:keydown.escape="resetQuery" wire:model="query" placeholder="Cari produk..." autofocus>
            </div>
        </div>
    </div>
    @if(!empty($query))
    <div wire:click="resetQuery" class="position-fixed w-100 h-100" style="left: 0; top: 0; right: 0; bottom: 0;z-index: 1;"></div>
    @if($search_results->isNotEmpty())
            <div class="card position-absolute mt-1" style="z-index: 2;left: 0;right: 0;border: 0;">
                <div class="card-body shadow">
                    <ul class="list-group list-group-flush">
                        @foreach($search_results as $result)
                            <li class="list-group-item list-group-item-action">
                                <a class="text-decoration-none text-black" wire:click="resetQuery" wire:click.prevent="selectProduct({{ $result->id}}, {{$kasir->id}})" href="#">
                                    {{ $result->nama }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <div class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
                <div class="card-body shadow">
                    <div class="alert alert-warning mb-0">
                        Produk tidak ditemukan!
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
