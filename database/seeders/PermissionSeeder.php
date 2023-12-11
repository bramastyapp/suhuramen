<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //Daftar Heading
            'akses_daftar_menu',
            'akses_produk',
            'akses_karyawan',
            'akses_transaksi',
            'akses_user_management',
            'akses_laporan',
            //Daftar Menu
            'lihat_meja',
            'edit_meja',
            'lihat_status_produk',
            'edit_status_produk',
            'aktivasi_status_produk',
            //Produk
            'lihat_kategori',
            'tambah_kategori',
            'edit_kategori',
            'hapus_kategori',
            'lihat_produk',
            'tambah_produk',
            'edit_produk',
            'hapus_produk',
            //Karyawan
            'lihat_aktivasi_karyawan',            
            'owner_karyawan',
            'lihat_karyawan',
            'tambah_karyawan',
            'edit_karyawan',
            'hapus_karyawan',
            // Transaksi
            'lihat_antrian_transaksi',
            'lihat_transaksi',
            'lihat_daftar_transaksi',
            // User Roles Management
            'lihat_user_management',
            // Laporan
            'lihat_laporan',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Role::create(['name' => 'Owner'])->givePermissionTo($permissions);
        Role::create(['name' => 'Manager'])->givePermissionTo($permissions)->revokePermissionTo(['akses_user_management','lihat_user_management','owner_karyawan']);
        Role::create(['name' => 'Kasir'])->givePermissionTo($permissions)->revokePermissionTo([
            //Daftar Heading
            'akses_produk',
            'akses_karyawan',
            'akses_user_management',
            'akses_laporan',
            //Daftar Menu
            'edit_meja',
            'aktivasi_status_produk',
            //Produk
            'lihat_kategori',
            'tambah_kategori',
            'edit_kategori',
            'hapus_kategori',
            'lihat_produk',
            'tambah_produk',
            'edit_produk',
            'hapus_produk',
            //Karyawan
            'lihat_aktivasi_karyawan',            
            'owner_karyawan',
            'lihat_karyawan',
            'tambah_karyawan',
            'edit_karyawan',
            'hapus_karyawan',
            // User Roles Management
            'lihat_user_management',
        ]);
        Role::create(['name' => 'Koki'])->givePermissionTo($permissions)->revokePermissionTo([
            //Daftar Heading
            'akses_produk',
            'akses_karyawan',
            'akses_transaksi',
            'akses_user_management',
            'akses_laporan',
            //Daftar Menu
            'edit_meja',
            'aktivasi_status_produk',
            //Produk
            'lihat_kategori',
            'tambah_kategori',
            'edit_kategori',
            'hapus_kategori',
            'lihat_produk',
            'tambah_produk',
            'edit_produk',
            'hapus_produk',
            //Karyawan
            'lihat_aktivasi_karyawan',          
            'owner_karyawan',
            'lihat_karyawan',
            'tambah_karyawan',
            'edit_karyawan',
            'hapus_karyawan',
            // Transaksi
            'lihat_antrian_transaksi',
            'lihat_transaksi',
            'lihat_daftar_transaksi',
            // User Roles Management
            'lihat_user_management',
            // Laporan
            'lihat_laporan',
        ]);
        Role::create(['name' => 'Pelayan'])->givePermissionTo($permissions)->revokePermissionTo([
            //Daftar Heading
            'akses_produk',
            'akses_karyawan',
            'akses_transaksi',
            'akses_user_management',
            'akses_laporan',
            //Daftar Menu
            'edit_meja',
            'edit_status_produk',
            'aktivasi_status_produk',
            //Produk
            'lihat_kategori',
            'tambah_kategori',
            'edit_kategori',
            'hapus_kategori',
            'lihat_produk',
            'tambah_produk',
            'edit_produk',
            'hapus_produk',
            //Karyawan
            'lihat_aktivasi_karyawan',       
            'owner_karyawan',
            'lihat_karyawan',
            'tambah_karyawan',
            'edit_karyawan',
            'hapus_karyawan',
            // Transaksi
            'lihat_antrian_transaksi',
            'lihat_transaksi',
            'lihat_daftar_transaksi',
            // User Roles Management
            'lihat_user_management',
            // Laporan
            'lihat_laporan',
        ]);
        Role::create(['name' => 'OB'])->givePermissionTo($permissions)->revokePermissionTo([
            //Daftar Heading
            'akses_produk',
            'akses_karyawan',
            'akses_transaksi',
            'akses_user_management',
            'akses_laporan', //Daftar Menu
            'edit_meja',
            'edit_status_produk',
            'aktivasi_status_produk',
            //Produk
            'lihat_kategori',
            'tambah_kategori',
            'edit_kategori',
            'hapus_kategori',
            'lihat_produk',
            'tambah_produk',
            'edit_produk',
            'hapus_produk',
            //Karyawan
            'lihat_aktivasi_karyawan',         
            'owner_karyawan',
            'lihat_karyawan',
            'tambah_karyawan',
            'edit_karyawan',
            'hapus_karyawan',
            // Transaksi
            'lihat_antrian_transaksi',
            'lihat_transaksi',
            'lihat_daftar_transaksi',
            // User Roles Management
            'lihat_user_management',
            // Laporan
            'lihat_laporan',
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => 2,
            'model_type' => 'App\Models\User',
            'model_id' => 2
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => 3,
            'model_type' => 'App\Models\User',
            'model_id' => 3
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => 4,
            'model_type' => 'App\Models\User',
            'model_id' => 4
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => 5,
            'model_type' => 'App\Models\User',
            'model_id' => 5
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => 6,
            'model_type' => 'App\Models\User',
            'model_id' => 6
        ]);
    }
}
