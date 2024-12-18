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

       <form class="form" action="{{ route('auth_login') }}" method="POST">
         @csrf
            <div class="input-container">
                <input type="no_hp" name="no_hp" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan nomor Handphone" value="{{ old('email') }}" maxlength="100" required>

                  @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" value="{{ old('password') }}" required>
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
