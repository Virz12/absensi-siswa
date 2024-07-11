<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Profile Admin | Kehadiran Siswa</title>
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
                <h1 class="navbar-brand m-0 fs-4">Profile</h1>
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
                    <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-4">
            {{-- card foto profil --}}
            <div class="row g-4 justify-content-center " >
                <div class="col-lg-3">
                    <div class="shadow-lg card p-3">
                        <div class="d-flex align-items-center m-0">
                            <a href="/kehadiran" class="btn btn-primary mb-0 text-decoration-none "><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if (File::exists(Auth::user()->foto_profil))
                                <div class="ratio ratio-1x1">
                                    <img class="rounded-circle" src="{{ asset(Auth::user()->foto_profil) }}" alt="Profile picture">
                                    <label for="foto_profil"></label>
                                </div>
                            @else
                                <div class="ratio ratio-1x1">
                                    <label class=" rounded-circle bg-body-secondary text-center" for="foto_profil">
                                        <i class="fa-solid fa-image fs-1 position-absolute top-50 start-50 translate-middle"></i></label>
                                </div>
                            @endif
                                <div class="mt-3">
                                    <h4>{{$data_user->nama_depan}} {{$data_user->nama_belakang}}</h4>
                                <form action="{{ route('admin.fotoprofil') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="foto_profil" class="form-control border-2 @error('foto_profil') is-invalid @enderror" id="foto_profil" onchange="this.form.submit()">
                                    @error('foto_profil')
                                        <div class=" text-danger "><small>{{ $message }}</small></div>
                                    @enderror                                    
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card identitas --}}
                <div class="col-lg-8">
                    <div class="shadow-lg card">
                        <div class="card-body">
                        {{-- Form --}}        
                        <form  action="{{ route('admin.identitas') }}" method="POST">
                            @csrf
                            @method('PUT')                        
                            <div class="row mb-3">
								<div class="col-sm-3">
									<label for="nama_depan" class="form-label">Nama Depan<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-9 text-secondary">
                                    <input type="text" value="{{ $data_user->nama_depan }}" name="nama_depan" class="form-control border-2  @error('nama_depan') is-invalid @enderror" id="nama_depan" autocomplete="off">
                                    @error('nama_depan')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<label for="nama_belakang" class="form-label">Nama Belakang<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" value="{{ $data_user->nama_belakang }}" name="nama_belakang" class="form-control border-2 @error('nama_belakang') is-invalid @enderror" id="nama_belakang" autocomplete="off">
                                    @error('nama_belakang')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
								</div>
							</div>                           
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<button type="submit" class="btn btn-primary mb-2 px-4"><i class="fa-solid fa-arrow-up-from-bracket"></i> Simpan</button>
								</div>
							</div>
                        </form>
                        </div>
                    </div>
                    {{-- Card Ubah Password --}}
                    <div class="row g-4 justify-content-center m-auto">                        
                        <div class="shadow-lg card mb-3">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="username" class="form-label">Username</span></label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" placeholder="{{ $data_user->username }}" class="form-control border-2" id="username" disabled>
                                    </div>
                                </div>
                            <form  action="{{route('admin.ubahpassword')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="passwordLama" class="form-label">Password<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="passwordLama" class="form-control border-2 @error('passwordLama') is-invalid @enderror" id="passwordLama">
                                        @error('passwordLama')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="password" class="form-label">Password Baru<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="password" class="form-control border-2 @error('password') is-invalid @enderror" id="password">
                                        @error('password')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="passwordConfirm" class="form-label">Konfirmasi Password Baru<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="passwordConfirm" class="form-control border-2 @error('passwordConfirm') is-invalid @enderror" id="passwordConfirm">
                                        @error('passwordConfirm')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-primary mb-2 px-4"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ubah</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>>
    </div>
</body>
{{-- Icon --}}
<script src="https://kit.fontawesome.com/e814145206.js" crossorigin="anonymous"></script>
</html>