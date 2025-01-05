<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\BimbinganController;
use App\Http\Controllers\Dosen\BimbinganController as DosenBimbinganController;
use App\Http\Controllers\Mahasiswa\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD MAHASISWA
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswas.index');
    Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create'])->name('admin.mahasiswas.create');
    Route::post('/admin/mahasiswa/store', [MahasiswaController::class, 'store'])->name('admin.mahasiswas.store');
    Route::get('/admin/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('admin.mahasiswas.edit');
    Route::put('/admin/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('admin.mahasiswas.update');
    Route::delete('/admin/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswas.destroy');
});

// CRUD DOSEN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dosen', [DosenController::class, 'index'])->name('admin.dosens.index');
    Route::get('/admin/dosen/create', [DosenController::class, 'create'])->name('admin.dosens.create');
    Route::post('/admin/dosen/store', [DosenController::class, 'store'])->name('admin.dosens.store');
    Route::get('/admin/dosen/{id}/edit', [DosenController::class, 'edit'])->name('admin.dosens.edit');
    Route::delete('/admin/dosen/{id}', [DosenController::class, 'destroy'])->name('admin.dosens.destroy');
});

// CRUD BIMBINGAN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/bimbingan', [BimbinganController::class, 'index'])->name('admin.bimbingans.index');
    Route::get('/admin/bimbingan/create', [BimbinganController::class, 'create'])->name('admin.bimbingans.create');
    Route::post('/admin/bimbingan/store', [BimbinganController::class, 'store'])->name('admin.bimbingans.store');
    Route::get('/admin/bimbingan/{id}/edit', [BimbinganController::class, 'edit'])->name('admin.bimbingans.edit');
    Route::delete('/admin/bimbingan/{id}', [BimbinganController::class, 'destroy'])->name('admin.bimbingans.destroy');
});

// VIEW DOSEN
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/dashboard', [DosenDashboardController::class, 'index'])->name('dosen.dashboard');
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/jadwal', [DosenBimbinganController::class, 'index'])->name('dosen.jadwal.index');
    Route::get('/dosen/jadwal/create', [DosenBimbinganController::class, 'create'])->name('dosen.jadwal.create');
    Route::post('/dosen/jadwal/store', [DosenBimbinganController::class, 'store'])->name('dosen.jadwal.store');
    Route::get('/dosen/jadwal/{id}/edit', [DosenBimbinganController::class, 'edit'])->name('dosen.jadwal.edit');
    Route::delete('/dosen/jadwal/{id}', [DosenBimbinganController::class, 'destroy'])->name('dosen.jadwal.destroy');
    Route::get('/dosen/jadwal/approve/{id}', [DosenBimbinganController::class, 'approve'])->name('dosen.jadwal.approve');
    Route::get('/dosen/jadwal/reject/{id}', [DosenBimbinganController::class, 'reject'])->name('dosen.jadwal.reject');
});

// VIEW MAHASISWA
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/index', [LandingPageController::class, 'index'])->name('mahasiswa.index');
});




require __DIR__ . '/auth.php';
