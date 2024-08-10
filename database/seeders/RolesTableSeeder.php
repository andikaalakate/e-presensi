<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        Role::create(['name' => 'kepala_sekolah', 'guard_name' => 'admin']);
        Role::create(['name' => 'kepala_jurusan', 'guard_name' => 'admin']);
        Role::create(['name' => 'wali_kelas', 'guard_name' => 'admin']);
    }
}
