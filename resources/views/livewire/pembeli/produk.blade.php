<div>
    <section id="menus" class="section-with-bg pt-5 pb-5">
        <style>
            .box {
                position: relative;
                max-width: 600px;
                width: 90%;
                height: 400px;
                background: #fff;
                box-shadow: 0 0 15px rgba(0, 0, 0, .1);
            }

            /* common */
            .ribbon {
                width: 150px;
                height: 150px;
                overflow: hidden;
                position: absolute;
            }

            .ribbon::before,
            .ribbon::after {
                position: absolute;
                z-index: -1;
                content: '';
                display: block;
                border: 5px solid #ccc;
            }

            .ribbon span {
                position: absolute;
                display: block;
                z-index: 5;
                width: 225px;
                padding: 15px 0;
                background-color: #ccc;
                box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
                color: #fff;
                font: 700 18px/1 'Lato', sans-serif;
                text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
                text-transform: uppercase;
                text-align: center;
            }

            /* top left*/
            .ribbon-top-left {
                top: -10px;
                left: -10px;
            }

            .ribbon-top-left::before,
            .ribbon-top-left::after {
                border-top-color: transparent;
                border-left-color: transparent;
            }

            .ribbon-top-left::before {
                top: 0;
                right: 0;
            }

            .ribbon-top-left::after {
                bottom: 0;
                left: 0;
            }

            .ribbon-top-left span {
                right: -25px;
                top: 30px;
                transform: rotate(-45deg);
            }
        </style>
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
                        @if ($p->produk_kategori_id == $k->id && $p->status === 1 && $p->status_produk === 1)
                            <div class="col-lg-4 col-md-6">
                                <div class="menu">
                                    <div class="menu-img">
                                        @if ($p->gambar)
                                            <img src="{{ asset("/storage/$p->gambar") }}" alt="Ramen"
                                                class="img-fluid">
                                        @else
                                            <img src="{{ asset('/storage/menu-default.jpg') }}" alt="Ramen"
                                                class="img-fluid">
                                        @endif
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
                    @foreach ($produk as $p)
                        @if ($p->produk_kategori_id == $k->id && $p->status === 0 && $p->status_produk === 1)
                            <div class="col-lg-4 col-md-6">
                                <div class="menu box">
                                    <div class="ribbon ribbon-top-left"><span>Habis</span></div>
                                    <div class="menu-img">
                                        @if ($p->gambar)
                                            <img src="{{ asset("/storage/$p->gambar") }}" alt="Ramen"
                                                class="img-fluid" style="filter: grayscale(100%);">
                                        @else
                                            <img src="{{ asset('/storage/menu-default.jpg') }}" alt="Ramen"
                                                class="img-fluid">
                                        @endif
                                    </div>
                                    <h3 class=""><a href="#" class="text-secondary">{{ $p->nama }}</a></h3>
                                    <div class="stars">
                                        <i class="mdi mdi-star text-secondary"></i>
                                        <i class="mdi mdi-star text-secondary"></i>
                                        <i class="mdi mdi-star text-secondary"></i>
                                        <i class="mdi mdi-star text-secondary"></i>
                                        <i class="mdi mdi-star text-secondary"></i>
                                        <div class="harga float-end p-0 text-secondary">Rp {{ number_format($p->harga, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <p class="align-middle mb-2 text-secondary">
                                        {{ $p->deskripsi }}
                                    </p>
                                    <div class="row m-3 mt-1 justify-content-end">
                                        <div class="col btn btn-sm btn-rounded btn-secondary">
                                            <span style="font-size: 1rem; cursor: pointer;">
                                                <i class="mdi mdi-cart"></i>
                                            </span>
                                        </div>
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
