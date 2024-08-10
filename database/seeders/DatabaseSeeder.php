<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\User;
use App\Models\WaliKelas;
use App\Models\KepalaJurusan;
use App\Models\Siswa;
use App\Models\SiswaLogin;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Role dengan guard_name 'admin'
        Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        Role::create(['name' => 'kepala_sekolah', 'guard_name' => 'admin']);
        Role::create(['name' => 'kepala_jurusan', 'guard_name' => 'admin']);
        Role::create(['name' => 'wali_kelas', 'guard_name' => 'admin']);

        // Buat User untuk Kepala Jurusan
        $kepala_jurusan_user = User::create([
            "nama" => "Kepala Jurusan",
            "email" => "kepala@jurusan.com",
            "password" => bcrypt("kepalajurusan"),
            "jenis_kelamin" => "Laki-Laki",
            "tanggal_lahir" => "2000-01-01",
        ]);
        $kepala_jurusan_user->assignRole("kepala_jurusan");

        // Buat Kepala Jurusan
        $kepala_jurusan = KepalaJurusan::create([
            'user_id' => $kepala_jurusan_user->id,
        ]);

        // Buat Jurusan
        $jurusan = Jurusan::create([
            "nama_jurusan" => "Rekayasa Perangkat Lunak",
            "singkatan_jurusan" => "RPL",
            "kepala_jurusan_id" => $kepala_jurusan->id,
        ]);

        // Buat Tahun Ajaran
        $tahun_ajaran = TahunAjaran::create([
            "tahun_mulai" => "2022",
            "tahun_selesai" => "2023",
        ]);

        // Loop untuk membuat beberapa kelas dalam satu jurusan
        for ($i = 1; $i <= 3; $i++) { // Menghasilkan 3 kelas
            $kelas = Kelas::create([
                "nama_kelas" => "RPL $i",
                "jurusan_id" => $jurusan->id,
                "tahun_ajaran_id" => $tahun_ajaran->id,
            ]);

            // Buat Wali Kelas untuk setiap kelas
            $wali_kelas_user = User::create([
                "nama" => "Wali Kelas $i",
                "email" => "wali$i@kelas.com",
                "password" => bcrypt("walikelas$i"),
                "jenis_kelamin" => "Laki-Laki",
                "tanggal_lahir" => "2000-01-01",
            ]);
            $wali_kelas_user->assignRole("wali_kelas");

            WaliKelas::create([
                "user_id" => $wali_kelas_user->id,
                "kelas_id" => $kelas->id,
            ]);

            // Loop untuk membuat beberapa siswa dalam setiap kelas
            for ($j = 1; $j <= 5; $j++) { // Menghasilkan 5 siswa per kelas
                Siswa::create([
                    "nisn" => "123456789$i$j",
                    "nama_lengkap" => "Siswa $i-$j",
                    "jenis_kelamin" => "Laki-Laki",
                    "tanggal_lahir" => "2000-01-01",
                    "kelas_id" => $kelas->id,
                ]);
                SiswaLogin::create([
                    "nisn" => "123456789$i$j",
                    "password" => bcrypt("siswa1234"),
                ]);
            }
        }

        // Buat Admin
        $admin = User::create([
            "nama" => "Admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin"),
            "jenis_kelamin" => "Laki-Laki",
            "tanggal_lahir" => "2000-01-01",
        ]);
        $admin->assignRole("admin");
    }
}
