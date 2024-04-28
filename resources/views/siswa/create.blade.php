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
    <title>Data Kehadiran</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="header">
        <div class="container">
            <img src="{{ asset('image/brand.png') }}" alt="Logo">
            <h1>DATA KEHADIRAN</h1>
        </div>
    </div>
    <main>
        <div class="container">
            <a href="{{ route('siswa.index') }}">
                <i class="fa-solid fa-arrow-left"></i>Kembali
            </a>
            <form method="POST" id="store" action="{{ route('siswa.store') }}">
                @csrf
                <div>
                    <label for="Nama">Nama :</label>
                    <input type="text" value="{{ @old('Nama') }}" id="Nama" name="Nama" autocomplete="off">
                    @error('Nama')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="Tanggal">Tanggal & Waktu :</label>
                    <input type="datetime-local" value="{{ @old('Tanggal') }}" id="Tanggal" name="Tanggal" autocomplete="off">
                    @error('Tanggal')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="Notelp">No Telpon :</label>
                    <input type="number" value="{{ @old('Notelp') }}" id="Notelp" name="Notelp" autocomplete="off">
                    @error('Notelp')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="OpsiKehadiran">Opsi Kehadiran :</label><br>
                    <select name="OpsiKehadiran" id="OpsiKehadiran">
                        <option value="hadir">Hadir</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                    </select>
                    @error('OpsiKehadiran')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" value="-" id="Komentar" name="Komentar" autocomplete="off">
                <button type="submit" id="btnSubmit">Simpan</button>
            </form>
        </div>
    </main>
    <footer>
        <span>Copyright © FRVZ SMKN 2 BANDUNG 2024</span>
    </footer>
    <script>
        document.getElementById('btnSubmit').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Tambah Data',
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
