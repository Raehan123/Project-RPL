<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'message',
        'notify_at',
        'is_read',
    ];

    protected $dates = ['notify_at'];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }
}
