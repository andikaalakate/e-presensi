<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'email',
        'no_telp',
        'foto',
        'kelas_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
