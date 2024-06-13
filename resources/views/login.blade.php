<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Sign In | Website Kehadiran</title>
</head>
<body class="vh-100" >
    <style>
        body {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1920' height='1080' preserveAspectRatio='none' viewBox='0 0 1920 1080'%3e%3cg mask='url(%26quot%3b%23SvgjsMask19831%26quot%3b)' fill='none'%3e%3crect width='1920' height='1080' x='0' y='0' fill='rgba(255%2c 255%2c 255%2c 1)'%3e%3c/rect%3e%3crect width='263.04' height='263.04' clip-path='url(%26quot%3b%23SvgjsClipPath19832%26quot%3b)' x='1347.64' y='694.63' fill='url(%26quot%3b%23SvgjsPattern19833%26quot%3b)' transform='rotate(7.98%2c 1479.16%2c 826.15)'%3e%3c/rect%3e%3crect width='329.76' height='329.76' clip-path='url(%26quot%3b%23SvgjsClipPath19834%26quot%3b)' x='1115.97' y='271.15' fill='url(%26quot%3b%23SvgjsPattern19835%26quot%3b)' transform='rotate(143.58%2c 1280.85%2c 436.03)'%3e%3c/rect%3e%3crect width='432' height='432' clip-path='url(%26quot%3b%23SvgjsClipPath19836%26quot%3b)' x='1350.52' y='-187.28' fill='url(%26quot%3b%23SvgjsPattern19837%26quot%3b)' transform='rotate(205.44%2c 1566.52%2c 28.72)'%3e%3c/rect%3e%3crect width='509.6' height='509.6' clip-path='url(%26quot%3b%23SvgjsClipPath19838%26quot%3b)' x='173.59' y='-49.13' fill='url(%26quot%3b%23SvgjsPattern19839%26quot%3b)' transform='rotate(84.84%2c 428.39%2c 205.67)'%3e%3c/rect%3e%3cpath d='M1453.27 1033.48 L1443.3899999999999 1139.8600000000001L1516.6483581169762 1154.9883581169763z' stroke='rgba(252%2c 255%2c 13%2c 1)' stroke-width='1' stroke-dasharray='2%2c 2'%3e%3c/path%3e%3ccircle r='155.40755327033855' cx='1566.06' cy='958.15' fill='rgba(255%2c 0%2c 64%2c 1)'%3e%3c/circle%3e%3crect width='696.96' height='696.96' clip-path='url(%26quot%3b%23SvgjsClipPath19840%26quot%3b)' x='-240.3' y='-22.15' fill='url(%26quot%3b%23SvgjsPattern19841%26quot%3b)' transform='rotate(151.67%2c 108.18%2c 326.33)'%3e%3c/rect%3e%3crect width='494.76' height='494.76' clip-path='url(%26quot%3b%23SvgjsClipPath19842%26quot%3b)' x='340.77' y='655.28' fill='url(%26quot%3b%23SvgjsPattern19843%26quot%3b)' transform='rotate(126.18%2c 588.15%2c 902.66)'%3e%3c/rect%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask19831'%3e%3crect width='1920' height='1080' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cpattern x='0' y='0' width='8.22' height='8.22' patternUnits='userSpaceOnUse' id='SvgjsPattern19833'%3e%3cpath d='M0 8.22L4.11 0L8.22 8.22' stroke='rgba(169%2c 0%2c 178%2c 1)' fill='none'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath19832'%3e%3ccircle r='65.76' cx='1479.16' cy='826.15'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='9.16' height='9.16' patternUnits='userSpaceOnUse' id='SvgjsPattern19835'%3e%3cpath d='M0 9.16L4.58 0L9.16 9.16' stroke='rgba(8%2c 175%2c 129%2c 1)' fill='none'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath19834'%3e%3ccircle r='82.44' cx='1280.85' cy='436.03'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='432' height='6' patternUnits='userSpaceOnUse' id='SvgjsPattern19837'%3e%3crect width='432' height='3' x='0' y='0' fill='rgba(35%2c 187%2c 203%2c 1)'%3e%3c/rect%3e%3crect width='432' height='3' x='0' y='3' fill='rgba(0%2c 0%2c 0%2c 0)'%3e%3c/rect%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath19836'%3e%3ccircle r='108' cx='1566.52' cy='28.72'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='9.1' height='9.1' patternUnits='userSpaceOnUse' id='SvgjsPattern19839'%3e%3cpath d='M4.55 1L4.55 8.1M1 4.55L8.1 4.55' stroke='rgba(255%2c 0%2c 64%2c 1)' fill='none' stroke-width='2.33'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath19838'%3e%3ccircle r='127.4' cx='428.39' cy='205.67'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='696.96' height='9.68' patternUnits='userSpaceOnUse' id='SvgjsPattern19841'%3e%3crect width='696.96' height='4.84' x='0' y='0' fill='rgba(35%2c 187%2c 203%2c 1)'%3e%3c/rect%3e%3crect width='696.96' height='4.84' x='0' y='4.84' fill='rgba(0%2c 0%2c 0%2c 0)'%3e%3c/rect%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath19840'%3e%3ccircle r='174.24' cx='108.18' cy='326.33'%3e%3c/circle%3e%3c/clipPath%3e%3cpattern x='0' y='0' width='13.02' height='13.02' patternUnits='userSpaceOnUse' id='SvgjsPattern19843'%3e%3cpath d='M6.51 1L6.51 12.02M1 6.51L12.02 6.51' stroke='rgba(0%2c 243%2c 84%2c 1)' fill='none' stroke-width='1.21'%3e%3c/path%3e%3c/pattern%3e%3cclipPath id='SvgjsClipPath19842'%3e%3ccircle r='123.69' cx='588.15' cy='902.66'%3e%3c/circle%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e");            left: 0;
            background-size: cover;
            background-position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Mencegah scroll pada wrapper */
            display: flex; /* Menggunakan flexbox untuk menengahkan konten */
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
          }
    </style>
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            {{-- Card --}}
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3">
                <h1 class="text-center mb-4 fw-bold text-black">Website Kehadiran</h1>
                <div class="bg-body-secondary rounded mx-2 p-4 px-xl-5" style="--bs-bg-opacity: .5;">
                    <h1 class="text-center mb-4, fw-bold">Sign in</h1>
                    {{-- Form --}}
                    <form class="" action="" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="" value="" autocomplete="off">
                            <label for="username form-label">Username</label>
                            @error('username')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="" value="" autocomplete="off">
                            <label for="password form-label">Password</label>
                            @error('password')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 p-2 mb-3">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        {{-- Toast --}}
        @if (session()->has('notification'))
            <div class="position-fixed bottom-0 end-0 p-3 z-3">
                <div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-check me-2"></i>
                    {{ session('notification') }}
                    <button type="button" class="btn-close danger" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        {{-- Alert --}}
        @if($errors->any())
            <div class="position-fixed bottom-0 end-0 p-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    Username atau Password tidak cocok!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <footer>
        <h1 class="text-center fs-6 fst-normal">© FRVZ</h1>
    </footer>
    </div>
</body>
</html>