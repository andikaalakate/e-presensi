<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $primaryKey = 'nisn';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    protected $fillable = [
        'nisn',
        'status',
        'jam_masuk',
        'jam_pulang',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function updateSkor()
    {
        $point = 0;

        switch ($this->status) {
            case 'Hadir':
                $point = 2;
                break;
            case 'Terlambat':
                $point = 1;
                break;
            case 'Izin':
            case 'Sakit':
                $point = 0;
                break;
            case 'Alpha':
                $point = -1;
                break;
        }

        // Update or create Skor entry
        $skor = Skor::where('nisn', $this->nisn)->first();

        if ($skor) {
            // Update existing skor
            $skor->incrementSkor('skor', $point);
        } else {
            // Create new skor
            Skor::create([
                'nisn' => $this->nisn,
                'skor' => $point,
            ]);
        }
    }

    public function recordPulang()
    {
        $now = Carbon::now();

        // Cek apakah presensi sudah memiliki jam_pulang
        if (!$this->jam_pulang) {
            if ($now->format('H:i:s') >= '13:00:00') {
                $this->jam_pulang = $now->format('H:i:s');
                $this->save();
                return true; // Berhasil menyimpan jam_pulang
            } else {
                return false; // Waktu presensi pulang belum bisa
            }
        }

        return null; // Sudah melakukan presensi pulang
    }

    public function skor()
    {
        return $this->hasMany(Skor::class);
    }
}
