<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Sign In | Absensi Siswa</title>
</head>
<body class="vh-100">
    <style>
        body {
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
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
    <svg class="z-n1 position-absolute object-fit-xxl-contain " xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" width="1920" height="1080" preserveAspectRatio="none" viewBox="0 0 1920 1080">
        <g mask="url(&quot;#SvgjsMask32596&quot;)" fill="none">
            <rect width="1920" height="1080" x="0" y="0" fill="url(&quot;#SvgjsLinearGradient32597&quot;)"></rect>
            <rect width="60" height="60" clip-path="url(&quot;#SvgjsClipPath32598&quot;)" x="1194.36" y="72.63" fill="url(&quot;#SvgjsPattern32599&quot;)" transform="rotate(138.99, 1224.36, 102.63)"></rect>
            <rect width="300" height="300" clip-path="url(&quot;#SvgjsClipPath32600&quot;)" x="1337.34" y="-6.13" fill="url(&quot;#SvgjsPattern32601&quot;)" transform="rotate(348.19, 1487.34, 143.87)"></rect>
            <rect width="716.32" height="716.32" clip-path="url(&quot;#SvgjsClipPath32602&quot;)" x="529.7" y="583.88" fill="url(&quot;#SvgjsPattern32603&quot;)" transform="rotate(312.4, 887.86, 942.04)"></rect>
            <rect width="543.36" height="543.36" clip-path="url(&quot;#SvgjsClipPath32604&quot;)" x="220.55" y="-218.35" fill="url(&quot;#SvgjsPattern32605&quot;)" transform="rotate(127.34, 492.23, 53.33)"></rect>
            <rect width="192.48" height="192.48" clip-path="url(&quot;#SvgjsClipPath32606&quot;)" x="322.25" y="576.4" fill="url(&quot;#SvgjsPattern32607&quot;)" transform="rotate(71.89, 418.49, 672.64)"></rect>
            <path d="M969.05 60.14L980.8 65.22 978.43 77.81 990.19 82.88 987.81 95.47 999.57 100.55 997.2 113.13" stroke="rgba(255, 0, 64, 1)" stroke-width="1.36"></path>
            <path d="M1566.1999999999998 798.35 L1444.96 739.73L1443.3257728514316 831.2942271485683z" stroke="rgba(35, 187, 203, 1)" stroke-width="1" stroke-dasharray="2, 2"></path>
            <rect width="456" height="456" clip-path="url(&quot;#SvgjsClipPath32608&quot;)" x="262.79" y="590.43" fill="url(&quot;#SvgjsPattern32609&quot;)" transform="rotate(11.24, 490.79, 818.43)"></rect>
        </g>
        <defs>
            <mask id="SvgjsMask32596">
                <rect width="1920" height="1080" fill="#ffffff"></rect>
            </mask>
            <linearGradient x1="10.94%" y1="119.44%" x2="89.06%" y2="-19.44%" gradientUnits="userSpaceOnUse" id="SvgjsLinearGradient32597">
                <stop stop-color="rgba(244, 200, 119, 1)" offset="0"></stop>
                <stop stop-color="rgba(255, 255, 255, 1)" offset="0.86"></stop>
            </linearGradient>
            <pattern x="0" y="0" width="60" height="6" patternUnits="userSpaceOnUse" id="SvgjsPattern32599">
                <rect width="60" height="3" x="0" y="0" fill="rgba(169, 0, 178, 1)"></rect>
                <rect width="60" height="3" x="0" y="3" fill="rgba(0, 0, 0, 0)"></rect>
            </pattern>
            <clipPath id="SvgjsClipPath32598">
                <circle r="15" cx="1224.36" cy="102.63"></circle>
            </clipPath>
            <pattern x="0" y="0" width="6" height="6" patternUnits="userSpaceOnUse" id="SvgjsPattern32601">
                <path d="M3 1L3 5M1 3L5 3" stroke="rgba(8, 175, 129, 1)" fill="none" stroke-width="1.53"></path>
            </pattern>
            <clipPath id="SvgjsClipPath32600">
                <circle r="75" cx="1487.34" cy="143.87"></circle>
            </clipPath>
            <pattern x="0" y="0" width="9.68" height="9.68" patternUnits="userSpaceOnUse" id="SvgjsPattern32603">
                <path d="M4.84 1L4.84 8.68M1 4.84L8.68 4.84" stroke="rgba(255, 0, 64, 1)" fill="none" stroke-width="2.74"></path>
            </pattern>
            <clipPath id="SvgjsClipPath32602">
                <circle r="179.08" cx="887.86" cy="942.04"></circle>
            </clipPath>
            <pattern x="0" y="0" width="11.32" height="11.32" patternUnits="userSpaceOnUse" id="SvgjsPattern32605">
                <path d="M0 11.32L5.66 0L11.32 11.32" stroke="rgba(252, 255, 13, 1)" fill="none"></path>
            </pattern>
            <clipPath id="SvgjsClipPath32604">
                <circle r="135.84" cx="492.23" cy="53.33"></circle>
            </clipPath>
            <pattern x="0" y="0" width="192.48" height="8.02" patternUnits="userSpaceOnUse" id="SvgjsPattern32607">
                <rect width="192.48" height="4.01" x="0" y="0" fill="rgba(255, 0, 64, 1)"></rect>
                <rect width="192.48" height="4.01" x="0" y="4.01" fill="rgba(0, 0, 0, 0)"></rect>
            </pattern>
            <clipPath id="SvgjsClipPath32606">
                <circle r="48.12" cx="418.49" cy="672.64"></circle>
            </clipPath>
            <pattern x="0" y="0" width="456" height="6" patternUnits="userSpaceOnUse" id="SvgjsPattern32609">
                <rect width="456" height="3" x="0" y="0" fill="rgba(8, 175, 129, 1)"></rect>
                <rect width="456" height="3" x="0" y="3" fill="rgba(0, 0, 0, 0)"></rect>
            </pattern>
            <clipPath id="SvgjsClipPath32608">
                <circle r="114" cx="490.79" cy="818.43"></circle>
            </clipPath>
        </defs>
    </svg>
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
                        <div class="form-floating">
                            <input type="text" class="form-control mb-3" id="username" name="username" placeholder="" value="" autocomplete="off">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control mb-3" id="password" name="password" placeholder="" value="" autocomplete="off">
                            <label for="password">Password</label>
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
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        {{ $item }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            </div>
        @endif
        <footer>
        <h1 class="text-center fs-6 fst-normal">© FRVZ</h1>
    </footer>
    </div>
</body>
</html>