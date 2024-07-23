<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\data_absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;
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
        $end_morning = Carbon::createFromTimeString('12:00', 'Asia/Jakarta');

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
            
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->success('<b>Berhasil!</b><br>Anda sudah mengisi kehadiran.');

            return redirect('/kehadiran');
        } else {
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->error('<b>Error!</b><br>Waktu masuk diizinkan jam 08:00 - 12:00.');

            return redirect('/kehadiran');
        }
    }

    function kehadiranPulang(Request $request)
    {
        $current_time = Carbon::now()->setTimezone('Asia/Jakarta');
        $start_afternoon = Carbon::createFromTimeString('12:00', 'Asia/Jakarta');
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
                

                flash()
                ->killer(true)
                ->layout('bottomRight')
                ->timeout(3000)
                ->success('<b>Berhasil!</b><br>Anda sudah mengisi kehadiran');

                return redirect('/kehadiran');
            } else {
                flash()
                ->killer(true)
                ->layout('bottomRight')
                ->timeout(3000)
                ->error('<b>Error!</b><br>Tidak ditemukan absen masuk untuk hari ini.');

                return redirect('/kehadiran');
            }
        } else {
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->error('<b>Error!</b><br>Waktu pulang diizinkan jam 12:00 - 17:00.');

            return redirect('/kehadiran');
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

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('<b>Berhasil!</b><br>Anda sudah Mengisi Kehadiran!');

        return redirect('/kehadiran');
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

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('<b>Berhasil!</b><br>Anda sudah Mengisi Kehadiran!');

        return redirect('/kehadiran');
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
            'foto_profil.mimes' => 'Format Harus JPEG, JPG Dan PNG',            
        ];

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('<b>Error!</b><br>Foto Gagal Di upload');
    
        $request->validate([
            'foto_profil' => 'nullable|image|max:2048|mimes:jpeg,jpg,png',
        ], $messages);

        $data_user = user::findOrFail(Auth::id());
    
        if ($request->hasFile('foto_profil')) {
            if (File::exists($data_user->foto_profil)) {
                File::delete($data_user->foto_profil);
            }
        
            $image = Image::read($request->file('foto_profil'));
            $imageName = time() . '.' . $request->file('foto_profil')->getClientOriginalExtension();
            $imagePath = public_path('images/' . $imageName);
            
            $image->cover(900, 900); 
            $image->save($imagePath);
        
            $data_user->update(['foto_profil' => ('images/'.$imageName)]);
            
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->success('<b>Berhasil!</b><br>Foto sudah Di upload');

            return redirect('/siswa_profile');
        }

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('<b>Error!</b><br>Foto Gagal Di upload');

        return redirect('/siswa_profile');
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
            'nama_depan.regex' => 'Kolom :attribute hanya boleh berisi huruf dan spasi.',
            'nama_belakang.regex' => 'Kolom :attribute hanya boleh berisi huruf dan spasi.',
            'nama_sekolah.regex' => 'Kolom :attribute hanya boleh berisi huruf, angka, dan spasi',
        ];

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('<b>Error!</b><br>Profil gagal diubah.');

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

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('<b>Berhasil!</b><br>Profil sudah diubah.');
    
        return redirect('/siswa_profile');
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
            'password.min' => 'Kolom :attribute minimal berisi 8 karakter.',
            'password.max' => 'Kolom :attribute maximal berisi 50 karakter.',
            'digits_between:1,20' => 'Kolom :attribute maksimal berisi angka 20 digit.',
            'password.regex'=>'hanya berisi Huruf, Angka(0-9), a-z, A-Z ,karakter khusus yang Diizinkan[!@#$?&*] masing-masing Minimal 1 dan Tanpa Spasi'
        ];

        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->error('<b>Error!</b><br>Password gagal diubah');

        $request->validate([
            'passwordLama' => 'required',
            'password' => ['required','min:8','max:50','regex:/^(?!.*\s)(?=.*[a-z])(?=.*[A-Z])(?!.*[\(\)\-\=\¡\£\_\+\`\~\.\,\<\>\/\;\:\'\"\\\|\[\]\{\}])(?=.*\d)(?=.*[\!\@\#\$\?\&\*]).*$/'],
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
                ->error('<b>Error!</b><br>Password gagal diubah');

                return redirect('/siswa_profile')->withErrors([
                    'password' => 'Password tidak sama',
                    'passwordConfirm' => 'Password tidak sama'
                ])->withInput();
            }
        }else {
            flash()
            ->killer(true)
            ->layout('bottomRight')
            ->timeout(3000)
            ->error('<b>Error!</b><br>Password gagal diubah');
            
            return redirect('/siswa_profile')->withErrors(['passwordLama' => 'Password tidak sesuai'])->withInput();
        }
        flash()
        ->killer(true)
        ->layout('bottomRight')
        ->timeout(3000)
        ->success('<b>Berhasil!</b><br>Password sudah diubah');

        return redirect('/siswa_profile');
    }
}
