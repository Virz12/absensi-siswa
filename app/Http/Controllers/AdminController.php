<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\data_absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

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
        
        // Logika Hari
        $hariAwal = new DateTime($request->input('hariAwal'));
        $hariAkhir = new DateTime($request->input('hariAkhir'));
        $labels = [];

        for ($hari = $hariAwal; $hari <= $hariAkhir; $hari->modify('+1 day')) {
            $labels[] = $hari->format('M-d');
            $tanggal[] = $hari->format('d');
        }

        $hariAwal = $request->input('hariAwal');
        $hariAkhir = $request->input('hariAkhir');

        // Logika bulan
        if ($request->input('hariAwal')) {
            $bulan = Carbon::parse($request->input('hariAwal'))->format('m');
            settype($bulan, 'integer');
        } else {
            $bulan = Carbon::now()->month;
        }

        // Logika tahun
        if ($request->input('hariAwal')) {
            $tahun = Carbon::parse($request->input('hariAwal'))->format('Y');
            settype($tahun, 'integer');
        } else {
            $tahun = Carbon::now()->year;
        }

        // Chart
        foreach ($siswas as $siswa) {
            $absensi = DB::table('data_absen')
                ->selectRaw('MONTH(tanggal) as month, DAY(tanggal) as day, COUNT(*) as count')
                ->whereMonth('tanggal', $bulan)
                ->whereYear('tanggal', 2024)
                ->where('username', $siswa)
                ->where('status_kehadiran', '=', 'Hadir')
                ->whereBetween('tanggal', [$hariAwal, $hariAkhir])
                ->groupBy('month', 'day')
                ->get()
                ->pluck('count', 'day')
                ->all();

            $dataHari = [];
            $hari = array_keys($absensi);
            $data = array_values($absensi);

            for ($i=count($hari); $i < count($labels); $i++) { 
                array_splice($hari, $i, 0, 0);
                array_splice($data, $i, 0, 0);
            }
            
            for ($i=0; $i < count($labels); $i++) { 
                $dataHari[] = 0;
                for ($j=0; $j < count($tanggal); $j++) { 
                    if ($hari[$j] == $tanggal[$i]) {
                        array_splice($dataHari, $i, 1, $hari[$j]);
                    }
                }
            }
            
            for ($i=0; $i < count($labels); $i++) {
                for ($j=0; $j < count($tanggal); $j++) { 
                    if ($dataHari[$j] == $hari[$i]) {
                        array_splice($dataHari, $j, 1, $data[$i]);
                    }
                }
            }

            ${'absensi' . $siswa} = $dataHari;
        }

        // Data chart
        $datasets = [];

        foreach ($siswas as $siswa => $username) {
            $datasets[] = [
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
            ->labels($labels)
            ->datasets($datasets)
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
            ->with('tahun', $tahun)
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
                    'nama_depan' ,
                    'nama_belakang',
                    'telepon',
                    'nama_sekolah',
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

    function updateFotoProfil(Request $request)
    {
        $messages = [
            'foto_profil.image' => 'File Harus Berupa Gambar.',
            'foto_profil.max' => 'Ukuran file maksimal 2MB.',
            'foto_profil.dimensions' => 'Gambar Harus Memiliki tinggi dan lebar antara 200px - 2000px',
        ];

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('Foto Gagal Di upload');
    
        $request->validate([
            'foto_profil' => 'nullable|image|max:2048|dimensions:min_width=200,min_height=200,max_width=2000,max_height=2000',
        ], $messages);
    
        $data_user = user::findOrFail(Auth::id());
    
        if ($request->hasFile('foto_profil')) {
            if (File::exists($data_user->foto_profil)) {
                File::delete($data_user->foto_profil);
            }
            $image = $request->file('foto_profil');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;

            $data_user->update(['foto_profil' => $imagePath]);

            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->success('Foto Berhasil Di upload');

            return redirect('/admin_profile');
        }
        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('Foto Gagal Di upload');

        return redirect('/admin_profile');
    }  

    function updateIdentitas(Request $request)
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
            'regex:/^[a-zA-Z0-9\s]*$/' => 'Kolom :attribute hanya boleh berisi huruf, angka, dan spasi',
            'max:15' => 'Kolom :attribute maksimal berisi 15 karakter.',
            'digits_between:1,20' => 'Kolom :attribute maksimal berisi angka 20 digit.',
            'nama_depan.regex' => 'Kolom Nama Depan tidak valid',
            'nama_belakang.regex' => 'Kolom Nama Belakang tidak valid',
        ];

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('Profil gagal diubah.');

        $request->validate([
            'nama_depan' => 'required|regex:/^[\pL\s]+$/u',
            'nama_belakang' => 'required|regex:/^[\pL\s]+$/u',
        ],$messages);

        $data_user = user::findOrFail(Auth::id());
        $data_user->update([
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
        ]);

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('Profil berhasil diubah.');
    
        return redirect('/admin_profile');
    }

    function updatePassword(Request $request)
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
            'password.min' => 'Kolom :attribute minimal berisi 6 karakter.',
            'password.max' => 'Kolom :attribute maksimal berisi 12 karakter.',            
            'max:2048' => 'Ukuran file maksimal 2MB.',
            'digits_between:1,20' => 'Kolom :attribute maksimal berisi angka 20 digit.',
        ];

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('Password gagal diubah');

        $request->validate([
            'passwordLama' => 'required',
            'password' => 'required|min:6|max:12',
            'passwordConfirm' => 'required',
        ],$messages);

        $data_user = user::findOrFail(Auth::id());
        $verify_password = Hash::check($request->input('passwordLama'),$data_user->password);

        if($verify_password == true)
        {
            if($request->input('password') == $request->input('passwordConfirm'))
            {
                $data_user->update([
                    'password' => $request->input('password'),
                ]);
            } else {
                flash()
                ->killer(true)
                ->layout('bottomRight')
                ->timeout(3000)
                ->error('Password gagal diubah');

                return redirect('/admin_profile')->withErrors([
                    'password' => 'Password tidak sama',
                    'passwordConfirm' => 'Password tidak sama'
                ])->withInput();
            }
        }else {
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->error('Password gagal diubah');
            
            return redirect('/admin_profile')->withErrors(['passwordLama' => 'Password tidak sesuai'])->withInput();
        }
        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('Password berhasil diubah');

        return redirect('/admin_profile');
    }

    function deletesiswa($id) 
    {   
        $dsiswa = user::findOrFail($id);
        $dsiswa->delete();

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('Data Siswa Berhasil Dihapus.');
        
        return redirect('/datasiswa');
    }

    public function activate(string $id)
    {
        user::where('id',$id)->update(['status' => 'Aktif']);

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('Status Siswa Berhasil Diubah Menjadi Aktif.');

        return redirect()->back();
    }

    public function deactivate(string $id)
    {
        user::where('id',$id)->update(['status' => 'Nonaktif']);

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('Status Siswa Berhasil Diubah Menjadi Nonaktif.');

        return redirect()->back();
    }

    function tambahsiswa()
    {
        return view('admin.tambahsiswa');
    }

    function storesiswa(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute belum terisi.',
            'numeric' => 'Kolom :attribute hanya boleh berisi angka',
            'unique' => ':attribute sudah digunakan',
            'regex:/^[\pL\s]+$/u' => 'Kolom :attribute hanya boleh berisi huruf dan spasi.',
            'regex:/^[a-zA-Z0-9\s]*$/' => 'Kolom :attribute hanya boleh berisi huruf, angka, dan spasi',
            'alpha_dash' => 'Kolom :attribute hanya boleh berisi huruf, angka, (-), (_).',
            'lowercase' => 'Kolom :attribute hnaya boleh berisi huruf kecil',
            'alpha_num' => 'Kolom :attribute hanya boleh berisi huruf dan angka',
            'nama.max' => 'Kolom :attribute maksimal berisi 50 karakter.',
            'username.max' => 'Kolom :attribute maksimal berisi 15 karakter.',
            'password.min' => 'Kolom :attribute minimal berisi 6 karakter.',
            'password.max' => 'Kolom :attribute maksimal berisi 12 karakter.',
            'nama_depan.regex' => 'Kolom Nama Depan tidak valid',
            'nama_belakang.regex' => 'Kolom Nama Belakang tidak valid',
            'nama_sekolah.regex' => 'Kolom Nama Sekolah tidak valid',
        ];

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('Tambah Siswa Gagal');

        $request->validate([
            'username' => 'required|max:15|unique:users',
            'password' => 'required|min:6|max:12',
            'nama_depan' => 'nullable|regex:/^[\pL\s]+$/u',
            'nama_belakang' => 'nullable|regex:/^[\pL\s]+$/u',
            'telepon' => 'nullable|numeric',
            'nama_sekolah' => 'nullable|regex:/^[a-zA-Z0-9\s]*$/',
            'jenis_kelamin' => 'nullable',
        ],$messages);

        
        $data = [   
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
            'telepon' => $request->input('telepon'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'Role' => 'siswa',
        ];

        if($datasiswa = user::create($data)){
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->success('Siswa Berhasil Di Tambah.');

            return redirect('/datasiswa')->withInput();
        }else{
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->error('Tambah Siswa Gagal');
            return redirect('/tambahsiswa');
        }
    }

    private function generateRandomHexColor()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}


