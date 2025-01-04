<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'mahasiswas';

    protected $fillable = ['nim', 'nama', 'jurusan', 'email'];
    


}
