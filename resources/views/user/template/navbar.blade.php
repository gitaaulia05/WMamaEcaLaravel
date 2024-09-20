<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="csrf_token" value="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>
   {{$title}}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->

  <link href="{{ asset('css/css/nucleo-icons.css')}}" rel="stylesheet" />

    <link href="{{ asset('css/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('css/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- CSS Files -->

      <link  id="pagestyle" href="{{ asset('css/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">

      {{-- @vite('resources/css/app.css') --}}
        @livewireStyles
  </head>
  <body>

    <main>
      {{-- <nav class="navbar-user">
        <div class="flex justify-around lg:justify-around">

          <div class="icon ">
            <h1 class="text-sm"> ini icon  </h1>
          </div>

          <div class="menu-user hidden lg:block">
            <a href="/home" class="text-sm"> Produk </a>
          </div>

          <div class="Cart hidden lg:block ">
          <img width="50" height="50" src="https://img.icons8.com/ios/50/shopping-cart--v1.png" alt="shopping-cart--v1"/>
          </div>
          <div class="profile hidden lg:block ">
             <a href="/profile">profile</a>
          </div>

        <div class="hamburger lg:hidden">
        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>


        </div>

        </div>
      </nav> --}}

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{asset('images/logo1-removebg-preview.png')}}" alt="Bootstrap" width="52" height="52">
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mt-2 mb-lg-0">

        <li class="nav-item ">
          <a class="nav-link active fs-6 ms-5" aria-current="page" href="#">Produk</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fs-6 ms-8" href="/pesanan">Profile</a>
        </li>

        <li class="nav-item ms-auto">
          <a class="nav-link fs-6 ms-8" href="#">logo keranjang</a>
        </li>

        <li class="nav-item dropdown">
           @auth

            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              logo profile
          </a>
          <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="#">Hallo {{ auth()->user() ? auth()->user()->nama : 'Guest' }}</a></li>

              <div class="container-fluid">
          <form class="d-flex" method="POST" action="/logout" >
        @csrf
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </form>
        </div>

          </ul>
        </li>

        </li>

          <form class="d-flex" method="POST" action="/logout" >
        @csrf
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </form>

              @else
                <li class="nav-item text-end">
                  <a href="/login" class="nav-link">LOGIN </a>
                  </li>
          @endauth



    </div>
  </div>
</nav>

              @yield('container')
    </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    @livewireScripts
  </body>
</html>
