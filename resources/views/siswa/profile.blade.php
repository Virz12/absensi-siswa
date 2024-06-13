<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Profile Siswa | Kehadiran Siswa</title>
</head>
<body class="vh-100" >
<style>
    body {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1920' height='1080' preserveAspectRatio='none' viewBox='0 0 1920 1080'%3e%3cg mask='url(%26quot%3b%23SvgjsMask2179%26quot%3b)' fill='none'%3e%3crect width='1920' height='1080' x='0' y='0' fill='rgba(255%2c 255%2c 255%2c 1)'%3e%3c/rect%3e%3ccircle r='103.74401840075028' cx='66.86' cy='488.56' stroke='rgba(252%2c 255%2c 13%2c 1)' stroke-width='2.06'%3e%3c/circle%3e%3crect width='219.24' height='219.24' clip-path='url(%26quot%3b%23SvgjsClipPath2180%26quot%3b)' x='1742.01' y='560.76' fill='url(%26quot%3b%23SvgjsPattern2181%26quot%3b)' transform='rotate(258.87%2c 1851.63%2c 670.38)'%3e%3c/rect%3e%3cpath d='M1116.74 948.78a5.6 5.6 0 1 0-9.5 5.93 5.6 5.6 0 1 0 9.5-5.93zM1103.16 957.24a5.6 5.6 0 1 0-9.5 5.93 5.6 5.6 0 1 0 9.5-5.93zM1089.58 965.7a5.6 5.6 0 1 0-9.5 5.93 5.6 5.6 0 1 0 9.5-5.93zM1076 974.16a5.6 5.6 0 1 0-9.5 5.93 5.6 5.6 0 1 0 9.5-5.93zM1135.45 918.28a5.6 5.6 0 1 0-9.51 5.93 5.6 5.6 0 1 0 9.51-5.93zM1121.87 926.74a5.6 5.6 0 1 0-9.51 5.93 5.6 5.6 0 1 0 9.51-5.93zM1108.29 935.2a5.6 5.6 0 1 0-9.51 5.93 5.6 5.6 0 1 0 9.51-5.93zM1094.7 943.66a5.6 5.6 0 1 0-9.5 5.93 5.6 5.6 0 1 0 9.5-5.93zM1154.15 887.78a5.6 5.6 0 1 0-9.51 5.93 5.6 5.6 0 1 0 9.51-5.93zM1140.57 896.24a5.6 5.6 0 1 0-9.51 5.93 5.6 5.6 0 1 0 9.51-5.93zM1126.99 904.7a5.6 5.6 0 1 0-9.51 5.93 5.6 5.6 0 1 0 9.51-5.93zM1113.41 913.16a5.6 5.6 0 1 0-9.51 5.93 5.6 5.6 0 1 0 9.51-5.93z' fill='rgba(169%2c 0%2c 178%2c 1)'%3e%3c/path%3e%3crect width='144' height='144' clip-path='url(%26quot%3b%23SvgjsClipPath2182%26quot%3b)' x='630.43' y='660.36' fill='url(%26quot%3b%23SvgjsPattern2183%26quot%3b)' transform='rotate(25.09%2c 702.43%2c 732.36)'%3e%3c/rect%3e%3crect width='279.6' height='279.6' clip-path='url(%26quot%3b%23SvgjsClipPath2184%26quot%3b)' x='588.56' y='-110.89' fill='url(%26quot%3b%23SvgjsPattern2185%26quot%3b)' transform='rotate(297.68%2c 728.36%2c 28.91)'%3e%3c/rect%3e%3ccircle r='90' cx='475.49' cy='248.87' stroke='rgba(255%2c 0%2c 64%2c 1)' stroke-width='1' stroke-dasharray='3%2c 3'%3e%3c/circle%3e%3crect width='79.4' height='79.4' clip-path='url(%26quot%3b%23SvgjsClipPath2186%26quot%3b)' x='1142.81' y='644.11' fill='url(%26quot%3b%23SvgjsPattern2187%26quot%3b)' transform='rotate(250.9%2c 1182.51%2c 683.81)'%3e%3c/rect%3e%3crect width='636' height='636' clip-path='url(%26quot%3b%23SvgjsClipPath2188%26quot%3b)' x='115.48' y='626.32' fill='url(%26quot%3b%23SvgjsPattern2189%26quot%3b)' transform='rotate(128.89%2c 433.48%2c 944.32)'%3e%3c/rect%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask2179'%3e%3crect width='1920' height='1080' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cpattern x='0' y='0' width='12.18' height='12.18' patternUnits='userSpaceOnUse' id='SvgjsPattern2181'%3e%3cpath d='M6.09 1L6.09 11.18M1 6.09L11.18 6.09' stroke='rgba(169%2c 0%2c 178%2c 1)' fill='none' stroke-width='4.49'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath2180'%3e%3ccircle r='54.81' cx='1851.63' cy='670.38'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='6' height='6' patternUnits='userSpaceOnUse' id='SvgjsPattern2183'%3e%3cpath d='M3 1L3 5M1 3L5 3' stroke='rgba(252%2c 255%2c 13%2c 1)' fill='none' stroke-width='1.9'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath2182'%3e%3ccircle r='36' cx='702.43' cy='732.36'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='13.98' height='13.98' patternUnits='userSpaceOnUse' id='SvgjsPattern2185'%3e%3cpath d='M6.99 1L6.99 12.98M1 6.99L12.98 6.99' stroke='rgba(255%2c 0%2c 64%2c 1)' fill='none' stroke-width='2.52'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath2184'%3e%3ccircle r='69.9' cx='728.36' cy='28.91'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='79.4' height='7.94' patternUnits='userSpaceOnUse' id='SvgjsPattern2187'%3e%3crect width='79.4' height='3.97' x='0' y='0' fill='rgba(35%2c 187%2c 203%2c 1)'%3e%3c/rect%3e%3crect width='79.4' height='3.97' x='0' y='3.97' fill='rgba(0%2c 0%2c 0%2c 0)'%3e%3c/rect%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath2186'%3e%3ccircle r='19.85' cx='1182.51' cy='683.81'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='6' height='6' patternUnits='userSpaceOnUse' id='SvgjsPattern2189'%3e%3cpath d='M3 1L3 5M1 3L5 3' stroke='rgba(255%2c 0%2c 64%2c 1)' fill='none' stroke-width='1'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath2188'%3e%3ccircle r='159' cx='433.48' cy='944.32'%3e%3c/circle%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e");        background-size: cover;
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
                    {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="d-flex align-items-center mt-4 ms-4 mb-2">
            <a href="/absen" class="mb-0 text-decoration-none text-black"><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
        </div>
        {{-- Form --}}
        <div class="container-fluid">
            <form class="row g-3 justify-content-center m-auto" action="" method="POST">
            @csrf
            @method('PUT')
                <div class="col-md-3">
                    <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                    <input type="text" value="{{ $data_user->username }}" name="username" class="form-control border-2" id="username" autocomplete="off">
                    @error('username')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="telefone" class="form-label">Nomor Telfon<span class="text-danger">*</span></label>
                    <input type="text" value="{{ $data_user->telefone }}" name="telefone" class="form-control border-2" id="telefone" autocomplete="off">
                    @error('telefone')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" class="form-select border-2" id="jenis_kelamin" aria-label="Default select example">
                        <option value="{{ $data_user->jenis_kelamin }}" selected hidden>{{ $data_user->jenis_kelamin }}</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="passwordOld" class="form-label">Password<span class="text-danger">*</span></label>
                    <input type="password" name="passwordOld" class="form-control border-2" id="passwordOld">
                    @error('passwordOld')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" name="password" class="form-control border-2" id="password">
                    @error('password')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="passwordConfirm" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="passwordConfirm" class="form-control border-2" id="passwordConfirm">
                    @error('passwordConfirm')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Alert --}}
    @if($errors->any())
        <div class="position-fixed bottom-0 end-0 p-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                Proses update gagal!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
</body>
{{-- Icon --}}
<script src="https://kit.fontawesome.com/e814145206.js" crossorigin="anonymous"></script>
</html>