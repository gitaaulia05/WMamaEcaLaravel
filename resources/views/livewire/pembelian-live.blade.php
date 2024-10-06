
<div>

  <form wire:submit.prevent="simpanData">
   @csrf

   <div class="lg:grid md:grid  lg:grid-cols-2  md:grid-cols-2 lg:gap 4  md:gap 4 pt-10" id="section-grid-utama">
              @foreach ($filterUser as $d )
       <div class="top-grid" id="section-dataPembeli-Metode">

         <div class="bg-white shadow-md cursor-default ">
        <p class="header pb-4 text-center">Data Pembeli</p>

         <div class="grid grid-cols-3 lg:grid-cols-4 gap-3 px-3 "  id="dataDiriPembeli">

         <div  class="Nama_pembeli"> <p>nama Pembeli </p>
          <p>
           
               {{$d->keranjang->users->nama}}
            
        
          </p>
          </div>

         <div class="Telepon_pembeli"> 
         <p>No. Telepon </p>
         <p>  {{$d->keranjang->users->no_hp}}</p>
         </div>

         <div  class="Alamat_pembeli lg:col-span-2"> 
         <p>Alamat</p>
         <p>  {{$d->keranjang->users->alamat}}</p>
         </div>

         </div>
@endforeach
      </div>

         <div class="bg-white shadow-xl mt-5 hover:scale-105 transition duration-700">
                <h1 class="mx-6">  Pilih Metode Pembayaran</h1>

            <div class = "metode_pembayaran mx-10 py-2 ">
               <input class="cursor-pointer focus:outline-none focus:ring focus:ring-orange-300  focus:rounded w-11/12" name="id_kasbon" value="Kasbon"   readonly> 
               </div>
      </div>

        </div>


      <div class="bg-white mt-5 pb-2 mb-5 lg:mx-5 md:mx-5 lg:mt-0 md:mt-0  shadow-lg hover:scale-105 transition duration-700 cursor-pointer" id="section-detail-pembayaran">

      <h1 class="judul  mx-10 pt-5"> Detail Pembayaran Produk</h1>
     
      
             <div class="grid grid-cols-2  border-2 rounded-lg m-3  lg:mx-10  lg:m-3  " id="detailPembayaran-Content">
                        <div class="nama_produk mx-6 my-2">
                        <p class="pb-3">Nama Produk</p>
                         @foreach ($filterUser as $d )
                          <p>  {{$d->barang->nama_barang}}</p>
                            <p class="mb-5">Harga Produk </p>
                  @endforeach
                        </div>

                        <div class="Jumlah_produk">
                        <p class="mt-2 pb-3">Jumlah Produk</p>
                         @foreach ($filterUser as $d )
                          {{-- <p>  {{$d->kuantitas}} </p> --}}
                          <input wire:model="kuantitas" value=" {{$d->kuantitas}}">
                            
                            <p class="mb-5">{{$d->barang->harga_barang}} </p>
                           @endforeach
                        </div>


                    
               </div>

          <h1 class="mx-10 mb-4"> Total : Rp. {{$hargaBarang}}
          </h1>
        <div class="py-2 mx-auto bg-orange-400 hover:bg-orange-300 w-fit">

       
        <button type="submit" class="mx-10 w-40 lg:w-80 ">Bayar</button>
        </div>
      </div>


   </div>
   </form>

  

</div>
