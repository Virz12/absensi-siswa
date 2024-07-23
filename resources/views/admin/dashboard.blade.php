<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        {{-- Bootstrap --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        {{-- jQuery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <title>Dashboard</title>
    </head>
    <body class="vh-100" >
        <style>
            body {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1920' height='1080' preserveAspectRatio='none' viewBox='0 0 1920 1080'%3e%3cg mask='url(%26quot%3b%23SvgjsMask21244%26quot%3b)' fill='none'%3e%3crect width='1920' height='1080' x='0' y='0' fill='rgba(255%2c 255%2c 255%2c 1)'%3e%3c/rect%3e%3crect width='60' height='60' clip-path='url(%26quot%3b%23SvgjsClipPath21245%26quot%3b)' x='1849.8' y='-9.33' fill='url(%26quot%3b%23SvgjsPattern21246%26quot%3b)' transform='rotate(253.35%2c 1879.8%2c 20.67)'%3e%3c/rect%3e%3ccircle r='134.46788196200924' cx='1130.49' cy='724.34' stroke='rgba(255%2c 0%2c 64%2c 1)' stroke-width='1.68' stroke-dasharray='4%2c 4'%3e%3c/circle%3e%3crect width='238.64' height='238.64' clip-path='url(%26quot%3b%23SvgjsClipPath21247%26quot%3b)' x='493.79' y='156.21' fill='url(%26quot%3b%23SvgjsPattern21248%26quot%3b)' transform='rotate(206.44%2c 613.11%2c 275.53)'%3e%3c/rect%3e%3crect width='168' height='168' clip-path='url(%26quot%3b%23SvgjsClipPath21249%26quot%3b)' x='1630.83' y='68.91' fill='url(%26quot%3b%23SvgjsPattern21250%26quot%3b)' transform='rotate(83.68%2c 1714.83%2c 152.91)'%3e%3c/rect%3e%3crect width='680.96' height='680.96' clip-path='url(%26quot%3b%23SvgjsClipPath21251%26quot%3b)' x='-322.58' y='238.13' fill='url(%26quot%3b%23SvgjsPattern21252%26quot%3b)' transform='rotate(312.42%2c 17.9%2c 578.61)'%3e%3c/rect%3e%3crect width='370.8' height='370.8' clip-path='url(%26quot%3b%23SvgjsClipPath21253%26quot%3b)' x='1577.48' y='519.96' fill='url(%26quot%3b%23SvgjsPattern21254%26quot%3b)' transform='rotate(279.12%2c 1762.88%2c 705.36)'%3e%3c/rect%3e%3ccircle r='90' cx='255.11' cy='872.86' fill='rgba(8%2c 175%2c 129%2c 1)'%3e%3c/circle%3e%3ccircle r='141.05922210403688' cx='1876.45' cy='387.57' stroke='rgba(35%2c 187%2c 203%2c 1)' stroke-width='1.86' stroke-dasharray='3%2c 2'%3e%3c/circle%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask21244'%3e%3crect width='1920' height='1080' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cpattern x='0' y='0' width='60' height='6' patternUnits='userSpaceOnUse' id='SvgjsPattern21246'%3e%3crect width='60' height='3' x='0' y='0' fill='rgba(8%2c 175%2c 129%2c 1)'%3e%3c/rect%3e%3crect width='60' height='3' x='0' y='3' fill='rgba(0%2c 0%2c 0%2c 0)'%3e%3c/rect%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath21245'%3e%3ccircle r='15' cx='1879.8' cy='20.67'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='6.28' height='6.28' patternUnits='userSpaceOnUse' id='SvgjsPattern21248'%3e%3cpath d='M3.14 1L3.14 5.28M1 3.14L5.28 3.14' stroke='rgba(0%2c 243%2c 84%2c 1)' fill='none' stroke-width='1'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath21247'%3e%3ccircle r='59.66' cx='613.11' cy='275.53'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='6' height='6' patternUnits='userSpaceOnUse' id='SvgjsPattern21250'%3e%3cpath d='M0 6L3 0L6 6' stroke='rgba(169%2c 0%2c 178%2c 1)' fill='none'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath21249'%3e%3ccircle r='42' cx='1714.83' cy='152.91'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='6.08' height='6.08' patternUnits='userSpaceOnUse' id='SvgjsPattern21252'%3e%3cpath d='M0 6.08L3.04 0L6.08 6.08' stroke='rgba(252%2c 255%2c 13%2c 1)' fill='none'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath21251'%3e%3ccircle r='170.24' cx='17.9' cy='578.61'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='12.36' height='12.36' patternUnits='userSpaceOnUse' id='SvgjsPattern21254'%3e%3cpath d='M6.18 1L6.18 11.36M1 6.18L11.36 6.18' stroke='rgba(252%2c 255%2c 13%2c 1)' fill='none' stroke-width='1'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath21253'%3e%3ccircle r='92.7' cx='1762.88' cy='705.36'%3e%3c/circle%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e");            background-position: fixed;
                background-size: cover;
                background-position: fixed;
                left: 0;
                width: 100%;
                height: 100%;
                justify-content: center;
                align-items: center;
                background-repeat: no-repeat;
                margin: 0;
                padding: 0;
            }
        </style>
    <body>
        <div class="container-fluid p-0">
            {{-- Navbar --}}
            <nav class="navbar bg-body-secondary px-3" style="--bs-bg-opacity: .5;">
                <div class="container-fluid">
                    <h1 class="navbar-brand">Data Kehadiran</h1>
                    <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Auth::user()->foto_profil == null)
                            <span class="d-lg-inline-flex">{{ Auth::user()->username }}</span>
                        @else
                            @if(File::exists(Auth::user()->foto_profil))
                                <img class="rounded-circle me-lg-2 " src="{{ asset(Auth::user()->foto_profil) }}" alt="Profile picture"
                                style="width: 40px; height: 40px;">
                                <span class="d-lg-inline-flex">{{ Auth::user()->username }}</span>
                            @else
                                <span class="d-lg-inline-flex">{{ Auth::user()->username }}</span>
                            @endif
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/admin_profile"><i class="fa-solid fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
                    </ul>
                    </div>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid pt-3 px-3 pb-4 ">
                    <div class="col-12">
                        <div class="shadow-lg card text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="/datasiswa" class="text-decoration-none fs-4"><button class="btn btn-sm btn-primary p-2 fs-6">Data Siswa <i class="fa-solid fa-folder"></i></button></a>
                                <form class=" d-flex  m-3" action="" method="GET"> {{-- Form Navbar --}}
                                    <input class="form-control border-2 border-primary" type="search" name="keyword" value="{{ $keyword }}" placeholder="Cari" autocomplete="off">
                                </form>
                            </div>
                            {{-- Table Absen --}}
                            <div class="table-responsive pb-2">
                                <table  class="table-hover table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Username</th>                                                                                 <th scope="col">Masuk</th>
                                            <th scope="col">Pulang</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $absen as $dabsen )
                                            <tr class="align-middle">
                                                <td>{{ $dabsen->hari }} <br> {{ $dabsen->tanggal }}</td>
                                                <td>{{ $dabsen->username }}</td>                                                
                                                <td>
                                                    @if ( $dabsen->waktu_masuk == false )
                                                        -
                                                    @else                                                                                    
                                                        {{ $dabsen->waktu_masuk }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ( $dabsen->waktu_pulang == false )
                                                        -
                                                    @else
                                                        {{ $dabsen->waktu_pulang }}
                                                    @endif
                                                </td>
                                                <td ><span class="badge rounded-pill fs-6                                                                                                      
                                                    @if ($dabsen->status_kehadiran == 'Hadir')
                                                        text-bg-success
                                                    @elseif ($dabsen->status_kehadiran == 'Sakit')
                                                        text-bg-secondary
                                                    @elseif ($dabsen->status_kehadiran == 'Izin')
                                                        text-bg-warning
                                                    @elseif ($dabsen->status_kehadiran == 'Alpha')
                                                        text-bg-danger
                                                    @endif
                                                    ">{{ $dabsen->status_kehadiran }}</span></td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div>{!! $absen->links() !!}</div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid pt-3 px-3 pb-4 ">
                    <div class="col-12">
                        <div class="shadow-lg card text-center rounded p-4">
                            <div class="row align-items-baseline justify-content-between mb-4">
                                <h5 class="mb-0 w-auto col-12 col-lg-4"><i class="fa-solid fa-file-pen"></i> Rekap Kehadiran</h5>
                                <form action="" method="GET" class="row g-2 mt-2 mt-sm-2 mt-sm-0 me-2 justify-content-lg-end col-12 col-lg-8">
                                    @csrf
                                    <div class="col-12 col-sm-4 col-lg-auto">
                                        <input type="date" class="form-control me-2 border-2 border-primary" value="{{ $hariAwal }}" name="hariAwal" id="dateAwal" required>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-auto">
                                        <input type="date" class="form-control me-2 border-2 border-primary" value="{{ $hariAkhir }}" name="hariAkhir" id="dateAkhir" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-lg-1 col-12 col-sm-4 col-lg-auto">Ubah</button>
                                </form>
                            </div>
                            {{-- Table --}}
                            <div class="table-responsive pb-2">
                                <table  class="table-hover table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th  class="table-success" scope="col">Hadir</th>
                                            <th class="table-secondary" scope="col">Sakit</th>
                                            <th class="table-warning" scope="col">Izin</th>
                                            <th class="table-danger" scope="col">Alpha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $rekap as $stat)
                                            <tr class="align-middle">
                                            @foreach ($stat as $item => $value)           
                                                <td class="
                                                @if ($item == 'Hadir')
                                                    table-success
                                                @elseif ($item == 'Sakit')
                                                    table-secondary
                                                @elseif ($item == 'Izin')
                                                    table-warning
                                                @elseif ($item == 'Alpha')
                                                    table-danger
                                                @endif
                                                ">
                                                    @if ( $value == NULL )
                                                        -
                                                    @else                                                                                    
                                                        {{ $value }}
                                                    @endif
                                                </td>
                                            @endforeach
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid pt-3 px-3 pb-4">
                    <div class="col-12">
                        <div class="shadow-lg card text-center rounded p-4">
                            <div class="row align-items-baseline justify-content-between mb-4">
                                <h5 class="mb-0 w-auto col-12 col-lg-4"><i class="fa-solid fa-chart-simple"></i> Chart {{ $status }} Tahun {{ $tahun }}</h5>
                                <form action="" method="GET" class="row g-2 mt-2 mt-sm-2 mt-sm-0 me-2 justify-content-lg-end col-12 col-lg-8">
                                    @csrf
                                    <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2">
                                        <select name="status" class="form-control form-select me-2 border-2 border-primary" onchange="form.submit()">
                                            <option value="{{ $status }}" selected hidden>{{ $status }}</option>
                                            <option value="Hadir">Hadir</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Izin">Izin</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-lg-3 col-xl-2">
                                        <select name="bulan" class="form-select border-2 border-primary me-2" onchange="form.submit()">
                                            <option value="{{ $bulanSekarang }}" selected hidden>{{ $bulanSekarang }}</option>
                                            @if ($dataBulan->isEmpty())
                                            @else
                                                @forelse($dataBulan as $bulan)
                                                    <option value="{{ $bulan }}">{{ $bulan }}</option>
                                                @empty
                                                    <option value="{{ $bulan }}">{{ $bulan }}</option>
                                                @endforelse
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-lg-3 col-xl-2">
                                        <select name="tahun" class="form-select border-2 border-primary" onchange="form.submit()">
                                            <option value="{{ $tahun }}" selected hidden>{{ $tahun }}</option>
                                            @if ($dataTahun->isEmpty())
                                            @else
                                                @forelse($dataTahun as $tahun)
                                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                                @empty
                                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                                @endforelse
                                            @endif
                                        </select>
                                    </div>
                                </form>
                            </div>
                            {{-- Chart --}}
                            <div class="w-100">
                                {!! $chartAbsen->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $('#dateAwal').on('change', function() {
                let startDate = new Date($(this).val());
                let month = ('0' + (startDate.getMonth() + 1)).slice(-2);
                let year = startDate.getFullYear();

                let firstDayOfMonth = new Date(year, startDate.getMonth(), 2);

                let minDate = firstDayOfMonth.toISOString().split('T')[0];

                $('#dateAkhir').attr('min', minDate);
                $('#dateAkhir').val('');
            });
        });
    </script>
    {{-- Icon --}}
    <script src="https://kit.fontawesome.com/e814145206.js" crossorigin="anonymous"></script>
</html>