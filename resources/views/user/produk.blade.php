

  @extends('user.template.navbar')
@section('container')

  <div class="container list-barang px-10 py-10">

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            @foreach ($data as $b )
            <div class="list-barang-card bg-slate-50 shadow-sm hover:scale-105 mb-5  hover:shadow-lg transition duration-500" id="barang-list " >

                    <div class="barang-content  mx-3 my-3 ">

                <div class="barang-image">
                 <img src="{{asset('images/img/ivancik.jpg')}}" class="rounded-md">
                 </div>
                  

                 <div class="text-button-barang mt-3" id="text-button">
                 <p class="text-center">Nama Produk : {{$b->nama_barang}}</p>

                    <div class="button-lihat-produk rounded-full mx-auto bg-orange-300 w-fit hover:bg-orange-200 " >
                        <a class="mx-2 my-1  "  href="/barang/{{$b->slug}}">Lihat Produk </a>
                    </div>
             
                 </div>
                   </div>
                   
            </div>
               @endforeach


      </div>

 
 
 
  @endsection