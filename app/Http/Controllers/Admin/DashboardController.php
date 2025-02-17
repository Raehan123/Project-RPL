<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = Mahasiswa::count();
        $jumlahDosen = Dosen::count();
        $jumlahJadwalBimbingan = Bimbingan::count();
        return view('admin.dashboard.dashboard', compact('jumlahMahasiswa', 'jumlahDosen', 'jumlahJadwalBimbingan'));
    }
}
