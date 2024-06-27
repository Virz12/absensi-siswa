<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\data_absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SiswaController extends Controller
{
    function siswa()
    {
        $statussiswa = user::where('username', Auth::user()->username)->get();

        $kehadiran = data_absen::where('username', Auth::user()->username)
                                    ->orderBy('updated_at','DESC')
                                    ->paginate(5);

        $infoabsen = data_absen::where('username', Auth::user()->username)
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(1);
        
        // format tanggal
        $kehadiran->getCollection()->transform(function ($datahadir) {
            $datahadir->tanggal = Carbon::parse($datahadir->tanggal)->format('d/m/Y');
            return $datahadir;
        });
        return view('siswa.kehadiran')->with('kehadiran', $kehadiran)
                                    ->with('statussiswa', $statussiswa)
                                    ->with('infoabsen', $infoabsen);
    }

    function profilesiswa()
    {
        return view('siswa.profile');
    }

    public function __construct()
    {
        Carbon::setLocale('id');
    }

    function kehadiranMasuk(Request $request)
    {
        $current_time = Carbon::now()->setTimezone('Asia/Jakarta');
        $start_morning = Carbon::createFromTimeString('08:00', 'Asia/Jakarta');
        $end_morning = Carbon::createFromTimeString('17:00', 'Asia/Jakarta');

        if ($current_time->between($start_morning, $end_morning)) {
            $tanggal = $current_time->format('Y-m-d');
            $hari = $current_time->isoFormat('dddd');

            data_absen::create([
                'username' => Auth::user()->username,
                'hari' => $hari,
                'tanggal' => $tanggal,
                'waktu_masuk' => $current_time->toTimeString(),
                'status_kehadiran' => 'Hadir',
            ]);
            user::where('username', Auth::user()->username)->update(['kehadiran' => 'sudah']);
            
            return redirect('/kehadiran')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
        } else {
            return redirect('/kehadiran')->withErrors(['msg' => 'Waktu Masuk Diizinkan jam 08:00 - 12:00.']);
        }
    }

    function kehadiranPulang(Request $request)
    {
        $current_time = Carbon::now()->setTimezone('Asia/Jakarta');
        $start_afternoon = Carbon::createFromTimeString('08:00', 'Asia/Jakarta');
        $end_afternoon = Carbon::createFromTimeString('17:00', 'Asia/Jakarta');

        if ($current_time->between($start_afternoon, $end_afternoon)) {
            $tanggal = $current_time->format('Y-m-d');

            $absensi = data_absen::where('username', Auth::user()->username)
                                ->where('tanggal', $tanggal)
                                ->where('status_kehadiran', 'Hadir')
                                ->orderBy('created_at', 'desc')
                                ->first();

            if ($absensi) {
                $absensi->update([
                    'waktu_pulang' => $current_time->toTimeString(),
                    'status_kehadiran' => 'Hadir',
                ]);

                return redirect('/kehadiran')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
            } else {
                return redirect('/kehadiran')->withErrors(['msg' => 'Tidak ditemukan absen masuk untuk hari ini.']);
            }
        } else {
            return redirect('/kehadiran')->withErrors(['msg' => 'Waktu Pulang Diizinkan Jam 12:00 - 17:00.']);
        }
    }

    public function kehadiranIzin(Request $request)
    {
        $current_time = Carbon::now()->setTimezone('Asia/Jakarta');
        $tanggal = $current_time->format('Y-m-d');
        $hari = $current_time->isoFormat('dddd');

        data_absen::create([
            'username' => Auth::user()->username,
            'hari' => $hari,
            'tanggal' => $tanggal,
            'status_kehadiran' => 'Izin',
        ]);
        user::where('username', Auth::user()->username)->update(['kehadiran' => 'sudah']);

        return redirect('/kehadiran')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
    }

    public function kehadiranSakit(Request $request)
    {
        $current_time = Carbon::now()->setTimezone('Asia/Jakarta');
        $tanggal = $current_time->format('Y-m-d');
        $hari = $current_time->isoFormat('dddd');

        data_absen::create([
            'username' => Auth::user()->username,
            'hari' => $hari,
            'tanggal' => $tanggal,
            'status_kehadiran' => 'Sakit',
        ]);
        user::where('username', Auth::user()->username)->update(['kehadiran' => 'sudah']);

        return redirect('/kehadiran')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
    }


    function profile()
    {
        $data_user = user::findOrFail(Auth::id());

        return view('siswa.profile')
                ->with('data_user',$data_user);
    }

    function updateFotoProfil(Request $request)
    {
        $messages = [
            'foto_profil.image' => 'File Harus Berupa Gambar.',
            'foto_profil.max' => 'Ukuran file maksimal 2MB.',
            'foto_profil.dimensions' => 'Gambar Harus Memiliki tinggi dan lebar antara 200px - 2000px',
        ];
    
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

            return redirect('/siswa_profile')->with('notification', 'Foto Berhasil Di Upload');
        }
        return redirect('/siswa_profile')->withError('foto_profil', 'Foto Gagal Di upload');
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
        ];

        $request->validate([
            'nama_depan' => 'required|regex:/^[\pL\s]+$/u',
            'nama_belakang' => 'required|regex:/^[\pL\s]+$/u',
            'telepon' => 'required|numeric',
            'nama_sekolah' => 'required|regex:/^[a-zA-Z0-9\s]*$/',
            'jenis_kelamin' => 'required',
        ],$messages);

        $data_user = user::findOrFail(Auth::id());
        $data_user->update([
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
            'telepon' => $request->input('telepon'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'jenis_kelamin' => $request->input('jenis_kelamin')
        ]);
    
        return redirect('/siswa_profile')
                ->with('notification', 'Data Berhasil Diubah.');
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
            'max:15' => 'Kolom :attribute maksimal berisi 15 karakter.',
            'digits_between:1,20' => 'Kolom :attribute maksimal berisi angka 20 digit.',
        ];

        $request->validate([
            'passwordLama' => 'required',
            'password' => 'required',
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
            }
        }else {
            return redirect('/siswa_profile')->withErrors(['passwordLama' => 'Password tidak sesuai'])->withInput();
        }

        return redirect('/siswa_profile')
                ->with('notification', 'Password Berhasil Diubah.');
    }
}
