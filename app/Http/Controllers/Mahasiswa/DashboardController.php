<?php

namespace App\Http\Controllers\Mahasiswa;


use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.welcome');
    }
}
