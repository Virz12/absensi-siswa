<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\loginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', [formController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [formController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [formController::class, 'store'])->name('siswa.store');

Route::get('/login', [loginController::class, 'login']);
Route::post('/login', [loginController::class, 'storelogin']);
Route::get('/logout', [loginController::class, 'logout']);