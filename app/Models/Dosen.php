<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dosen extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'dosens';

    protected $fillable = ['nip', 'nama', 'email'];
}
