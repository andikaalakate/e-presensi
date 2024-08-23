<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kelas',
        'jurusan_id',
        'tahun_ajaran_id'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function scopeFilterByKelas($query)
    {
        if ($search = request('search')) {
            return $query->where(function ($query) use ($search) {
                $query->where('nama_kelas', 'like', '%' . $search . '%')
                    ->orWhereHas('jurusan_id', function ($query) use ($search) {
                        $query->where('nama_jurusan', 'like', '%' . $search . '%');
                    });
            });
        }

        return $query;
    }
}
