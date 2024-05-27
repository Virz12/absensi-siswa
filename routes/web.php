<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['preventBackHistory','guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'storelogin']);
});

Route::middleware(['preventBackHistory','auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Admin
Route::middleware(['preventBackHistory','auth','userAccess:admin'])->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin_profile', [AdminController::class, 'profile']);
    Route::put('/admin_profile', [AdminController::class, 'updateprofile']);
});

//siswa
Route::middleware(['preventBackHistory','auth','userAccess:siswa'])->group(function () {
    
Route::get('/absen', [SiswaController::class, 'siswa'])->name('siswa.absen');
Route::get('/siswa_profile', [SiswaController::class, 'profile']);
Route::put('/siswa_profile', [SiswaController::class, 'updateprofile']);
});

Route::get('/datasiswa', [AdminController::class, 'data'])->name('admin.datasiswa');

Route::get('/profile', [SiswaController::class, 'profilesiswa'])->name('siswa.profile');

Route::get('/infoAbsen', [SiswaController::class, 'info'])->name('siswa.infoAbsen');

Route::get('/pulang', [SiswaController::class, 'pulang'])->name('pulang');

