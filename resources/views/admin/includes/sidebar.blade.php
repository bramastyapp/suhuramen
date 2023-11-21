<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('vendor/purpleadmin') }}/assets/images/faces/face1.jpg" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    @php
                        use App\Models\UserPosisi;
                    @endphp
                    @foreach (UserPosisi::all() as $posisi)
                        @if ($posisi->kode == Auth::user()->user_level)
                            <span class="text-secondary text-small">{{ $posisi->nama_posisi }}</span>
                        @endif
                    @endforeach
                    @if (!Auth::user()->user_level)
                        <span class="text-secondary text-small">Belum Ada</span>
                    @endif
                </div>
                @if (Auth::user()->status == 1)
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                @else
                    <i class="mdi mdi-bookmark-remove text-danger nav-profile-badge"></i>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('adm/dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @if (Auth::user()->status === 1 && Auth::user()->user_level)
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#kelola-menu" aria-expanded="false"
                    aria-controls="kelola-menu">
                    <span class="menu-title">Menu</span>
                    <i class="menu-arrow"></i>
                    <i class=" mdi mdi-view-list menu-icon"></i>
                </a>
                <div class="collapse" id="kelola-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('adm/no-meja') }}">Daftar Meja</a></li>
                        @if (Auth::user()->status === 1 && Auth::user()->user_level < 6 && Auth::user()->user_level)
                            <li class="nav-item"> <a class="nav-link" href="{{ url('adm/status-produk') }}">Status
                                    Produk</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif
        @if (Auth::user()->status === 1 && Auth::user()->user_level < 4 && Auth::user()->user_level)
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#kelola-produk" aria-expanded="false"
                    aria-controls="kelola-produk">
                    <span class="menu-title">Produk</span>
                    <i class="menu-arrow"></i>
                    <i class=" mdi mdi-view-list menu-icon"></i>
                </a>
                <div class="collapse" id="kelola-produk">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('adm/produk-kategori') }}">Kategori</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('adm/data-produk') }}">Produk</a>
                        </li>
                </div>
            </li>
            @if (Auth::user()->status === 1 && Auth::user()->user_level < 4 && Auth::user()->user_level)
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#kelola-pegawai" aria-expanded="false"
                        aria-controls="kelola-pegawai">
                        <span class="menu-title">Karyawan</span>
                        <i class="menu-arrow"></i>
                        <i class=" mdi mdi-account-multiple menu-icon"></i>
                    </a>
                    <div class="collapse" id="kelola-pegawai">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('adm/aktivasi-karyawan') }}">Aktivasi
                                    Karyawan</a>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('adm/data-karyawan') }}">Karyawan</a>
                            </li>
                            @if (Auth::user()->user_level == 1)
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('adm/karyawan/management') }}">User
                                        Management</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
        @endif
        @if (Auth::user()->status === 1 && Auth::user()->user_level < 5 && Auth::user()->user_level)
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#kelola-transaksi" aria-expanded="false"
                    aria-controls="kelola-transaksi">
                    <span class="menu-title">Transaksi</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-wallet menu-icon"></i>
                </a>
                <div class="collapse" id="kelola-transaksi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('adm/antrian-pembeli') }}">Antrian</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('adm/transaksi/tambah') }}">Buat
                                Transaksi</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('adm/data-transaksi') }}">Semua
                                Transaksi</a></li>
                    </ul>
                </div>
            </li>
        @endif

    </ul>
</nav>
