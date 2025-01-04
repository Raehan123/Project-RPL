<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BimbinganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD MAHASISWA
Route::middleware('auth')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswas.create');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswas.store');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswas.edit');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswas.destroy');
});

// CRUD DOSEN
Route::middleware('auth')->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosens.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosens.create');
    Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosens.store');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosens.edit');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosens.destroy');
});

// CRUD BIMBINGAN
Route::middleware('auth')->group(function () {
    Route::get('/bimbingan', [BimbinganController::class, 'index'])->name('bimbingans.index');
    Route::get('/bimbingan/create', [BimbinganController::class, 'create'])->name('bimbingans.create');
    Route::post('/bimbingan/store', [BimbinganController::class, 'store'])->name('bimbingans.store');
    Route::get('/bimbingan/{id}/edit', [BimbinganController::class, 'edit'])->name('bimbingans.edit');
    Route::delete('/bimbingan/{id}', [BimbinganController::class, 'destroy'])->name('bimbingans.destroy');
    //Route Pengajuan Bimbingan
    Route::get('/approve_bimbingan/{id}', [BimbinganController::class, 'approve_bimbingan']);
    Route::get('/reject_bimbingan/{id}', [BimbinganController::class, 'reject_bimbingan']);
});
require __DIR__ . '/auth.php';
