<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- Bootstrap --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <title>Data Siswa</title>
    </head>
    <body>
        <div class="container-fluid bg-white p-0">
            {{-- Navbar --}}
            <nav class="navbar bg-body-secondary px-3" style="--bs-bg-opacity: .5;">
                <div class="container-fluid">
                    <h1 class="navbar-brand">Data Siswa</h1>
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
            <main class="content">
                <div class="container-fluid pt-4 px-4 pb-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <a href="/dashboard" class="mb-0 text-decoration-none text-black"><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                        <form class=" d-flex "> {{-- Form Navbar --}}
                            <input class="form-control border-1 border-black" type="search" placeholder="Search">
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="row g-4 text-left">
                            <div class="col-md-3 ">
                                <div class="card ">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item ">Nama : Rifqi Sigma</li>
                                        <li class="list-group-item ">Jenis Kelamin : Pria lah</li>
                                        <li class="list-group-item ">No Hp : 082199448866 </li>
                                        <li class="list-group-item fw-bold">Status : Aktif</li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <a href="" class="text-decoration-none  ">
                                                <button class="btn btn-success  ">Aktif</button>
                                            </a>
                                            <a href="" class="text-decoration-none ">
                                                <button class="btn btn-warning ">Non Aktif</button>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
    {{-- Icon --}}
    <script src="https://kit.fontawesome.com/e814145206.js" crossorigin="anonymous"></script>
</html>