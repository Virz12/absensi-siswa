<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styleBase.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styleEditCreate.css')}}">
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/a1fe272ba9.js" crossorigin="anonymous"></script>
    <title>Edit Data Siswa</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="header">
        <div class="container">
            <img src="{{ asset('img/brand.png') }}" alt="Logo">
            <h1>EDIT DATA SISWA</h1>
        </div>
    </div>
    <main>
        <div class="container">
            <a href="{{ route('siswa.index') }}">
                <i class="fa-solid fa-arrow-left"></i>Kembali
            </a>
            <form method="POST" id="store" action="{{ route('siswa.update', $siswa->nis) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="Nama">Nama :</label>
                    <input type="text" id="Nama" name="Nama" value="{{ $siswa->Nama }}" autocomplete="off" required>
                    @error('Nama')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="Tanggal">Tanggal & Waktu :</label>
                    <input type="date" id="Tanggal" name="Tanggal" value="{{ $siswa->Tanggal }}" autocomplete="off" required>
                    @error('Tanggal')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="OpsiKehadiran">Opsi Kehadiran :</label>
                    <select name="OpsiKehadiran" id="OpsiKehadiran">
                        @if ($siswa->OpsiKehadiran == 'hadir')
                        <option value="hadir">Hadir</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        @else
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        <option value="hadir">Hadir</option>
                        @endif
                    </select>
                    @error('OpsiKehadiran')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" id="btnSubmit">Simpan</button>
            </form>
        </div>
    </main>
    <footer>
        <span>Copyright © Made By Virgi</span>
    </footer>
    <script>
        document.getElementById('btnSubmit').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Ubah Data',
                text: 'Apakah kamu yakin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fc40c',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('store').submit();
                }
            });
        });
    </script>
</body>

</html>