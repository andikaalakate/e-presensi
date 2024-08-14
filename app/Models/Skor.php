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
        return $this->belongsTo(Presensi::class);
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
