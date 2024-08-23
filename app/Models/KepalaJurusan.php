<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaJurusan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jurusan()
    {
        return $this->hasOne(Jurusan::class);
    }

    public function kelas()
    {
        return $this->hasManyThrough(Kelas::class, Jurusan::class, 'kepala_jurusan_id', 'jurusan_id', 'id', 'id');
    }

    public function siswa()
    {
        return $this->hasManyThrough(Siswa::class, Kelas::class, 'jurusan_id', 'kelas_id', 'id', 'id');
    }
}
