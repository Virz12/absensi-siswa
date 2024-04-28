<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('css/styleBase.css') }}">
<link rel="stylesheet" href="{{ asset('css/styleLogin.css')}}">

<script src="https://kit.fontawesome.com/a1fe272ba9.js" crossorigin="anonymous"></script>
<link rel="icon" href="{{ asset('image/favicon-16x16.png') }}" type="image/x-icon" ?v={{ time() }}>
<title>Login</title>
</head>
<body>
    @include('sweetalert::alert')
    <div class="header">
        <div class="container">
            <img src="{{ asset('image/brand.png') }}" alt="Logo">
            <h1>ABSEN KEHADIRAN PKL</h1>
        </div>
    </div>
    <main>
        <div class="contlog">
            <h1>Login</h1>
        <form method="POST" action="">
            @csrf
            <div>
                <label for="Nama">Nama :</label>
                <input type="text" value="{{ @old('Nama') }}" id="Nama" name="Nama" autocomplete="off">
                @error('Nama')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="Password">Password :</label>
                <input type="password" value="{{ @old('') }}" id="Password" name="Password" autocomplete="off">
                @error('Password')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" id="Login">Login</button>
        </form>
        </div>
    </main>
    <footer>
        <span>Copyright © FRVZ SMKN 2 BANDUNG 2024</span>
    </footer>
</body>
</html>