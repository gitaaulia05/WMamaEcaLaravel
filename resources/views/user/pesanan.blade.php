@extends('user.template.navbar')

    @section('container')

  <a href="/profile" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Kembali </a>
  
      @foreach ($data as $d)
              <div class="container  kartu-pesanan">
                        <div class="card col-lg-6">
        <h5 class="card-header">Detail Pesanan</h5>
        <div class="card-body ">
                <div class="row">

                 <div class="col-md-9 col-9 col-lg-6 nama-gambar">

        <div class="row">

           <div class="col-4 ">
                <img src="{{asset('images/img/curved-images/white-curved.jpeg')}}" width="50px" alt="gambar">
                </div>

                <div class="col-7">
                @foreach($d->detail_pembelian as $dd)
           <h5 class="card-title pb-5">Nama Produk :
          {{$dd->namaBarang->nama_barang}}
         </h5>
         @endforeach
         </div>

        </div> {{--ini punya row nama-gambar didalam clol-6 --}}
                 

                 </div>  {{--ini punya col nama-gambar --}}

    
                <div class=" col-3 col-md-3  col-lg-6">
                @foreach($d->detail_pembelian as $k)
        <h5 class="card-title  text-muted pt-1">kuantitas : 
        {{$k->kuantitas}}x</h5>

           <h5 class="pb-4">harga : {{$k->harga_perProduk}} </h5>

        @endforeach
</div>
</div>
        <p class="card-text"> Tanggal Pemesanan : {{$d->created_at->format('d-m-Y, H:i')}} </p>
      
        </div>
        </div>
                </div>
           @endforeach


    @endsection