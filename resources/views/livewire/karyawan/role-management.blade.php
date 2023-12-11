<div>
    <div class="card">
        <div class="card-body">
            @if ($role)
                <div class="form-group">
                    <div class="btn btn-gradient-success btn-sm">
                        <i class="mdi mdi-account"></i>
                        {{ $role->name }}
                    </div>
                    <div wire:click="$emit('formRoleClose')" class="btn btn-gradient-dark btn-sm float-end">
                        <i class="mdi mdi-close"></i>                        
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="permissions">
                        Permissions <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row">
                    <!-- Daftar Menu Permissions -->
                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-header">
                                <div class="form-check m-0">
                                    <label class="form-check-label">
                                        <input wire:click="updateRole('akses_daftar_menu')" type="checkbox"
                                            class="form-check-input"
                                            {{ $role->hasPermissionTo('akses_daftar_menu') ? 'checked' : '' }}>
                                        Daftar Menu
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body p-2" style="padding-left: 1.5rem !important;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_meja')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_meja') ? 'checked' : '' }}>
                                                Lihat Meja
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('edit_meja')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('edit_meja') ? 'checked' : '' }}>
                                                Edit Meja
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_status_produk')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_status_produk') ? 'checked' : '' }}>
                                                Lihat Status Produk
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('edit_status_produk')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('edit_status_produk') ? 'checked' : '' }}>
                                                Edit Status Produk
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('aktivasi_status_produk')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('aktivasi_status_produk') ? 'checked' : '' }}>
                                                Aktivasi Status Produk
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Produk Permissions -->
                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-header">
                                <div class="form-check m-0">
                                    <label class="form-check-label">
                                        <input wire:click="updateRole('akses_produk')" type="checkbox"
                                            class="form-check-input"
                                            {{ $role->hasPermissionTo('akses_produk') ? 'checked' : '' }}>
                                        Akses Produk
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body p-2" style="padding-left: 1.5rem !important;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_produk')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_produk') ? 'checked' : '' }}>
                                                Lihat Produk
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('tambah_produk')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('tambah_produk') ? 'checked' : '' }}>
                                                Tambah Produk
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('edit_produk')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('edit_produk') ? 'checked' : '' }}>
                                                Edit Produk
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('hapus_produk')" type="checkbox"
                                                    class="form-check-input"
                                                    {{ $role->hasPermissionTo('hapus_produk') ? 'checked' : '' }}>
                                                Hapus Produk
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_kategori')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_kategori') ? 'checked' : '' }}>
                                                Lihat Kategori
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('tambah_kategori')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('tambah_kategori') ? 'checked' : '' }}>
                                                Tambah Kategori
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('edit_kategori')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('edit_kategori') ? 'checked' : '' }}>
                                                Edit Kategori
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('hapus_kategori')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('hapus_kategori') ? 'checked' : '' }}>
                                                Hapus Kategori
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Karyawan Permissions -->
                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-header">
                                <div class="form-check m-0">
                                    <label class="form-check-label">
                                        <input wire:click="updateRole('akses_karyawan')" type="checkbox" class="form-check-input"
                                            {{ $role->hasPermissionTo('akses_karyawan') ? 'checked' : '' }}>
                                        Akses Karyawan
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body p-2" style="padding-left: 1.5rem !important;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_aktivasi_karyawan')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_aktivasi_karyawan') ? 'checked' : '' }}>
                                                Lihat & Edit Aktivasi
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_karyawan')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_karyawan') ? 'checked' : '' }}>
                                                Lihat Karyawan
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('tambah_karyawan')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('tambah_karyawan') ? 'checked' : '' }}>
                                                Tambah Karyawan
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('edit_karyawan')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('edit_karyawan') ? 'checked' : '' }}>
                                                Edit Karyawan
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('hapus_karyawan')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('hapus_karyawan') ? 'checked' : '' }}>
                                                Hapus Karyawan
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('owner_karyawan')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('owner_karyawan') ? 'checked' : '' }}>
                                                Owner Edit Karyawan
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Transaksi Permissions -->
                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-header">
                                <div class="form-check m-0">
                                    <label class="form-check-label">
                                        <input wire:click="updateRole('akses_transaksi')" type="checkbox" class="form-check-input"
                                            {{ $role->hasPermissionTo('akses_transaksi') ? 'checked' : '' }}>
                                        Akses Transaksi
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body p-2" style="padding-left: 1.5rem !important;">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_antrian_transaksi')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_antrian_transaksi') ? 'checked' : '' }}>
                                                Antrian Transaksi Pelanggan
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_transaksi')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_transaksi') ? 'checked' : '' }}>
                                                Transaksi
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_daftar_transaksi')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_daftar_transaksi') ? 'checked' : '' }}>
                                                Lihat Daftar Transaksi
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lpoeran Transaksi Permissions -->
                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-header">
                                <div class="form-check m-0">
                                    <label class="form-check-label">
                                        <input wire:click="updateRole('akses_laporan')" type="checkbox" class="form-check-input"
                                            {{ $role->hasPermissionTo('akses_laporan') ? 'checked' : '' }}>
                                        Akses Laporan Transaksi
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body p-2" style="padding-left: 1.5rem !important;">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_laporan')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_laporan') ? 'checked' : '' }}>
                                                Lihat Laporan Transaksi
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Management Permissions -->
                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-header">
                                <div class="form-check m-0">
                                    <label class="form-check-label">
                                        <input wire:click="updateRole('akses_user_management')" type="checkbox" class="form-check-input"
                                            {{ $role->hasPermissionTo('akses_user_management') ? 'checked' : '' }}>
                                        Akses User Management
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body p-2" style="padding-left: 1.5rem !important;">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check m-0">
                                            <label class="form-check-label">
                                                <input wire:click="updateRole('lihat_user_management')" type="checkbox" class="form-check-input"
                                                    {{ $role->hasPermissionTo('lihat_user_management') ? 'checked' : '' }}>
                                                Lihat User Management
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="fst-italic text-center">loading...</p>
            @endif
        </div>
    </div>
</div>
