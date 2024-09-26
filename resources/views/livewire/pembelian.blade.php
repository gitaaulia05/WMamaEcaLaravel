
<div>
      @foreach ($data as $d )
         {{$d->id_barang}}
         {{$d->barang->harga_barang}}
      @endforeach
   <h1>hello</h1>

      
   <div class="lg:grid md:grid  lg:grid-cols-2  md:grid-cols-2 lg:gap 4  md:gap 4 " id="section-grid-utama">

       <div class="" id="section-dataPembeli-Metode">

         <div class="bg-red-300">

         
        <p class="header pb-4">Data Pembeli</p>

         <div class="grid grid-cols-3 gap-3" id="dataDiriPembeli">

         <div  class="Nama_pembeli"> <p>nama Pembeli </p>
          <p>

         {{$d->keranjang->users->nama}}
          </p>
          </div>

         <div class="Telepon_pembeli"> 
         <p>No. Telepon </p>
         <p>  {{$d->keranjang->users->no_hp}}</p>
         </div>

         <div  class="Alamat_pembeli"> 
         <p>Alamat</p>
         <p>  {{$d->keranjang->users->alamat}}</p>
         </div>

         </div>

      </div>

         <div class="bg-orange-400 mt-5">
                  Pilih Metode Pembayaran
              
      </div>

        </div>


      <div class="bg-red-700 mt-5 pb-2 lg:mx-5 md:mx-5 lg:mt-0 md:mt-0 text-center" id="section-detail-pembayaran">

      <h1 class="judul mt-3"> Detail Pembayaran Produk</h1>
     
             <div class="grid grid-cols-2  border-2 m-3  lg:mx-10  lg:m-3  " id="detailPembayaran-Content">
                        <div class="nama_produk">
                        <p>Nama Produk</p>
                         @foreach ($data as $d )
                          <p>  {{$d->barang->nama_barang}}</p>
                            <p class="mb-5">Harga Produk </p>
                  @endforeach
                        </div>

                        <div class="Jumlah_produk">
                        <p>Jumlah Produk</p>
                         @foreach ($data as $d )
                          <p>  {{$d->kuantitas}} </p>
                            
                            <p class="mb-5">{{$d->barang->harga_barang}} </p>
                           @endforeach
                        </div>


                    
               </div>
      </div>

   </div>

</div>
