<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\data_absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SiswaController extends Controller
{
    function siswa()
    {
        $statussiswa = user::where('username', Auth::user()->username)->get();

        $kehadiran = data_absen::where('username', Auth::user()->username)
                                    ->orderBy('updated_at','DESC')
                                    ->paginate(5);
        
        // format tanggal
        $kehadiran->getCollection()->transform(function ($datahadir) {
            $datahadir->tanggal = Carbon::parse($datahadir->tanggal)->format('d/m/Y');
            return $datahadir;
        });
        return view('siswa.absen')->with('kehadiran', $kehadiran)
                                    ->with('statussiswa', $statussiswa);
    }

    function profilesiswa()
    {
        return view('siswa.profile');
    }

    function info(Request $request)
    {
        $statussiswa = user::where('username', Auth::user()->username)->get();

        $infoabsen = data_absen::where('username', Auth::user()->username)
                                ->orderBy('created_at', 'DESC')
                                ->paginate(1);
        return view('siswa.infoAbsen')->with('infoabsen', $infoabsen)
                                        ->with('statussiswa', $statussiswa);
    }

    public function __construct()
    {
        Carbon::setLocale('id');
    }

    function absenMasuk(Request $request)
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
            
            return redirect('/infoAbsen')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
        } else {
            return redirect('/absen')->withErrors(['msg' => 'Waktu Masuk Diizinkan jam 08:00 - 12:00.']);
        }
    }

    function absenPulang(Request $request)
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

                return redirect('/infoAbsen')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
            } else {
                return redirect('/infoAbsen')->withErrors(['msg' => 'Tidak ditemukan absen masuk untuk hari ini.']);
            }
        } else {
            return redirect('/infoAbsen')->withErrors(['msg' => 'Waktu Pulang Diizinkan Jam 12:00 - 17:00.']);
        }
    }

    public function absenIzin(Request $request)
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

        return redirect('/infoAbsen')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
    }

    public function absenSakit(Request $request)
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

        return redirect('/infoAbsen')->with('notification', 'Anda Berhasil Mengisi Kehadiran');
    }


    function profile()
    {
        $data_user = user::findOrFail(Auth::id());

        return view('siswa.profile')
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
            'telefone' => 'required',
            'jenis_kelamin' => 'required',
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
                    'username' => $request->input('username'),
                    'telefone' => $request->input('telefone'),
                    'jenis_kelamin' => $request->input('jenis_kelamin')
                ]);
            }else {
                if($request->input('password') == $request->input('passwordConfirm'))
                {
                    $data_user->update([
                        'username' => $request->input('username'),
                        'password' => $request->input('password'),
                        'telefone' => $request->input('telefone'),
                        'jenis_kelamin' => $request->input('jenis_kelamin')
                    ]);
                }
            }
        }else {
            return redirect('/siswa_profile')->withErrors('Password tidak sesuai');
        }

        return redirect('/absen')
                ->with('notification', 'Data Berhasil Diubah.');
    }
}
