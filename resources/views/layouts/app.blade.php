<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SuhuRamen #1 di Indonesia</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendor/purpleadmin') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/purpleadmin') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('vendor/purpleadmin') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('vendor/purpleadmin') }}/assets/images/favicon.ico" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Quicksand:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    @livewireStyles
</head>
<style>
    #hero {
        width: 100%;
        height: 100vh;
        background: url(../../../../img/hero-ramen.jpg) top center;
        background-size: cover;
        overflow: hidden;
        position: relative;
    }

    @media (min-width: 1024px) {
        #hero {
            background-attachment: fixed;
        }
    }

    #hero:before {
        content: "";
        background: rgba(6, 12, 34, 0.8);
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }

    #hero .hero-container {
        position: absolute;
        bottom: 0;
        left: 0;
        top: 90px;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        padding: 0 15px;
    }

    @media (max-width: 991px) {
        #hero .hero-container {
            top: 70px;
        }
    }

    #hero h1 {
        color: #fff;
        font-family: "Raleway", sans-serif;
        font-size: 56px;
        font-weight: 600;
        text-transform: uppercase;
    }

    #hero h1 span {
        color: #f82249;
    }

    @media (max-width: 991px) {
        #hero h1 {
            font-size: 34px;
        }
    }

    #hero p {
        color: #ebebeb;
        font-weight: 700;
        font-size: 20px;
    }

    @media (max-width: 991px) {
        #hero p {
            font-size: 16px;
        }
    }

    #hero .play-btn {
        width: 94px;
        height: 94px;
        background: radial-gradient(#f82249 50%, rgba(101, 111, 150, 0.15) 52%);
        border-radius: 50%;
        display: block;
        position: relative;
        overflow: hidden;
    }

    #hero .play-btn::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 100;
        transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }

    #hero .play-btn:before {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        animation-delay: 0s;
        animation: pulsate-btn 2s;
        animation-direction: forwards;
        animation-iteration-count: infinite;
        animation-timing-function: steps;
        opacity: 1;
        border-radius: 50%;
        border: 2px solid rgba(163, 163, 163, 0.4);
        top: -15%;
        left: -15%;
        background: rgba(198, 16, 0, 0);
    }

    #hero .play-btn:hover::after {
        border-left: 15px solid #f82249;
        transform: scale(20);
    }

    #hero .play-btn:hover::before {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border: none;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 200;
        animation: none;
        border-radius: 0;
    }

    #hero .about-btn {
        font-family: "Raleway", sans-serif;
        font-weight: 500;
        font-size: 14px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 12px 32px;
        border-radius: 50px;
        transition: 0.5s;
        line-height: 1;
        margin: 10px;
        color: #fff;
        animation-delay: 0.8s;
        border: 2px solid #f82249;
    }

    #hero .about-btn:hover {
        background: #f82249;
        color: #fff;
    }

    @keyframes pulsate-btn {
        0% {
            transform: scale(0.6, 0.6);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
            opacity: 0;
        }
    }

    a {
        text-decoration: none;
    }

    nav {
        display: flex;
        background-color: rgba(6, 12, 34, 0.9);
        align-items: center;
        justify-content: space-between;
        backdrop-filter: blur(2px);
        border-bottom: 1px solid rgb(155, 114, 38, 0.2);
        position: fixed;
        padding: 0.7rem 7%;
        top: 0;
        right: 0;
        left: 0;
        z-index: 9999;
    }

    nav .navbar2-logo {
        font-family: "Caveat", cursive;
        text-decoration: none;
        font-size: 2.5rem;
        font-weight: 700;
        color: #fff;
    }

    nav .navbar2-logo span {
        color: #f82249;
    }

    nav .navbar2-nav {
        margin-top: 0.5rem;
        padding-left: 28rem;
    }

    nav .navbar2-nav a {
        display: inline-block;
        text-decoration: none;
        color: rgba(202, 206, 221, 0.8);
        margin: 0 2rem;
        font-size: 1rem;
        transition: 0.2s linear;
    }

    nav .navbar2-nav a:hover,
    nav .navbar2-nav .active {
        color: #fff;
    }

    nav .navbar2-nav .active::after {
        content: "";
        display: block;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f82249;
        transform: scaleX(0.8);
        transition: 0.2s linear;
    }

    nav .navbar2-nav a::after {
        content: "";
        display: block;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f82249;
        transform: scaleX(0);
        transition: 0.2s linear;
    }

    nav .navbar2-nav a:hover::after {
        transform: scaleX(0.8);
    }

    .section-header {
        margin-bottom: 60px;
        position: relative;
        padding-bottom: 20px;
    }

    .section-header::before {
        content: "";
        position: absolute;
        display: block;
        width: 60px;
        height: 5px;
        background: #f82249;
        bottom: 0;
        left: calc(50% - 25px);
    }

    .section-category {
        position: relative;
        padding-bottom: 20px;
    }

    .section-category::before {
        content: "";
        position: absolute;
        display: block;
        width: 60px;
        height: 5px;
        background: #f82249;
        bottom: 8px;
        left: 0;
    }

    .section-category h2 {
        font-size: 36px;
        text-transform: uppercase;
        text-align: center;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .judul {
        font-size: 36px;
        text-transform: uppercase;
        text-align: center;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .btn-danger-2 {
        background-color: #f82249;
        color: #fff;
    }

    .btn-danger-2:hover {
        background-color: #d11e3f;
        color: #fff;
    }

    /*--------------------------------------------------------------
     Menu Section
    --------------------------------------------------------------*/
    #menus {
        padding: 60px 0;
    }

    #menus .menu {
        border: 1px solid #e0e5fa;
        background: #fff;
        margin-bottom: 30px;
    }

    #menus .menu:hover .menu-img img {
        transform: scale(1.1);
    }

    #menus .menu-img {
        overflow: hidden;
        margin-bottom: 15px;
    }

    #menus .menu-img img {
        object-fit: cover;
        width: 100%;
        height: 15rem;
        transition: 0.3s ease-in-out;
    }

    #menus h3 {
        font-weight: 600;
        font-size: 20px;
        margin-bottom: 5px;
        padding: 0 20px;
    }

    #menus a {
        color: #152b79;
    }

    #menus a:hover {
        color: #f82249;
    }

    #menus .stars {
        padding: 0 20px;
        margin-bottom: 5px;
    }

    #menus .stars i {
        color: rgb(255, 195, 29);
    }

    #menus p {
        padding: 0 20px;
        margin-bottom: 30px;
        color: #060c22;
        font-style: italic;
        font-size: 0.8rem;
    }

    #menus .harga {
        padding: 0 20px;
        color: #060c22;
        font-style: bold;
        font-size: 1rem;
    }

    .btn-cart {
        background-color: #f82249;
        color: #fff;
    }

    .btn-cart:hover {
        background-color: #fa6d87;
        color: #fff;
    }
</style>

<body style="background-color: #f6f7fd">
    <div class="container-scroller">
        <livewire:pembeli.navbar>
            @if (session('no_meja'))
                <div class="container-fluid page-body-wrapper">
                    <div class="container mt-5">
                        <div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <livewire:pembeli.hero>
                </div>
            @endif
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    @livewireScripts
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
        })
    </script>
    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });
    </script>
</body>

</html>
