<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', [formController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [formController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [formController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{nis}/edit', [formController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{nis}', [formController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{nis}', [formController::class, 'destroy'])->name('siswa.destroy');