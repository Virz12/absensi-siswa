<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Alert;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    //Menampilkan Semua data Siswa
    public function index(Request $request)
    {
        $siswa = siswa::paginate(5)->onEachSide(1);

        $keyword = $request->input('keyword');
        if ($keyword) {
            $siswa = Siswa::where('nis', 'like', "%$keyword%")
                ->orWhere('nis', 'like', "%$keyword%")
                ->orWhere('nama', 'like', "%$keyword%")
                ->orWhere('jenis_kelamin', 'like', "%$keyword%")
                ->orWhere('tempat_lahir', 'like', "%$keyword%")
                ->orWhere('alamat', 'like', "%$keyword%")
                ->orWhere('no_telp', 'like', "%$keyword%")
                ->paginate(5);
        }

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('siswa.index', compact('siswa', 'keyword'));
    }

    //Menampilkan form penambahan data Siswa
    public function create()
    {
        confirmDelete();

        return view('siswa.create');
    }

    //Menyimpan data yang ditambahkan
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
            'nis' => 'required|numeric|unique:siswa',
            'nama' => 'required|alpha',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|alpha',
            'tanggal_lahir' => 'required|date|size:10',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
        ], $messages);

        Siswa::create($request->all());
        toast('Data Berhasil Ditambah', 'success')->position('top')->timerProgressBar();
        return redirect()->route('siswa.index');
    }

    //Menampilkan data yang Siswa akan diubah
    public function edit($nis)
    {
        $siswa = Siswa::find($nis);

        confirmDelete();

        return view('siswa.edit', compact('siswa'));
    }

    //Menyimpan perubahan data Siswa
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

    //Menghapus data Siswa
    public function destroy($nis)
    {
        $siswa = Siswa::find($nis);
        $siswa->delete();
        toast('Data Berhasil Dihapus', 'success')->position('top')->timerProgressBar();
        return redirect()->route('siswa.index');
    }
}
