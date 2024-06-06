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
                        <li><a class="dropdown-item" href="/admin_profile">Profile</a></li>
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
                        @forelse ($datasiswa as $dsiswa)            
                            <div class="col-md-3 ">
                                <div class="card ">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item ">Nama : {{$dsiswa->username}}</li>
                                        <li class="list-group-item ">Jenis Kelamin : {{$dsiswa->jenis_kelamin}} </li>
                                        <li class="list-group-item ">No Hp : {{$dsiswa->telefone}} </li>
                                        <li class="list-group-item fw-bold">Status : {{$dsiswa->status}}</li>
                                        <li class="list-group-item ">
                                            @if($dsiswa->status == 'nonaktif')
                                                        <div class="d-flex justify-content-between gap-2">
                                                            <a href="/activate/{{ $dsiswa->id }}" class="text-decoration-none  w-100">
                                                            <button type="submit" value="Aktif" class="btn btn-success w-100">Aktif</button></a>
                                                            <form action="/hapussiswa/{{ $dsiswa->id }}"  class=" w-100">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger w-100"><i class="fa-solid fa-trash p-1"></i>Hapus</button>
                                                            </form>
                                                        </div>
                                            @elseif($dsiswa->status == 'aktif')
                                                <a href="/deactivate/{{ $dsiswa->id }}" class="text-decoration-none">                                                
                                                    <button class="btn btn-warning w-100">Non Aktif</button>
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @empty
                                <h2 class="text-center">Data Kosong</h2>
                        @endforelse
                        </div>
                    </div>
                </div>
            </main>
        </div>
        {{-- Toast --}}
        @if (session()->has('notification'))
        <div class="position-fixed bottom-0 end-0 p-3 z-3">
            <div class="alert alert-success" role="alert">
                <i class="fa-solid fa-check me-2"></i>
                {{ session('notification') }}
                <button type="button" class="btn-close success" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
    </body>
    {{-- Icon --}}
    <script src="https://kit.fontawesome.com/e814145206.js" crossorigin="anonymous"></script>
</html>