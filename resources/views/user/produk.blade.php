

  @extends('user.template.navbar')
@section('container')

  <div class="container list-barang px-10 py-10">

    
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($data as $b )

            @if($b->is_arsip == 0)
         
            <div class="list-barang-card bg-slate-50 shadow-sm hover:scale-105 mb-5  hover:shadow-lg transition duration-500" id="barang-list " >

                    <div class="barang-content  mx-3 my-3 ">

                <div class="barang-image">
                 <img src="{{asset('images/img/ivancik.jpg')}}" class="rounded-md">
                 </div>
                  

                 <div class="text-button-barang mt-3" id="text-button">
                 <p class="text-center mx-auto"></p>{{$b->nama_barang}}</p>

                    <div class="button-lihat-produk rounded-full mx-auto bg-orange-300 w-fit hover:bg-orange-200 " >
                        <a class="mx-2 my-1"  href="/barang/{{$b->slug}}"> {{$b->harga_barang}} </a>
                    </div>
             
                 </div>
                   </div>
                     
            </div>

            @endif

             @endforeach


      </div>


      
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($data as $b )

            @if($b->is_arsip == 0)
            <div class="list-barang-card bg-slate-50 shadow-sm hover:scale-105 mb-5  hover:shadow-lg transition duration-500" id="barang-list " >

                    <div class="barang-content  mx-3 my-3 ">

                <div class="barang-image">
               
            <figure class="relative max-w-sm transition-all duration-300 cursor-pointer ">
              <a href="#">
                <img class="rounded-lg opacity-40" src="{{asset('images/img/ivancik.jpg')}}" alt="image barang">
              </a>
              <figcaption class="absolute px-4 text-sm lg:text-lg md:text-lg text-black bottom-3 lg:bottom-32 md:bottom-32 lg:left-6 md:left-8">
                  <p > - Stok Barang Habis -</p>
              </figcaption>
            </figure>

                 </div>
                  

                 <div class="text-button-barang mt-3" id="text-button">
                 <p class="text-center"> {{$b->nama_barang}}</p>

                    <div class="button-lihat-produk rounded-full lg:mx-auto bg-orange-300 text-sm lg:w-fit hover:bg-orange-200 " >
                        <a class="mx-2 my-1 text-center"  href="/barang/{{$b->slug}}">Lihat Produk </a>
                    </div>
             
                 </div>
                   </div>
                     
            </div>
   @endif
             @endforeach

 
 
 
  @endsection