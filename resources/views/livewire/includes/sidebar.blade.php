 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <a href="{{ url('adm/user') }}" class="nav-link">
                 <div class="nav-profile-image">
                     @if (Auth::user()->foto)
                         <img src="{{ asset('storage') }}/{{ Auth::user()->foto }}" alt="profile"
                             style="object-fit: cover">
                     @else
                         <img src="{{ asset('vendor/purpleadmin') }}/assets/images/faces/face1.jpg" alt="profile">
                     @endif
                 </div>
                 <div class="nav-profile-text d-flex flex-column">
                     <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                     @if (!implode('', Auth::user()->roles->pluck('name')->toArray()))
                         <span class="text-secondary text-small">Belum Ada</span>
                     @else
                         <span class="text-secondary text-small">{{ implode('', Auth::user()->roles->pluck('name')->toArray()) }}</span>
                     @endif
                 </div>
                 <i class="mdi mdi-arrow-right nav-profile-badge text-secondary"></i>
             </a>
         </li>

         {{-- Dashboard --}}
         <li class="nav-item">
             <a class="nav-link" href="{{ url('adm/dashboard') }}">
                 <span class="menu-title">Dashboard</span>
                 <i class="mdi mdi-home menu-icon"></i>
             </a>
         </li>
         {{-- Daftar Menu --}}
         <li class="nav-item">
             @can('akses_daftar_menu')
                 <a class="nav-link" data-bs-toggle="collapse" href="#kelola-daftar-menu" aria-expanded="false"
                     aria-controls="kelola-daftar-menu">
                     <span class="menu-title">Daftar Menu</span>
                     <i class="menu-arrow"></i>
                     <i class=" mdi mdi-format-list-bulleted-type menu-icon"></i>
                 </a>
                 <div class="collapse" id="kelola-daftar-menu">
                     <ul class="nav flex-column sub-menu">
                         @can('lihat_meja')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/meja') }}'>Daftar Meja</a>
                             </li>
                         @endcan
                         @can('lihat_status_produk')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/status') }}'>Status Produk</a>
                             </li>
                         @endcan
                     </ul>
                 </div>
             </li>
         @endcan
         {{-- Produk --}}
         @can('akses_produk')
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="collapse" href="#kelola-produk" aria-expanded="false"
                     aria-controls="kelola-produk">
                     <span class="menu-title">Produk</span>
                     <i class="menu-arrow"></i>
                     <i class=" mdi mdi-arrange-send-backward menu-icon"></i>
                 </a>
                 <div class="collapse" id="kelola-produk">
                     <ul class="nav flex-column sub-menu">
                         @can('lihat_kategori')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/kategori') }}'>Kategori</a>
                             </li>
                         @endcan
                         @can('lihat_produk')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/produk') }}'>Produk</a>
                             </li>
                         @endcan
                     </ul>
                 </div>
             </li>
         @endcan
         {{-- Karyawan --}}
         @can('akses_karyawan')
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="collapse" href="#kelola-karyawan" aria-expanded="false"
                     aria-controls="kelola-karyawan">
                     <span class="menu-title">Karyawan</span>
                     <i class="menu-arrow"></i>
                     <i class=" mdi mdi-account-switch menu-icon"></i>
                 </a>
                 <div class="collapse" id="kelola-karyawan">
                     <ul class="nav flex-column sub-menu">
                         @can('lihat_aktivasi_karyawan')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/aktivasi-karyawan') }}'>Aktivasi</a>
                             </li>
                         @endcan
                         @can('lihat_karyawan')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/daftar-karyawan') }}'>Karyawan</a>
                             </li>
                         @endcan
                     </ul>
                 </div>
             </li>
         @endcan
         {{-- Transaksi --}}
         @can('akses_transaksi')
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="collapse" href="#kelola-transaksi" aria-expanded="false"
                     aria-controls="kelola-transaksi">
                     <span class="menu-title">Transaksi</span>
                     <i class="menu-arrow"></i>
                     <i class=" mdi mdi-book-multiple-variant menu-icon"></i>
                 </a>
                 <div class="collapse" id="kelola-transaksi">
                     <ul class="nav flex-column sub-menu">
                         @can('lihat_antrian_transaksi')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/antrian') }}'>Antrian Online</a>
                             </li>
                         @endcan
                         @can('lihat_transaksi')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/tambah-transaksi') }}'>Transaksi</a>
                             </li>
                         @endcan
                         @can('lihat_daftar_transaksi')
                             <li class="nav-item">
                                 <a class="nav-link" href='{{ url('adm/daftar-transaksi') }}'>Daftar Transaksi</a>
                             </li>
                         @endcan
                     </ul>
                 </div>
             </li>
         @endcan
         {{-- Laporan --}}
         @can('akses_laporan')
             <li class="nav-item">
                 <a class="nav-link" href="{{ url('adm/laporan-transaksi') }}">
                     <span class="menu-title">Laporan Transaksi</span>
                     <i class="mdi mdi-book-open menu-icon"></i>
                 </a>
             </li>
         @endcan
         {{-- User Management --}}
         @can('akses_user_management')
             <li class="nav-item">
                 <a class="nav-link" href="{{ url('adm/user-management') }}">
                     <span class="menu-title">User Management</span>
                     <i class="mdi mdi-account-card-details menu-icon"></i>
                 </a>
             </li>
         @endcan


     </ul>
 </nav>
