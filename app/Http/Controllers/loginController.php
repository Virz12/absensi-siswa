<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login()
    {
        return view('siswa.login');
    }

    public function storelogin(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'alpha' => 'Kolom :attribute hanya boleh berisi huruf.',
            'size' => 'Kolom :attribute tidak boleh lebih dari 10 karakter',
            'numeric' => 'Kolom :attribute hanya boleh berisi angka',
            'unique' => ':attribute sudah dipakai',
            'regex:/^[\pL\s]+$/u' => 'Kolom :attribute hanya boleh berisi huruf.'
        ];

        $request->validate([
            'Nama' => 'required|regex:/^[\pL\s]+$/u',
            'Password' => 'required'
        ], $messages);

        $infologin = [
            'Nama' => $request->Nama,
            'password' => $request->Password,
        ];

        if(Auth::attempt($infologin))
        {
            if (Auth::user()->Role == 'Admin')
            {
                return redirect('/admin');
            }elseif (Auth::user()->Role == 'User') {
                return redirect('/siswa');
            }
        }else {
            return redirect('/login')->withErrors(['Nama' => 'Nama dan Password Tidak Sesuai'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
