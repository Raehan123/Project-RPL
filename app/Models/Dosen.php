<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Dosen extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'dosens';

    // Daftar kolom yang boleh diisi secara massal
    protected $fillable = ['nip', 'nama', 'email', 'user_id'];

    /**
     * Relasi ke model User (One-to-One)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
