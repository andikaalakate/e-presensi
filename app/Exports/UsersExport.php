<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Ambil data users dengan roles mereka
     */
    public function collection()
    {
        return User::with('roles')->get();
    }

    /**
     * Tentukan heading untuk kolom-kolom di file Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'Roles'
        ];
    }

    /**
     * Map data yang akan diexport ke dalam format yang diinginkan
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->nama,
            $user->email,
            $user->roles->pluck('name')->implode(', ') // Menggabungkan semua role menjadi string
        ];
    }
}
