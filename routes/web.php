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
    Route::post('/login', [LoginController::class, 'storelogin'])->middleware('resetDaily');
});

Route::middleware(['preventBackHistory','auth'])->group(function () {
    Route::get('/home', function() {
        if (Auth::user()->Role == 'admin') {
            return redirect('/dashboard');
        }elseif (Auth::user()->Role == 'siswa') {
            return redirect('/kehadiran');
        }
    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Admin
Route::middleware(['preventBackHistory','auth','userAccess:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin_profile', [AdminController::class, 'profile']);
    Route::get('/datasiswa', [AdminController::class, 'data'])->name('admin.datasiswa');
    Route::get('/tambahsiswa', [AdminController::class, 'tambahsiswa'])->name('admin.tambahsiswa');
    Route::post('/tambahsiswa',[AdminController::class, 'storesiswa']);

    Route::post('/admin_profile/fotoprofil', [AdminController::class, 'updateFotoProfil'])->name('admin.fotoprofil');
    Route::put('/admin_profile/identitas', [AdminController::class, 'updateIdentitas'])->name('admin.identitas');
    Route::put('/admin_profile/ubahpassword', [AdminController::class, 'updatePassword'])->name('admin.ubahpassword');
    
    Route::get('/hapussiswa/{user:id}',[AdminController::class, 'deletesiswa'])->name('admin.delete');
    Route::get('/activate/{user:id}',[AdminController::class, 'activate']);
    Route::get('/deactivate/{user:id}',[AdminController::class, 'deactivate']);
});

//siswa
Route::middleware(['preventBackHistory','auth','userAccess:siswa'])->group(function () {
    Route::get('/kehadiran', [SiswaController::class, 'siswa'])->name('siswa.kehadiran');
    Route::get('/siswa_profile', [SiswaController::class, 'profile']);
    
    Route::post('/siswa_profile/fotoprofil', [SiswaController::class, 'updateFotoProfil'])->name('siswa.fotoprofil');
    Route::put('/siswa_profile/identitas', [SiswaController::class, 'updateIdentitas'])->name('siswa.identitas');
    Route::put('/siswa_profile/ubahpassword', [SiswaController::class, 'updatePassword'])->name('siswa.ubahpassword');

    Route::post('/kehadiran/masuk', [SiswaController::class, 'kehadiranMasuk'])->name('siswa.masuk');
    Route::post('/kehadiran/pulang', [SiswaController::class, 'kehadiranPulang'])->name('siswa.pulang');
    Route::post('/kehadiran/izin', [SiswaController::class, 'kehadiranIzin'])->name('siswa.izin');
    Route::post('/kehadiran/sakit', [SiswaController::class, 'kehadiranSakit'])->name('siswa.sakit');
});


