<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;
    protected $table = 'bimbingans';

    protected $fillable = ['tanggal', 'jam', 'dosen_id', 'mahasiswa_id', 'lokasi', 'topik', 'status'];

    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }
}
