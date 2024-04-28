<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Alert;
use Illuminate\Validation\Rule;

class formController extends Controller
{
    public function index(Request $request)
    {   
        $siswa = siswa::paginate(5)->onEachSide(1);

        $keyword = $request->input('keyword');
        if ($keyword) {
            $siswa = Siswa::where('id', 'like', "%$keyword%")
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
            'unique' => ':attribute sudah dipakai'
        ];

        $request->validate([
            'Nama' => 'required|alpha',
            'Tanggal' => 'required',
<<<<<<< Updated upstream
            'OpsiKehadiran' => 'required',
=======
            'Notelp' => 'required|numeric',
            'OpsiKehadiran' => 'required'
>>>>>>> Stashed changes
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

    public function edit($nis)
    {
<<<<<<< Updated upstream
        $siswa = Siswa::find($nis);

        confirmDelete();

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $nis)
    {
        $siswa = Siswa::FindorFail($nis);

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'alpha' => 'Kolom :attribute hanya boleh berisi huruf.',
            'size' => 'Kolom :attribute tidak boleh lebih dari 10 karakter',
            'numeric' => 'Kolom :attribute hanya boleh berisi angka',
            'unique' => ':attribute sudah dipakai'
        ];

        $validasi = $request->validate([
            "nis" => [
                "required",
                Rule::unique('siswa', 'nis')->ignore($nis, 'nis'),
            ],
            'nama' => 'required|alpha',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|alpha',
            'tanggal_lahir' => 'required|date|size:10',
            'alamat' => 'required',
            'no_telp' => 'required|numeric'
        ], $messages);


        Siswa::where("nis", $siswa->nis)->update($validasi);
        toast('Data Berhasil Diubah', 'success')->position('top')->timerProgressBar();
        return redirect()->route('siswa.index');
    }

    public function destroy($nis)
    {
        $siswa = Siswa::find($nis);
        $siswa->delete();
        toast('Data Berhasil Dihapus', 'success')->position('top')->timerProgressBar();
        return redirect()->route('siswa.index');
=======
        $request->validate([
            'Komentar' => 'required|regex:/^[\pL\s]+$/u'
        ]);

        $siswa = Siswa::where('id', $id);
        $siswa->update([
            'Komentar' => $request->Komentar
        ]);

        toast('Komentar Berhasil Ditambah', 'success')->position('top')->timerProgressBar();
        return redirect()->route('siswa.admin');
>>>>>>> Stashed changes
    }
}
