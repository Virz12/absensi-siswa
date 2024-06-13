<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\data_absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    function admin(Request $request)
    {   
        //data absen 
        $absen = data_absen::orderBy('updated_at','DESC')->orderBy('id', 'DESC')->paginate(4);
        $keyword = $request->input('keyword');
        if ($keyword) {
            $absen = DB::table('data_absen')
                ->orderBy('updated_at', 'DESC')
                ->orderBy('id', 'DESC')
                ->whereAny([
                    'hari',
                    'tanggal',
                    'username',
                    'status_kehadiran',
                ], 'LIKE', "%$keyword%")
                ->paginate(4);
        }
        
        //format tanggal
        $absen->getCollection()->transform(function ($dabsen) {
            $dabsen->tanggal = Carbon::parse($dabsen->tanggal)->format('d/m/Y');
            return $dabsen;
        });
        
        // List user
        $siswas = User::select('username')->whereNot('username', '=', 'admin')->pluck('username');
        
        // Logika bulan
        Carbon::setLocale('id');
        $dataBulan = data_absen::selectRaw('MONTH(tanggal) as month')
            ->groupBy('month')
            ->pluck('month');
        
        if ($dataBulan->isEmpty()) {
            $dataBulan = collect([]);
        } else {
            $dataBulan = $dataBulan->map(function ($nomorBulan) {
                return Carbon::create()->month($nomorBulan)->format('F');
            });
        }

        if ($request->bulan) {
            $bulan = Carbon::parse($request->bulan)->month;
            $bulanSekarang = Carbon::parse($request->bulan)->format('F');
        } else {
            $bulan = Carbon::now()->month;
            $bulanSekarang = Carbon::now()->format('F');
        }

        // Logika tahun
        Carbon::setLocale('id');
        $dataTahun = data_absen::selectRaw('YEAR(tanggal) as year')
            ->groupBy('year')
            ->pluck('year');
        
        if ($dataTahun->isEmpty()) {
            $dataTahun = collect([]);
        }

        if ($request->tahun) {
            $tahun = $request->tahun;
        } else {
            $tahun = Carbon::now()->year;
        }

        // Chart
        foreach ($siswas as $siswa) {
            $absensi = DB::table('data_absen')
                ->selectRaw('MONTH(created_at) as month, FLOOR((DAYOFMONTH(tanggal) - 1) / 7) + 1 as week, COUNT(*) as count')
                ->whereMonth('tanggal', $bulan)
                ->whereYear('tanggal', $tahun)
                ->where('username', $siswa)
                ->whereNot('status_kehadiran', '=', 'Alpha')
                ->groupBy('month', 'week')
                ->get()
                ->pluck('count', 'week')
                ->all();
            
            ${'absensi' . $siswa} = array_values($absensi);
        }

        // Data chart
        $data = [];

        foreach ($siswas as $siswa => $username) {
            $data[] = [
                "label" => "$username",
                'backgroundColor' => $this->generateRandomHexColor(),
                'borderColor' => "",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                "data" => ${'absensi' . $username},
                "fill" => false,
            ];
        };
        
        $chartAbsen = app()->chartjs
            ->name('barChart')
            ->type('bar')
            ->labels(['Minggu ke-1', 'Minggu ke-2', 'Minggu ke-3', 'Minggu ke-4', 'Minggu ke-5'])
            ->datasets($data)
            ->optionsRaw("{
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }");

        return view('admin.dashboard')
            ->with('bulanSekarang', $bulanSekarang)
            ->with('dataBulan', $dataBulan)
            ->with('tahun', $tahun)
            ->with('dataTahun', $dataTahun)
            ->with('chartAbsen', $chartAbsen)
            ->with('absen', $absen)
            ->with('keyword', $keyword);
    }


    function data(Request $request)
    {
        $datasiswa = user::where('Role', 'siswa')->orderBy('updated_at','DESC')
                                                ->orderBy('id', 'DESC')->paginate(8);

        $keyword = $request->input('keyword');
        if ($keyword) {
            $datasiswa = DB::table('Users')
                ->where('Role', 'siswa')
                ->orderBy('updated_at', 'DESC')
                ->orderBy('id', 'DESC')
                ->whereAny([
                    'username',
                    'telefone',
                    'jenis_kelamin',
                    'status',
                ], 'LIKE', "$keyword%")
                ->paginate(8);
        }

        return view('admin.datasiswa')
                    ->with('datasiswa',$datasiswa)
                    ->with('keyword', $keyword);
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
                ->with('notification', 'Profil Berhasil Diubah.');
    }

    function deletesiswa($id) 
    {   
        $dsiswa = user::findOrFail($id);
        $dsiswa->delete();
        
        return redirect('/datasiswa')
                ->with('notification', 'Data Siswa Berhasil Dihapus.');
    }

    public function activate(string $id)
    {
        user::where('id',$id)->update(['status' => 'Aktif']);
        return redirect()->back()->with('notification', 'Status Siswa Berhasil Diubah Menjadi Aktif.');
    }

    public function deactivate(string $id)
    {
        user::where('id',$id)->update(['status' => 'Nonaktif']);
        return redirect()->back()->with('notification', 'Status Siswa Berhasil Diubah Menjadi Nonaktif.');
    }

    private function generateRandomHexColor()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}


