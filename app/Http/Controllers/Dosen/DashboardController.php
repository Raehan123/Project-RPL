<?php

namespace App\Http\Controllers\Dosen;


use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = Mahasiswa::count();
        return view('dosen.dashboardd', compact('jumlahMahasiswa'));
    }
}
