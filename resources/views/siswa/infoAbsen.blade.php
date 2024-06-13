<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Info Kehadiran | Kehadiran Siswa</title>
</head>
<body>
    <div class="container-fluid bg-white p-0">
        {{-- Navbar --}}
        <nav class="navbar bg-body-secondary px-3" style="--bs-bg-opacity: .5;">
            <div class="container-fluid">
                <h1 class="navbar-brand m-0 fs-4">Info Kehadiran</h1>
                <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/siswa_profile">Profile</a></li>
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid overflow-hidden">
            <div class="row justify-content-center align-content-center gy-5" style="height: calc(100vh - 58px)">
                {{-- Card --}}
                <div class="col-11 col-lg-4">
                    <div class="shadow-lg card border-3 border-info text-center">
                        <div class="d-flex justify-content-between card-header p-2">
                            <a href="/absen" class="text-decoration-none  text-black"><button class=" btn btn-info fw-medium ms-2 mt-2">
                                <i class="fa-solid fa-arrow-left me-2"></i>Kembali</button></a>
                            <i class="fa-solid fa-circle-info fs-2 mt-lg-2 mt-3 me-2 " ></i>
                        </div>
                        @foreach ( $statussiswa as $status )
                        @if ( $status->kehadiran == 'sudah')
                            <div class="card-body"> 
                                @foreach ( $infoabsen as $iabsen )
                                    <h5 class="card-title">Anda {{$iabsen->status_kehadiran}} Hari Ini</h5>
                                    <p class="card-text">{{ $iabsen->waktu_masuk }} - {{ $iabsen->waktu_pulang }}</p>                            
                                @if ( $iabsen->waktu_pulang == true )    
                                    <button class="btn btn-primary " disabled>Pulang</button>
                                @elseif ( $iabsen->status_kehadiran == 'Hadir')
                                    <form action="{{route('siswa.pulang')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Pulang</button>
                                    </form>
                                @endif                                
                                @endforeach                                                                                   
                            </div>
                        @elseif ( $status->kehadiran == 'belum' )
                            <div class="card-body">
                                <h5 class="card-title">Anda Belum Mengisi Kehadiran Hari Ini</h5>
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
    {{-- Alert --}}
    @if($errors->any())
        <div class="position-fixed bottom-0 end-0 p-3">
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    {{ $item }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @endif
</body>
{{-- Icon --}}
<script src="https://kit.fontawesome.com/e814145206.js" crossorigin="anonymous"></script>
</html>