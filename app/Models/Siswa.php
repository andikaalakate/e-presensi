<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $primaryKey = 'nisn';
    public $incrementing = false;
    protected $keyType = 'string';

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

    public function siswaLogin()
    {
        return $this->belongsTo(SiswaLogin::class);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'nisn', 'nisn');
    }

    public function skor()
    {
        return $this->hasMany(Skor::class, 'nisn', 'nisn');
    }

    public function scopeFilterBySiswa($query)
    {
        if ($search = request('search')) {
            return $query->where(function ($query) use ($search) {
                $query->where('nama_lengkap', 'like', '%' . $search . '%')
                    ->orWhere('nisn', 'like', '%' . $search . '%')
                    ->orWhereHas('kelas', function ($query) use ($search) {
                        $query->where('nama_kelas', 'like', '%' . $search . '%')
                            ->orWhereHas('jurusan', function ($query) use ($search) {
                                $query->where('nama_jurusan', 'like', '%' . $search . '%');
                            });
                    });
            });
        }

        return $query;
    }
}
