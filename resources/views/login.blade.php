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
<body>
    <div class="container-fluid bg-white">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh">
            {{-- Card --}}
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3">
                <div class="bg-body-secondary rounded mx-2 p-4 px-xl-5" style="--bs-bg-opacity: .5;">
                    <h1 class="text-center mb-4">Sign In</h1>
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
    </div>
</body>
</html>