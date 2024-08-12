<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jurusan', 'kepala_jurusan_id', 'singkatan_jurusan'];

    public function kepalaJurusan()
    {
        return $this->belongsTo(KepalaJurusan::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
