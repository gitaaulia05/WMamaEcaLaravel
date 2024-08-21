<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
   <div class="container">
    <div class="login form">
        <img src="{{ asset('images/logo1.png') }}" alt="logo" width="80" height="70">
        <header>Login</header>
        <form class="form" action="#">
            <div class="input-container">
                <input type="text" placeholder="Masukkan email">
                <input type="password" placeholder="Masukkan password">
            </div>
            <div class="button-container">
                <input type="button" value="Daftar" class="button">
               <a href="/register"> <input type="button" value="Masuk" class="button"></a>
            </div>
            <a href="#">Lupa password?</a>
        </form>
    </div>
   </div>
</body>
</html>
