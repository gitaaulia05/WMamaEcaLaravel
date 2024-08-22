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
        
       {{-- INI BENERIN POSISI TAMPILAN ERROR NYA  --}}
    @if(session()->has('loginError'))
           <h1>{{ session('loginError')}}</h1>
    @endif
    @if(session()->has('success'))
           <h1>{{ session('success')}}</h1>
    @endif

        <form class="form" method="post" action="/auth-login">
         @csrf
            <div class="input-container">
                <input type="number" name="no_hp" placeholder="Masukkan nomor Handphone" >
                <input type="password" name="password" placeholder="Masukkan password">
            </div>
            <div class="button-container">
                <a href="/register">Daftar</a>
               <button type="submit" > Masuk </button>
            </div>
            <a href="#">Lupa password?</a>
        </form>
    </div>
   </div>
</body>
</html>
