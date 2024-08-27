<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'skor',
    ];

    public function incrementSkor($field, $value)
    {
        $this->update([$field => $this->{$field} + $value]);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'nisn', 'nisn');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function scopeFilterBySiswa($query)
    {
        if ($search = request('search')) {
            return $query->where(function ($query) use ($search) {
                $query->whereHas('siswa', function ($query) use ($search) {
                        $query->where('nisn', 'like', '%' . $search . '%')
                            ->orWhere('nama_lengkap', 'like', '%' . $search . '%')
                        ->orWhereHas('kelas', function ($query) use ($search) {
                            $query->where('nama_kelas', 'like', '%' . $search . '%')
                                ->orWhereHas('jurusan', function ($query) use ($search) {
                                    $query->where('nama_jurusan', 'like', '%' . $search . '%');
                                });
                        });
                    });
            });
        }

        return $query;
    }

    public function scopeWithRanking($query)
    {
        return $query->orderBy('skor', 'desc')
        ->get()
            ->each(function ($item, $index) {
                $item->global_rank = $index + 1;
            });
    }
}
