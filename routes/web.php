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

Route::get('/admin', [formController::class, 'admin'])->name('siswa.admin');
Route::get('/comment/{id}', [formController::class, 'comment'])->name('siswa.comment');
Route::put('/addcomment/{id}', [formController::class, 'addcomment'])->name('siswa.addcomment');

Route::get('/login', [loginController::class, 'login'])->name('siswa.login');
Route::post('/login', [loginController::class, 'storelogin'])->name('siswa.storelogin');
Route::get('/logout', [loginController::class, 'logout'])->name('siswa.logout');
