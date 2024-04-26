<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styleBase.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleIndex.css') }}">
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/a1fe272ba9.js" crossorigin="anonymous"></script>
    <title>Data Siswa</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="header">
        <div class="container">
            <img src="{{ asset('img/brand.png') }}" alt="Logo">
            <h1>DATA SISWA</h1>
        </div>
    </div class="header">
    <main>
        <div class="container">
            <div class="addSearch">
                <a href="{{ route('siswa.create') }}"><button>Tambah Siswa</button></a>
                <form action="{{ route('siswa.index') }}" method="GET">
                    <button type="submit" class="btnSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="Masukan Keywords..." name="keyword" value="{{ $keyword }}" autocomplete="off">
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->no_telp }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', $data->nis) }}"><button>Edit</button></a>
                        </td>
                        <td>
                            <button type="submit" class="delete">
                                <a href="{{ route('siswa.destroy', $data->nis) }}" data-confirm-delete="true">Hapus</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $siswa->appends(['keyword' => $keyword])->links('vendor.pagination.default') }}
        </div>
    </main>
    <footer>
        <span>Copyright © Made By Virgi</span>
    </footer>
</body>

</html>