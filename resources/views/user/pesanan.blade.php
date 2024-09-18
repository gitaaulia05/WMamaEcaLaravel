@extends('user.template.navbar')

    @section('container')
      @foreach ($data as $d)
              @foreach ($d->detail_pembelian as $dp)
              <div class="flex justify-center items-center min-h-screen">
              <div class="card shadow-lg w-45 flex flex-row items-center p-4 ms-8">

              <div class="w-1/3">
                <img src="{{asset('images/img/team-2.jpg')}}" class="avatar avatar-sm me-3" alt="user1" style="width: 100%; height: auto;">
              </div>

              <div class="w-2/3 pl-4">
                <h1 class="text-lg">Nama Produk: {{ $dp->namaBarang->nama_barang}}</h1>
                <h1 class="text-lg">Kuantitas: {{$dp->kuantitas}}</h1>
                <h1 class="text-lg">Harga: {{$dp->harga_perProduk}} </h1>
                <h1 class="text-lg">Tanggal Pesanan:{{$dp->created_at->format(' d-m-Y  h:i')}}</h1>
              </div>
          </div>
      </div>

           @endforeach
           @endforeach

           <div class="flex flex-col justify-end items-center min-h-screen p-4 ms-12">
                <div class="button-dashboard" >
                    <a href="/profile" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Kembali </a>
                </div>
           </div>
    @endsection
