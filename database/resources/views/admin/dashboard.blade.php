<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        {{-- Bootstrap --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>
    <body>
        <div class="container-fluid bg-white p-0">
            {{-- Navbar --}}
            <nav class="navbar bg-body-secondary px-3" style="--bs-bg-opacity: .5;">
                <div class="container-fluid">
                    <h1 class="navbar-brand">Data Kehadiran</h1>
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
                <div class="container-fluid pt-3 px-3 pb-4 ">
                    <div class="col-12">
                        <div class="bg-body-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="/datasiswa" class="text-decoration-none fs-4"><submit class="btn btn-sm btn-primary p-2 fs-6">Data Siswa <i class="fa-solid fa-folder"></i></button></a>
                                <form class=" d-flex  m-3"> {{-- Form Navbar --}}
                                    <input class="form-control border-1" type="search" placeholder="Search">
                                </form>
                            </div>
                            {{-- Table Absen --}}
                            <div class="table-responsive pb-2">
                                <table  class="table-hover table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Masuk</th>
                                            <th scope="col">Pulang</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td>Senin <br> 01/01/2024</td>
                                            <td>Rifqi Sigma</td>
                                            <td>10.00</td>
                                            <td>00.00</td>
                                            <td>Izin Malas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>{{-- pagination --}}</div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid pt-3 px-3 pb-4 ">
                    <div class="col-12">
                        <div class="bg-body-secondary text-center rounded p-4 ">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="mb-0">Tahun 2024</h5>
                                <form action="" method="GET ">
                                    @csrf
                                    <select name="" class="form-select" onchange="form.submit()">
                                        <option value="" selected hidden>bulan</option>
                                            <option value="">Januari</option>
                                            <option value="">Februari</option>
                                            <option value="">Maret</option>
                                    </select>
                                </form>
                            </div>
                            {{-- chart --}}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
    {{-- Icon --}}
    <script src="https://kit.fontawesome.com/e814145206.js" crossorigin="anonymous"></script>
</html>