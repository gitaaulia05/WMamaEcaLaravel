<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="csrf_token" value="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

      @vite('resources/css/app.css')
        @livewireStyles
  </head>
  <body>



    <header class="bg-white w-full font-lato fixed z-10 top-0 start-0 border-b">
  <div class="container-navbar">
   <div class="flex flex-wrap justify-between md:mx-2 ">
            
            
            <div class="head-label pb-3 my-auto py-2">
              <img src="{{asset('images/logo1-removebg-preview.png')}}" class="h-16">
            </div>

                    <nav class="hidden w-full py-2 rounded-md lg:flex lg:w-fit md:w-full transition duration-700" id="navbar">
                        <ul class="flex flex-col text-center mx-auto my-auto rounded-md w-11/12 gap-4 pb-3 pt-3 lg:flex-row lg:pt-1 lg:bg-white cursor-pointer" > 
                            <li class=" hover:bg-amber-300 py-1 lg:px-0 lg:py-0  rounded-lg"><a class="li mx-1  lg:mx-3" href="/">Produk</a></li>
                            <li class=" hover:bg-amber-300  py-1  lg:px-0 lg:py-0  rounded-lg"><a class="li mx-1  lg:mx-3" href="/profile">Profile</a></li>
                        </ul>
                    </nav> 


            <div class="head-right hidden justify-center lg:flex md:hidden ">
                <ul class=" flex  pt-1 mx-auto lg:py-4  ">

                 @auth
                 
                    <li class="text-whiterounded-md  lg:mx-5"> <a href="/cart" class="flex">
                     <svg fill="#000000" version="1.1" class="h-8" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 902.86 902.86" xml:space="preserve" transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M671.504,577.829l110.485-432.609H902.86v-68H729.174L703.128,179.2L0,178.697l74.753,399.129h596.751V577.829z M685.766,247.188l-67.077,262.64H131.199L81.928,246.756L685.766,247.188z"></path> <path d="M578.418,825.641c59.961,0,108.743-48.783,108.743-108.744s-48.782-108.742-108.743-108.742H168.717 c-59.961,0-108.744,48.781-108.744,108.742s48.782,108.744,108.744,108.744c59.962,0,108.743-48.783,108.743-108.744 c0-14.4-2.821-28.152-7.927-40.742h208.069c-5.107,12.59-7.928,26.342-7.928,40.742 C469.675,776.858,518.457,825.641,578.418,825.641z M209.46,716.897c0,22.467-18.277,40.744-40.743,40.744 c-22.466,0-40.744-18.277-40.744-40.744c0-22.465,18.277-40.742,40.744-40.742C191.183,676.155,209.46,694.432,209.46,716.897z M619.162,716.897c0,22.467-18.277,40.744-40.743,40.744s-40.743-18.277-40.743-40.744c0-22.465,18.277-40.742,40.743-40.742 S619.162,694.432,619.162,716.897z"></path> </g> </g> </g>
                     </svg>
                    </a>
                      
                    </li>

                    <li>
                    
                       <img src="{{asset('images/img/bruce-mars.jpg')}}" class="rounded-full h-10" >
                    {{-- <svg viewBox="0 0 24 24" class="h-8" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11117)"> <path d="M21 12C21 13.8569 20.4376 15.5825 19.4739 17.0157C17.858 19.4189 15.1136 21 12 21C8.88636 21 6.14202 19.4189 4.52609 17.0157C3.56237 15.5825 3 13.8569 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#292929" stroke-width="2.5"></path> <path d="M14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" stroke="#292929" stroke-width="2.5"></path> <path d="M15 15H8.99998C7.18822 15 5.6578 16.2045 5.16583 17.8564C6.81645 19.7808 9.26583 21 12 21C14.7341 21 17.1835 19.7808 18.8341 17.8564C18.3421 16.2045 16.8117 15 15 15Z" stroke="#292929" stroke-width="2.5"></path> </g> <defs> <clipPath id="clip0_429_11117"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg> --}}
                    </li>
                     @else
                     
                     <li class=" hover:bg-amber-300  py-1 lg:mx-10  lg:px-3 lg:py-0  rounded-lg text-center mx-auto my-auto  cursor-pointer"><a href="/login">Login </a></li>

                         @endauth
                </ul>
            </div>

            <div class="hamburger transition duration-700 cursor-default lg:hidden " id="hamburger-click">
             <i class="fa-solid fa-bars fa-2x pt-2"></i>
            </div>

        </div>
        </div>     
    </header>

    <main class="main lg:blur-none bg-white lg:opacity-100 pt-24">
    
    @yield('container')
    </main>


    <script src="{{asset('js/local/navbarUser.js')}}" ></script>
   
    @livewireScripts
  </body>
</html>
