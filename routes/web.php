<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Mahasiswa\DashboardController as MhsDashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\admin\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BimbinganController;
use App\Models\Dosen;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectRole;

Route::get('/', function () {
    return redirect()->route('login');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// CRUD MAHASISWA
Route::middleware(['auth', RedirectRole::class . ':admin'])
    ->prefix('admin')
    ->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswas.create');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswas.store');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswas.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswas.update');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswas.destroy');


// CRUD DOSEN
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosens.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosens.create');
    Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosens.store');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosens.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosens.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosens.destroy');

// CRUD BIMBINGAN
    Route::get('/bimbingan', [BimbinganController::class, 'index'])->name('bimbingans.index');
    Route::get('/bimbingan/create', [BimbinganController::class, 'create'])->name('bimbingans.create');
    Route::post('/bimbingan/store', [BimbinganController::class, 'store'])->name('bimbingans.store');
    Route::get('/bimbingan/{id}/edit', [BimbinganController::class, 'edit'])->name('bimbingans.edit');
    Route::put('/bimbingan/{id}', [BimbinganController::class, 'update'])->name('bimbingans.update');
    Route::delete('/bimbingan/{id}', [BimbinganController::class, 'destroy'])->name('bimbingans.destroy');
});

Route::middleware(['auth', RedirectRole::class . ':dosen'])
    ->prefix('dosen')
    ->group(function () {
        Route::get('/', [DosenDashboardController::class, 'index'])->name('dashboardd');

});

Route::middleware(['auth', RedirectRole::class . ':mahasiswa'])
    ->prefix('mahasiswa')
    ->group(function () {
        Route::get('/', [MhsDashboardController::class, 'index'])->name('welcome');

});
require __DIR__ . '/auth.php';
