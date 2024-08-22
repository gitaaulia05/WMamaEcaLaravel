<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="registration">
        <div class="regist form">
            <img src="{{ asset('images/logo1.png') }}" alt="logo" width="80" height="70">
            <header>Daftar Akun</header>
            <form class="form" action="/create-user" method="post">
                @csrf
                <div class="input-container">

                         {{-- INI PUNYA AKU (GITA) YANG DIBENERIN YANG INI  --}}
                    <input type="text" name="nama" placeholder="Masukkan nama" value={{old('nama')}}>
                    <input type="textarea" name="alamat" placeholder="Masukkan alamat" value={{old('alamat')}}>
                    <input type="number" name="no_hp"  class="form-control @error('no_hp') is-invalid  @enderror"  placeholder="Masukkan nomor handphone" maxlength="12">

                         {{-- INI BENERIN POSISI TAMPILAN ERROR NYA  --}}
                      @error('no_hp')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror

                    <input type="password" name="password"  class="form-control @error('password') is-invalid  @enderror" placeholder="Masukkan password" min>
           {{-- INI BENERIN POSISI TAMPILAN ERROR NYA  --}}
                     @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="button-container-b">
                  <button type="submit">Daftar</button>
                    <a href="/login" type="button">sudah punya akun? login</a>
                {{-- PUNYA GITA SAMPE SINI REGISTER YANG DIBENERIN --}}

                
                                  {{-- PUNYA SOFI YANG INI  --}}
                    {{-- <input type="text" placeholder="Masukkan nama">
                    <input type="text" placeholder="Masukkan no hp">
                    <input type="password" placeholder="Masukkan password">
                </div>
                <div class="button-container-b">
                    <input type="button" value="Daftar" class="button"> --}}
    {{-- SAMPE SINI PUNYA SOFI --}}
                </div>
                <a href="/login">Sudah punya akun? login</a>
            </form>
        </div>
       </div>
</body>
</html>
