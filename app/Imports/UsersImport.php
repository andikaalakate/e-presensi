<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row[3] = Hash::make($row[3]);
        
        $row[4] = $row[4] == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan';

        $row[5] = $row[5] ?? '2000-01-01';

        $row[8] = $row[8] == 'admin' ? 'admin' : 'superadmin';

        $row[7] = $row[7] ?? '081234567890';

        $row[6] = $row[6] ?? 'Jl. Unknown';

        $row[2] = $row[2] ?? 'email';

        $row[1] = $row[1] ?? 'nama';

        return new User([
            'nama' => $row[1],
            'email' => $row[2],
            'password' => $row[3],
            'jenis_kelamin' => $row[4],
            'tanggal_lahir' => $row[5],
            'alamat' => $row[6],
            'no_hp' => $row[7],
            'role' => $row[8],
        ]);
    }
}
