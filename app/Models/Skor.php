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
}
