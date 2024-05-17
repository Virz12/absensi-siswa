<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Profile Siswa | Absen Siswa</title>
</head>
<body>
    <div class="container-fluid bg-white p-0">
        {{-- Navbar --}}
        <nav class="navbar bg-body-secondary px-3" style="--bs-bg-opacity: .5;">
            <div class="container-fluid">
                <h1 class="navbar-brand">Absen</h1>
                <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Fajar
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
                </div>
            </div>
        </nav>
        {{-- Form --}}
        <div class="container-fluid">
            <form class="row g-3 mt-5 px-3" action="" method="POST">
            @csrf
            @method('PUT')
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="" class="form-control" id="username" autocomplete="off">
                </div>
                <div class="col-md-6">
                    <label for="telefone" class="form-label">Nomor Telfon</label>
                    <input type="number" name="" class="form-control" id="telefone" autocomplete="off">
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="" class="form-control" id="password">
                </div>
                <div class="col-md-12">
                    <label for="passwordConfirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="" class="form-control" id="passwordConfirm">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>