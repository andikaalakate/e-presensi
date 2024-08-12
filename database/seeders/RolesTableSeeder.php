<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Daftar role yang akan dibuat
        $roles = ['admin', 'superadmin', 'kepala_sekolah', 'kepala_jurusan', 'wali_kelas'];

        // Daftar menu yang akan diberikan permission
        $menus = [
            'lihat-siswa',
            'edit-siswa',
            'tambah-siswa',
            'hapus-siswa',
            'lihat-kelas',
            'edit-kelas',
            'tambah-kelas',
            'hapus-kelas',
            'lihat-laporan',
            'edit-laporan',
            'tambah-laporan',
            'hapus-laporan',
            'lihat-presensi',
            'edit-presensi',
            'tambah-presensi',
            'hapus-presensi',
            'lihat-pengguna',
            'edit-pengguna',
            'tambah-pengguna',
            'hapus-pengguna',
            'lihat-peringkat',
            'edit-peringkat',
            'tambah-peringkat',
            'hapus-peringkat',
            'lihat-profil',
            'edit-profil',
            'tambah-profil',
            'hapus-profil',
            'lihat-tahun-ajaran',
            'edit-tahun-ajaran',
            'tambah-tahun-ajaran',
            'hapus-tahun-ajaran',
            'lihat-jurusan',
            'edit-jurusan',
            'tambah-jurusan',
            'hapus-jurusan',
            'lihat-role',
            'edit-role',
            'tambah-role',
            'hapus-role',
            'lihat-orang-tua',
            'edit-orang-tua',
            'tambah-orang-tua',
            'hapus-orang-tua'
        ];

        // Membuat role dengan guard_name 'admin'
        foreach ($roles as $role) {
            Role::create(['name' => $role, 'guard_name' => 'admin']);
        }

        // Membuat permission berdasarkan daftar menu
        foreach ($menus as $menu) {
            Permission::create(['name' => "{$menu}", 'guard_name' => 'admin']);
        }
  
        $superAdminRole = Role::findByName('superadmin', 'admin');
        $allPermissions = Permission::all();
        $superAdminRole->givePermissionTo($allPermissions);

        $adminRole = Role::findByName('admin', 'admin');
        $adminPermissions = [
            'lihat-siswa',
            'edit-siswa',
            'tambah-siswa',
            'hapus-siswa',
            'lihat-kelas',
            'edit-kelas',
            'tambah-kelas',
            'hapus-kelas',
            'lihat-laporan',
            'edit-laporan',
            'tambah-laporan',
            'hapus-laporan',
            'lihat-presensi',
            'edit-presensi',
            'tambah-presensi',
            'hapus-presensi',
            'lihat-peringkat',
            'edit-peringkat',
            'tambah-peringkat',
            'hapus-peringkat',
            'lihat-profil',
            'edit-profil',
            'tambah-profil',
            'hapus-profil',
            'lihat-tahun-ajaran',
            'edit-tahun-ajaran',
            'tambah-tahun-ajaran',
            'hapus-tahun-ajaran',
            'lihat-jurusan',
            'edit-jurusan',
            'tambah-jurusan',
            'hapus-jurusan',
            'lihat-role',
            'edit-role',
            'tambah-role',
            'hapus-role',
            'lihat-orang-tua',
            'edit-orang-tua',
            'tambah-orang-tua',
            'hapus-orang-tua'
        ];
        $adminRole->givePermissionTo($adminPermissions);

        $kepalaSekolahRole = Role::findByName('kepala_sekolah', 'admin');
        $kepalaSekolahPermissions = [
            'lihat-siswa',
            'lihat-kelas',
            'lihat-laporan',
            'lihat-presensi',
            'lihat-pengguna',
            'lihat-peringkat',
            'lihat-profil',
            'lihat-tahun-ajaran',
            'lihat-jurusan',
            'lihat-role',
            'lihat-orang-tua'
        ];
        $kepalaSekolahRole->givePermissionTo($kepalaSekolahPermissions);

        $kepalaJurusanRole = Role::findByName('kepala_jurusan', 'admin');
        $kepalaJurusanPermissions = [
            'lihat-siswa',
            'edit-siswa',
            'tambah-siswa',
            'hapus-siswa',
            'lihat-kelas',
            'lihat-jurusan',
            'edit-jurusan',
            'lihat-profil',
            'edit-profil',
            'lihat-laporan',
            'lihat-presensi',
            'edit-presensi',
            'tambah-presensi',
            'hapus-presensi',
        ];
        $kepalaJurusanRole->givePermissionTo($kepalaJurusanPermissions);

        $waliKelasRole = Role::findByName('wali_kelas', 'admin');
        $waliKelasPermissions = [
            'lihat-siswa',
            'edit-siswa',
            'tambah-siswa',
            'hapus-siswa',
            'lihat-kelas',
            'edit-kelas',
            'lihat-profil',
            'edit-profil',
            'lihat-laporan',
            'lihat-presensi',
            'edit-presensi',
            'tambah-presensi',
            'hapus-presensi',
        ];
        $waliKelasRole->givePermissionTo($waliKelasPermissions);
    }
}
