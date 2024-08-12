<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun_mulai',
        'tahun_selesai'
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
