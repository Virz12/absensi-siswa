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
            'required' => 'Kolom :attribute wajib diisi',
            'username.alpha' => 'Kolom :attribute hanya boleh berisi huruf',
            'size' => 'Kolom :attribute tidak boleh lebih dari 10 karakter',
            'numeric' => 'Kolom :attribute hanya boleh berisi angka',
            'unique' => ':attribute sudah dipakai',
            'username.regex:/^[\pL\s]+$/u' => 'Kolom :attribute hanya boleh berisi huruf',
            'password.regex' => 'Password hanya boleh berisi huruf, angka, dan karakter khusus tanpa spasi.',
            'password.max' => 'Kolom :attribute maximal berisi 50 karakter.',
        ];

        $request->validate ([
            'username' => 'required|alpha',
            'password' => 'required|max:50',
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
                    return redirect('/kehadiran');
                }else{
                    Auth::logout();
                    flash()
                    ->killer(true)
                    ->layout('bottomRight')
                    ->timeout(3000)
                    ->error('Akun Anda Ditangguhkan !');
                    return redirect('/login')->withInput();
                }
            }
        }else {
            return redirect('/login')  
                    ->withErrors(['username' => 'Username Tidak Sesuai', 'password' => 'Password Tidak Sesuai'])->withInput();
        } 
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
