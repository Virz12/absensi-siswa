<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Absen | Absen Siswa</title>
</head>
<body>
    <div class="container-fluid bg-white p-0">
        {{-- Navbar --}}
        <nav class="navbar bg-body-secondary px-3" style="--bs-bg-opacity: .5;">
            <div class="container-fluid">
                <h1 class="navbar-brand">Absen</h1>
                <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid overflow-hidden">
            <div class="row justify-content-center align-content-center gy-5" style="height: calc(100vh - 58px)">
                {{-- Card Hadir --}}
                <div class="col-8 col-lg-3">
                    <div class="card text-center">
                        <div class="card-header">Absen Hadir</div>
                        <div class="card-body">
                            <a href="/infoAbsen" class="btn btn-success">Absen</a>
                        </div>
                    </div>
                </div>
                {{-- Card Sakit --}}
                <div class="col-8 col-lg-3">
                    <div class="card text-center">
                        <div class="card-header">Absen Sakit</div>
                        <div class="card-body">
                            <a href="#" class="btn btn-secondary">Absen</a>
                        </div>
                    </div>
                </div>
                {{-- Card Izin --}}
                <div class="col-8 col-lg-3">
                    <div class="card text-center">
                        <div class="card-header">Absen Izin</div>
                        <div class="card-body">
                            <a href="#" class="btn btn-warning">Absen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>