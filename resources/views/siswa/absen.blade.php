<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Kehadiran | Kehadiran Siswa</title>
</head>
<body>
    <div class="container-fluid bg-white p-0">
        {{-- Navbar --}}
        <nav class="navbar bg-body-secondary px-3" style="--bs-bg-opacity: 1;">
            <div class="container-fluid">
                <h1 class="navbar-brand m-0 fs-4">Kehadiran</h1>
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
        <div class="container-fluid overflow-hidden ">
            
            <div class="row justify-content-center align-content-center gy-5" style="height: calc(100vh - 100px)">
            
                @foreach ( $statussiswa as  $status)
                {{-- Card Hadir --}}
                <div class="col-9 col-lg-3">
                    <div class="shadow-lg card border-3 border-success text-center">
                        <div class="bg-success-subtle p-2">
                            @if ($status->kehadiran == 'belum')
                            <form action="{{route('siswa.masuk')}}" method="POST"  >
                                @csrf
                                <button type="submit" class="btn btn-success w-50 fs-5" style="height: 50px">Hadir</button>
                            </form>
                            @else
                                <button class="btn btn-success w-50 fs-5"  style="height: 50px" disabled>Hadir</button>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Card Sakit --}}
                <div class="col-9 col-lg-3">
                    <div class="shadow-lg card border-3 border-secondary text-center">
                        <div class="bg-secondary-subtle p-2">
                            @if ($status->kehadiran == 'belum')
                            <form action="{{route('siswa.sakit')}}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-secondary w-50 fs-5" style="height: 50px">Sakit</button>                            
                            </form>
                            @else
                                <button class="btn btn-secondary w-50 fs-5"  style="height: 50px" disabled>Sakit</button>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Card Izin --}}
                <div class="col-9 col-lg-3">
                    <div class="shadow-lg card border-3 border border-warning text-center">
                        <div class="bg-warning-subtle p-2">
                            @if ($status->kehadiran == 'belum') 
                            <form action="{{route('siswa.izin')}}" method="POST" >
                                @csrf                                               
                                <button type="submit" class="btn btn-warning w-50 fs-5" style="height: 50px">Izin</button>
                                
                            </form>
                            @else
                                <button class="btn btn-warning w-50 fs-5"  style="height: 50px" disabled>Izin</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="container-fluid text-center mb-4">
        
            <div class="shadow-lg card  text-center rounded p-4" style="--bs-bg-opacity: 1;">
                <div class="d-flex  justify-content-between mb-4">
                    <h5 class="fs-3 ">Kehadiran {{ Auth::user()->username }}</h5>
                    <a href="/infoAbsen" class="text-decoration-none text-black"><button class=" btn btn-info fw-medium">
                        <i class="fa-solid fa-circle-info me-2 "></i>Info Kehadiran</button></a>
                </div>
                
                <div class="table-responsive pb-4">
                    <table class="table-hover table ">
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
                            @forelse ($kehadiran as $datahadir)
                                <tr class="align-middle">
                                    <td>{{ $datahadir->hari }} <br> {{ $datahadir->tanggal }}</td>
                                    <td>{{ $datahadir->username }}</td>
                                    <td>
                                        @if ( $datahadir->waktu_masuk == false )
                                            -
                                        @else                                                                                    
                                            {{ $datahadir->waktu_masuk }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $datahadir->waktu_pulang == false )
                                            -
                                        @else
                                            {{ $datahadir->waktu_pulang }}
                                        @endif
                                    </td>
                                    <td>{{ $datahadir->status_kehadiran }}</td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>{!! $kehadiran->links() !!}</div>
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