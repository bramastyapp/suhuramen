<div>
    <div class="row mb-3">
        <div class="col">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-arrange-send-to-back "></i>
                    </span> Daftar Nomor Meja
                </h3>
            </div>
        </div>
        <div class="col">
            <span class="float-end">
                <div class="btn btn-gradient-dark btn-sm" wire:click="mejaMin()" style="cursor: pointer">
                    <i class="mdi mdi-minus"></i>
                </div>
                <div class="btn btn-secondary btn-sm">
                    &nbsp;{{ $meja }}&nbsp;
                </div>
                <div class="btn btn-gradient-dark btn-sm" wire:click="mejaPlus()" style="cursor: pointer">
                    <i class="mdi mdi-plus"></i>
                </div>
            </span>
        </div>
    </div>
    <div class="row">
        @for ($i = 1; $i <= $meja; $i++)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ url("meja/$i") }}" class="col btn btn-gradient-dark mb-3" style="font-size: 1rem">Meja
                                {{ $i }}
                            </a>
                            <div class="visible-print text-center">
                                {!! QrCode::format('svg')->size(230)->generate(url("/meja/M$i")) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
