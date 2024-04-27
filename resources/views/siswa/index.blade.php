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
    <link rel="icon" href="{{ asset('image/favicon-16x16.png') }}" type="image/x-icon" ?v={{ time() }}>
    <link rel="manifest" href="/site.webmanifest">
    <title>Data Kehadiran</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="header">
        <div class="container">
            <img src="{{ asset('img/brand.png') }}" alt="Logo">
            <h1>DATA KEHADIRAN</h1>
        </div>
    </div class="header">
    <main>
        <div class="container">
            <div class="addSearch">
                <a href="{{ route('siswa.create') }}"><button>Absen</button></a>
                <form action="{{ route('siswa.index') }}" method="GET">
                    <button type="submit" class="btnSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="Masukan Keywords..." name="keyword" value="{{ $keyword }}" autocomplete="off">
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>OpsiKehadiran</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->Nama }}</td>
                        <td class="tanggal">{{ $data->Tanggal }}</td>
                        <td>{{ $data->OpsiKehadiran }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', $data->id) }}"><button>Edit</button></a>
                        </td>
                        <td>
                            <button type="submit" class="delete">
                                <a href="{{ route('siswa.destroy', $data->id) }}" data-confirm-delete="true">Hapus</a>
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
        <span>Copyright © SMKN 2 BANDUNG</span>
    </footer>
    <script>
        const x = document.getElementsByClassName("tanggal");
        Array.from(x).forEach(tanggal => {
            tanggal.innerHTML = tanggal.innerText.replace("T", " ");
        });
    </script>
</body>

</html>