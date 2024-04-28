<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', function() {
        if (Auth::user()->Role == 'Admin'){
            return redirect('/admin');
        }elseif (Auth::user()->Role == 'User'){
            return redirect('/siswa');
        }
    });
});

Route::middleware(['preventBackHistory','guest'])->group(function (){
    Route::get('/login', [loginController::class, 'login'])->name('siswa.login');
    Route::post('/login', [loginController::class, 'storelogin'])->name('siswa.storelogin');
});

Route::middleware(['preventBackHistory','auth'])->group(function (){
    //Admin
    Route::get('/admin', [formController::class, 'admin'])->name('siswa.admin')->middleware('userAccess:Admin');
    Route::get('/comment/{id}', [formController::class, 'comment'])->name('siswa.comment')->middleware('userAccess:Admin');
    Route::put('/addcomment/{id}', [formController::class, 'addcomment'])->name('siswa.addcomment')->middleware('userAccess:Admin');

    //User
    Route::get('/siswa', [formController::class, 'index'])->name('siswa.index')->middleware('userAccess:User');
    Route::get('/siswa/create', [formController::class, 'create'])->name('siswa.create')->middleware('userAccess:User');
    Route::post('/siswa', [formController::class, 'store'])->name('siswa.store')->middleware('userAccess:User');

    Route::get('/logout', [loginController::class, 'logout'])->name('siswa.logout');
});