<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset('vendor/purpleadmin')}}/assets/images/faces/face1.jpg" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">David Grey. H</span>
            <span class="text-secondary text-small">Project Manager</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kelola-produk" aria-expanded="false" aria-controls="kelola-produk">
          <span class="menu-title">Produk</span>
          <i class="menu-arrow"></i>
          <i class=" mdi mdi-view-list menu-icon"></i>
        </a>
        <div class="collapse" id="kelola-produk">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('adm/produk-kategori')}}">Kategori</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('adm/data-produk')}}">Produk</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('adm/produk/status')}}">Status Produk</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kelola-pegawai" aria-expanded="false" aria-controls="kelola-pegawai">
          <span class="menu-title">Pegawai</span>
          <i class="menu-arrow"></i>
          <i class=" mdi mdi-account-multiple menu-icon"></i>
        </a>
        <div class="collapse" id="kelola-pegawai">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">Pegawai</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kelola-transaksi" aria-expanded="false" aria-controls="kelola-transaksi">
          <span class="menu-title">Transaksi</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-wallet menu-icon"></i>
        </a>
        <div class="collapse" id="kelola-transaksi">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('adm/transaksi/tambah')}}">Buat Transaksi</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('adm/data-transaksi')}}">Semua Transaksi</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item sidebar-actions">
        <span class="nav-link">
          <div class="border-bottom">
            <h6 class="font-weight-normal mb-3">Projects</h6>
          </div>
          <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
          <div class="mt-4">
            <div class="border-bottom">
              <p class="text-secondary">Categories</p>
            </div>
            <ul class="gradient-bullet-list mt-4">
              <li>Free</li>
              <li>Pro</li>
            </ul>
          </div>
        </span>
      </li>
    </ul>
  </nav>