<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action='' method="POST">
        @if($errors->any())         
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @endif
        @csrf
        <label for="Nama">Nama</label>
        <input type="text" value="{{ @old('Nama') }}" name="Nama" id="Nama"><br>

        <label for="Password">Password</label>
        <input type="text" value="{{ @old('Password') }}" name="Password" id="Password"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>