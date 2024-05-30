<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['preventBackHistory','guest'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'storelogin']);
});

Route::middleware(['preventBackHistory','auth'])->group(function () {
    Route::get('/home', function() {
        if (Auth::user()->Role == 'admin') {
            return redirect('/dashboard');
        }elseif (Auth::user()->Role == 'siswa') {
            return redirect('/absen');
        }
    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Admin
Route::middleware(['preventBackHistory','auth','userAccess:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin_profile', [AdminController::class, 'profile']);
    Route::get('/datasiswa', [AdminController::class, 'data'])->name('admin.datasiswa');
    Route::put('/admin_profile', [AdminController::class, 'updateprofile']);
    
    Route::get('/activate/{user:id}',[AdminController::class, 'activate']);
    Route::get('/deactivate/{user:id}',[AdminController::class, 'deactivate']);
});

//siswa
Route::middleware(['preventBackHistory','auth','userAccess:siswa'])->group(function () {
    Route::get('/absen', [SiswaController::class, 'siswa'])->name('siswa.absen');
    Route::get('/siswa_profile', [SiswaController::class, 'profile']);
    Route::get('/infoAbsen', [SiswaController::class, 'info'])->name('siswa.infoAbsen');
    Route::put('/siswa_profile', [SiswaController::class, 'updateprofile']);

    Route::post('/absen/masuk', [SiswaController::class, 'absenMasuk'])->name('siswa.masuk');
    Route::post('/absen/pulang', [SiswaController::class, 'absenPulang'])->name('siswa.pulang');
    Route::post('/absen/izin', [SiswaController::class, 'absenIzin'])->name('siswa.izin');
    Route::post('/absen/sakit', [SiswaController::class, 'absenSakit'])->name('siswa.sakit');
});


