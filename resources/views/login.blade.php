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
        <div class="alert alert-danger">
           {{ session('loginError')}}
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
           {{ session('success')}}
        </div>
    @endif

        <form class="form" method="post" action="/auth-login">
         @csrf
            <div class="input-container">
                <input type="tel" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan nomor Handphone" value="{{ old('no_hp') }}">

                  @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" value="{{ old('password') }}">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                
            </div>
            <div class="button-container">
                <a href="/register" class="button">Daftar</a>
                <button type="submit" class="button">Masuk</button>
            </div>
            <a href="#">Lupa password?</a>
        </form>
    </div>
   </div>
</body>
</html>
