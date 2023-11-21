<style>
    nav .navbar2-logo {
        font-family: "Caveat", cursive;
        text-decoration: none;
        font-size: 2.5rem;
        font-weight: 700;
        color: #da8cff;
    }

    nav .navbar2-logo span {
        color: #9a55ff;
    }
</style>
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        {{-- <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('vendor/purpleadmin')}}/assets/images/logo.svg" alt="logo" /></a> --}}
        <a class="brand-logo navbar2-logo" href="/adm/">Suhu<span>Ramen</span></a>
        <a class="navbar-brand brand-logo-mini" href="/adm/"><img
                src="{{ asset('vendor/purpleadmin') }}/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        @guest
        @else
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
        @endguest

        <ul class="navbar-nav navbar-nav-right">
            @guest
                <li>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-gradient-primary">Sign-up</a>
                </li>
            @else
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ asset('vendor/purpleadmin') }}/assets/images/faces/face1.jpg" alt="image">
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                    </div>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf
                    </form>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
            @endguest
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
