<div>
    <section id="menus" class="section-with-bg pt-5 pb-5">
        <div class="container">
            <div class="section-header mb-3">
                <div class="h2 judul">Menu</div>
            </div>
            @foreach ($kategori as $k)
                <div class="section-category mb-3">
                    <div class="h4">{{ $k->nama_kategori }}</div>
                </div>
                <div class="row">
                    @foreach ($produk as $p)
                        @if ($p->kategori == $k->id && $p->status===2)
                            <div class="col-lg-4 col-md-6">
                                <div class="menu">
                                    <div class="menu-img">
                                        <img src="{{ asset("img/$k->nama_kategori.jpg") }}" alt="Ramen"
                                            class="img-fluid">
                                    </div>
                                    <h3><a href="#">{{ $p->nama }}</a></h3>
                                    <div class="stars">
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <div class="harga float-end p-0">Rp {{ number_format($p->harga, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <p class="align-middle mb-2">
                                        {{ $p->deskripsi }}
                                    </p>
                                    <div class="row m-3 mt-1 justify-content-end">
                                        <button class="col btn btn-sm btn-rounded btn-cart"
                                                wire:click.prevent='selectProduct({{ $p->id }})'>
                                                <span style="font-size: 1rem; cursor: pointer;">
                                                    <i class="mdi mdi-cart"></i>
                                                </span>
                                            </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
</div>
