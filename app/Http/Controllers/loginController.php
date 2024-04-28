<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

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

        $user_name = $request->Nama;
        $user_password = $request->Password;
        $user = Akun::where('Nama',$user_name)->first();

        if($user->Password === $user_password)
        {
            if($user->Role === 'Admin')
            {
                return redirect('/admin');
            }elseif($user->Role === 'User') {
                return redirect('/siswa');
            }
        }else {
            return redirect('/login')->withErrors('Nama dan Password Tidak Sesuai')->withInput();
        }
    }

    public function logout()
    {
        return redirect('/login');
    }
}
