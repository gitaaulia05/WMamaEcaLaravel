<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="registration">
        <div class="regist form">
            <img src="{{ asset('images/logo1.png') }}" alt="logo" width="80" height="70">
            <header>Daftar Akun</header>
            <form class="form" action="/create-user" method="post">
                @csrf
                <div class="input-container">
                    <input type="text" name="nama" placeholder="Masukkan nama" value="{{ old('nama') }}" required>
                    <input type="text" name="alamat" placeholder="Masukkan alamat" value="{{ old('alamat') }}" required>
                    
                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan nomor handphone" maxlength="12" value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror


                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Harus Berisi Huruf dan Angka Minimal 8 Karakter" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="button-container-b">
                    <button type="submit" class="button">Daftar</button>
                    <a href="/login" class="link">Sudah punya akun? Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
