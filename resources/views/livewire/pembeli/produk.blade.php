<div class="container" data-aos="fade-up">
    <div class="section-header mb-3">
        <h2>Menu</h2>
    </div>
    @foreach ($kategori as $k)
        <div class="section-category mb-3">
            <div class="h5">{{ $k->nama_kategori }}</div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            @foreach ($produk as $p)
                @if ($p->kategori == $k->id)
                    <div class="col-lg-4 col-md-6">
                        <div class="hotel">
                            <div class="hotel-img">                                
                                <img src="{{ asset("img/$k->nama_kategori.jpg") }}" alt="Ramen" class="img-fluid">
                            </div>
                            <h3><a href="#">{{ $p->nama }}</a></h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <div class="harga float-end">Rp {{ number_format($p->harga, 0, ',', '.') }}</div>
                            </div>
                            <p class="align-middle">
                                Ramen isi daging sapi
                                <a class="buy-tickets float-end" href="#" onMouseOver="this.style.color='#f82249'" onMouseOut="this.style.color='#fff'" style="color: #fff;font-size: 1rem">
                                    <i class="bi bi-cart-fill"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</div>
