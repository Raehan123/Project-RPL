<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() 
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        return view('mahasiswa.index', compact('mahasiswa', 'dosen'));
    }
}
