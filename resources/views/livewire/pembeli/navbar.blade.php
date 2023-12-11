<div>
    <nav class="navbar2">
        <a class="navbar2-logo" href="/">Suhu<span>Ramen</span></a>
        <div class="hidden-nav"></div>
        <div class="navbar2-nav">
            @if (!session('pelunasan'))
            <a href="/" id="menu">Menu</a>                
            <a class="position-relative" id="cart" href="/keranjang">
                <i class="mdi mdi-cart" style="font-size: 1.3rem"></i>&nbsp;
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                    style="background-color: #f82249; padding: 0.2rem 0.4rem">
                    {{ $cartTotal }}
                </span>
            </a>
            @endif
            @if (session('no_meja'))                
            <div class="col btn btn-sm btn-rounded btn-cart" style="font-family: 'ubuntu-regular', sans-serif">
                &nbsp;{{ session('no_meja') }}
            </div>
            @endif
        </div>
    </nav>
</div>
