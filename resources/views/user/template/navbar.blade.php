<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="csrf_token" value="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

          <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      
    <title>{{$title}}</title>

  <link href="{{ asset('css/css/home-user-local.css')}}" rel="stylesheet" />
  
       @vite('resources/css/app.css')
        @livewireStyles
         @vite(['resources/css/app.css', 'resources/js/app.js'])

             <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </head>
  <body>
     <header class="bg-white w-full font-lato fixed z-10 top-0 start-0 border-b font-serif">
       <div class="container-navbar">
          <div class="flex flex-wrap justify-between md:mx-2 ">

             <div class="head-label pb-3 my-auto py-2">
                <img src="{{asset('images/logo1-removebg-preview.png')}}" class="h-16">
             </div>

             <div class="hamburger cursor-pointer lg:hidden absolute right-4 top-6" id="hamburger-click" onclick="Menu(this)">
                    <ion-icon name="menu" size="large" id="hamburger-icon"></ion-icon>
             </div>

             <!-- layar besar -->
             <nav class="hidden lg:flex lg:w-fit md:w-full" id="navbar">
                <ul class="md:flex md:items-center bg-white w-full md:w-auto md:py-0 py-4 md:pl-0 pl-7">
                    <li class="{{ Request::is('/') ? 'bg-amber-300' : 'hover:bg-amber-300' }} py-1 lg:px-0 lg:py-0 rounded-lg"><a class="li mx-1 lg:mx-3" href="/">Beranda</a></li>
                    <li class="{{ Request::is('produk') || Request::is('barang/*') ? 'bg-amber-300' : 'hover:bg-amber-300' }}  py-1 lg:px-0 lg:py-0 rounded-lg"><a class="li mx-1 lg:mx-3" href="/produk">Produk</a></li>
                    <li class="{{ Request::is('profile') || Request::is('pesanan/*')  ||  Request::is('ubah-profile') || Request::is('cicilanKasbon/*')  ? 'bg-amber-300' : 'hover:bg-amber-300'  }}  py-1 lg:px-0 lg:py-0 rounded-lg"><a class="li mx-1 lg:mx-3" href="/profile">Profile</a></li>
                </ul>
            </nav>

            <!-- layar Kecil -->
            <nav id="mobile-menu" class="hidden lg:hidden bg-white w-full p-4">
                <ul>
                    <li class="py-2"><a href="/" class="{{ Request::is('/') ? 'bg-amber-300' : 'hover:bg-amber-300' }} hover:bg-amber-300 block p-2 rounded-lg ">Beranda</a></li>
                    <li class="py-2"><a href="/produk" class="{{ Request::is('produk') || Request::is('barang/*') ? 'bg-amber-300' : 'hover:bg-amber-300' }}  hover:bg-amber-300 block p-2 rounded-lg">Produk</a></li>
                    <li class="py-2"><a href="/profile" class="hover:bg-amber-300 block p-2 rounded-lg {{ Request::is('profile') || Request::is('pesanan/*')  ||  Request::is('ubah-profile') || Request::is('cicilanKasbon/*')  ? 'bg-amber-300' : 'hover:bg-amber-300'  }} ">Profile</a></li>
                </ul>
            </nav>

            <div class="head-right hidden justify-center lg:flex md:hidden">
                <ul class="flex pt-1 mx-auto lg:py-4">
                    @auth
                    <li class="relative text-white rounded-md lg:mx-5 mt-2">
                        <a href="/keranjang" class="flex">
                        <svg fill="#000000" version="1.1" class="h-8" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 902.86 902.86" xml:space="preserve" transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M671.504,577.829l110.485-432.609H902.86v-68H729.174L703.128,179.2L0,178.697l74.753,399.129h596.751V577.829z M685.766,247.188l-67.077,262.64H131.199L81.928,246.756L685.766,247.188z"></path> <path d="M578.418,825.641c59.961,0,108.743-48.783,108.743-108.744s-48.782-108.742-108.743-108.742H168.717 c-59.961,0-108.744,48.781-108.744,108.742s48.782,108.744,108.744,108.744c59.962,0,108.743-48.783,108.743-108.744 c0-14.4-2.821-28.152-7.927-40.742h208.069c-5.107,12.59-7.928,26.342-7.928,40.742 C469.675,776.858,518.457,825.641,578.418,825.641z M209.46,716.897c0,22.467-18.277,40.744-40.743,40.744 c-22.466,0-40.744-18.277-40.744-40.744c0-22.465,18.277-40.742,40.744-40.742C191.183,676.155,209.46,694.432,209.46,716.897z M619.162,716.897c0,22.467-18.277,40.744-40.743,40.744s-40.743-18.277-40.743-40.744c0-22.465,18.277-40.742,40.743-40.742 S619.162,694.432,619.162,716.897z"></path> </g> </g> </g>
                        </svg>
                        </a>
                        <span class="absolute -top-2 -right-2 bg-orange-400 text-white rounded-full px-2 py-1 text-xs">
                            @livewire('keranjang-counter')
                        </span>
                    </li>

                    <li> <img src="{{$gambar->img ? asset('storage/' . $gambar->img) : asset('images/img/default_img.png')}}" class="rounded-full h-10 mt-1" ></li>
                    <form method="Post" action="/logout">
                        @csrf
                        <button type="submit" class="ms-2 mt-3 mx-2 hover:bg-amber-300 py-1 px-1 rounded-lg">Logout</button>
                    </form>
                    @else
                    <li class="text-center cursor-pointer flex items-center justify-center">
    <a href="/login" class="block px-2 py-0.5 rounded-lg hover:bg-amber-300 hover:text-black">Login</a>
</li>

                    @endauth
                </ul>
            </div>
          </div>
       </div>
    </header>


    <main class="main lg:blur-none bg-white lg:opacity-100 pt-24 px-10 font-serif">
    @yield('container')
    </main>



<footer class="bg-white rounded-lg shadow m-4  bottom-0 left-0 right-0 flex flex-col">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{asset('images/logo1-removebg-preview.png')}}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 ">
                <li>
                    <a href="/" class="hover:underline me-4 md:me-6">Beranda</a>
                </li>
                <li>
                    <a href="/produk" class="hover:underline me-4 md:me-6">Produk</a>
                </li>
                <li>
                    <a href="/profile" class="hover:underline me-4 md:me-6">Profile</a>
                </li>
              
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center ">© 2024 <a href="https://flowbite.com/" class="hover:underline">Warung Mama Eca</a></span>
    </div>
</footer>



    {{-- <script src="{{asset('js/local/navbarUser.js')}}" ></script> --}}

      <script>
        function Menu(e) {
            const list = document.getElementById('mobile-menu');
            const icon = document.getElementById('hamburger-icon');

            if (list.classList.contains('hidden')) {
                list.classList.remove('hidden');
                icon.name = "close";
            } else {
                list.classList.add('hidden');
                icon.name = "menu";
            }
        }
    </script>


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    @livewireScripts
  </body>
</html>
