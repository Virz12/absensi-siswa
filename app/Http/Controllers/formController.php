<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class formController extends Controller
{
    public function index(Request $request)
    {   
        $siswa = siswa::orderBy('Tanggal', 'DESC')->paginate(5)->onEachSide(1);

        $keyword = $request->input('keyword');
        if ($keyword) {
            $siswa = Siswa::orderBy('Tanggal', 'DESC')->where('id', 'like', "%$keyword%")
                ->orWhere('Nama', 'like', "%$keyword%")
                ->orWhere('Tanggal', 'like', "%$keyword%")
                ->orWhere('OpsiKehadiran', 'like', "%$keyword%")
                ->paginate(5);
        }

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('siswa.index', compact('siswa', 'keyword'));
    }

    public function admin(Request $request)
    {   
        $siswa = siswa::orderBy('Tanggal', 'DESC')->paginate(5)->onEachSide(1);

        $keyword = $request->input('keyword');
        if ($keyword) {
            $siswa = Siswa::orderBy('Tanggal', 'DESC')->where('id', 'like', "%$keyword%")
                ->orWhere('Nama', 'like', "%$keyword%")
                ->orWhere('Tanggal', 'like', "%$keyword%")
                ->orWhere('OpsiKehadiran', 'like', "%$keyword%")
                ->paginate(5);
        }

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('siswa.admin', compact('siswa', 'keyword'));
    }

    public function create()
    {
        confirmDelete();

        return view('siswa.create');
    }

    public function store(Request $request)
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
            'Tanggal' => 'required',
            'Notelp' => 'required|numeric',
            'OpsiKehadiran' => 'required'
        ], $messages);

        Siswa::create($request->all());
        toast('Data Berhasil Ditambah', 'success')->position('top')->timerProgressBar();
        return redirect()->route('siswa.index');
    }
    
    public function comment($id)
    {   
        $siswa = Siswa::where('id', $id)->first();
    
        confirmDelete();

        return view('siswa.comment', compact('siswa'));
    }

    public function addcomment(Request $request, $id)
    {
        $request->validate([
            'Komentar' => 'required|regex:/^[\pL\s]+$/u'
        ]);

        $siswa = Siswa::where('id', $id);
        $siswa->update([
            'Komentar' => $request->Komentar
        ]);

        toast('Komentar Berhasil Ditambah', 'success')->position('top')->timerProgressBar();
        return redirect()->route('siswa.admin');
    }
}
