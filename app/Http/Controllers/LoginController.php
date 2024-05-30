<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class LoginController extends Controller
{
    function login()
    {
        return view('login');
    }

    function storelogin(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'alpha' => 'Kolom :attribute hanya boleh berisi huruf.',
            'size' => 'Kolom :attribute tidak boleh lebih dari 10 karakter',
            'numeric' => 'Kolom :attribute hanya boleh berisi angka',
            'unique' => ':attribute sudah dipakai',
            'regex:/^[\pL\s]+$/u' => 'Kolom :attribute hanya boleh berisi huruf.'
        ];

        $request->validate ([
            'username' => 'required|regex:/^[\pL\s]+$/u',
            'password' => 'required' 
        ],$messages);

        $inputeddata = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($inputeddata)) {
            $user = Auth::user();
            if ($user->Role == 'admin') {
                return redirect('/dashboard'); 
            }elseif ($user->Role == 'siswa') {
                if ($user->status == 'aktif'){
                    return redirect('/absen');
                }else{
                    Auth::logout();
                    return redirect('/login')->withErrors(['username' => 'Akun siswa Anda tidak aktif'])->withInput();
                }
            }
        }else {
            return redirect('/login')->withErrors(['username' => 'Nama Pengguna dan Sandi Tidak Sesuai'])->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
