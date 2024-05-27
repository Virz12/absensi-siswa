<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\data_absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function admin(Request $request)
    {   
        // Chart
        $absensi = DB::table('data_absen')
            ->selectRaw('MONTH(created_at) as month, FLOOR((DAYOFMONTH(created_at) - 1) / 7) + 1 as week, COUNT(*) as count')
            ->whereMonth('created_at', 5)
            ->where('username', 'virgi')
            ->groupBy('month', 'week')
            ->get()
            ->pluck('count', 'week')
            ->all();

        $total = array_values($absensi);
        
        $chartAbsen = app()->chartjs
            ->name('barChart')
            ->type('bar')
            ->labels(['Minggu ke-1', 'Minggu ke-2', 'Minggu ke-3', 'Minggu ke-4'])
            ->datasets([
                [
                    "label" => "Fajar",
                    'backgroundColor' => "#FFC55A",
                    'borderColor' => "#ed9542",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => [65, 59, 80, 81, 56, 55, 40],
                    "fill" => false,
                ],
                [
                    "label" => "Rifqi",
                    'backgroundColor' => "#6F4E37",
                    'borderColor' => "#523124",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => [12, 33, 44, 44, 55, 23, 40],
                    "fill" => false,
                ],
                [
                    "label" => "Virgi",
                    'backgroundColor' => "#E1AFD1",
                    'borderColor' => "#b57f8d",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => [12, 33, 44, 44, 55, 23, 40],
                    "fill" => false,
                ],
                [
                    "label" => "Zulfan",
                    'backgroundColor' => "#25073d",
                    'borderColor' => "#08021c",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => [12, 33, 44, 44, 55, 23, 40],
                    "fill" => false,
                ],
            ])
            ->options([]);

        return view('admin.dashboard')
            ->with('chartAbsen', $chartAbsen);
    }

    function data()
    {
        // Mengambil semua data user yang role-nya 'siswa'
        $datasiswa = user::where('role', 'siswa')->orderBy('updated_at','DESC')->paginate(8);
        return view('admin.datasiswa')->with('datasiswa',$datasiswa);
    }

    function profile()
    {
        $data_user = user::findOrFail(Auth::id());

        return view('admin.profile')
                ->with('data_user',$data_user);
    }

    function updateprofile(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute belum terisi.',
            'alpha' => 'Kolom :attribute hanya boleh berisi huruf.',
            'alpha_dash' => 'Kolom :attribute hanya boleh berisi huruf, angka, (-), (_).',
            'alpha_num' => 'Kolom :attribute hanya boleh berisi huruf dan angka',
            'size' => 'Kolom :attribute tidak boleh lebih dari 20 karakter',
            'numeric' => 'Kolom :attribute hanya boleh berisi angka',
            'unique' => ':attribute sudah digunakan',
            'regex:/^[\pL\s]+$/u' => 'Kolom :attribute hanya boleh berisi huruf dan spasi.',
            'image' => 'File Harus Berupa Gambar.',
            'max:15' => 'Kolom :attribute maksimal berisi 15 karakter.',
            'max:2048' => 'Ukuran file maksimal 2MB.',
            'digits_between:1,20' => 'Kolom :attribute maksimal berisi angka 20 digit.',
        ];

        $request->validate([
            'username' => 'required',
            'passwordOld' => 'required',
            'password' => 'nullable',
            'passwordConfirm' => 'nullable',
        ],$messages);

        $data_user = user::findOrFail(Auth::id());
        $verify_password = Hash::check($request->input('passwordOld'),$data_user->password);

        if($verify_password == true)
        {
            if($request->input('password') == null)
            {
                $data_user->update([
                    'username' => $request->input('username')
                ]);
            }else {
                if($request->input('password') == $request->input('passwordConfirm'))
                {
                    $data_user->update([
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ]);
                }
            }
        }else {
            return redirect('/admin_profil')->withErrors('Password tidak sesuai');
        }

        return redirect('/dashboard')
                ->with('notification', 'Data Berhasil Diubah.');
    }

}


