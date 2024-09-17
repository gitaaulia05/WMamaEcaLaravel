@extends('user.template.navbar')

    @section('container')
      @foreach ($data as $d)
              @foreach ($d->detail_pembelian as $dp)

        <div class="card shadow-lg w-64">
                <img src="{{asset('images/img/team-2.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                <h1>Nama Produk : {{ $dp->namaBarang->nama_barang}}</h1>
                <h1>Kuantitas : {{$dp->kuantitas}}</h1>
                <h1>Harga : {{$dp->harga_perProduk}} </h1>
                <h1>Tanggal Pesanan  :{{$dp->created_at->format(' d-m-Y  h:i')}}</h1>
        </div>

           @endforeach
           @endforeach

           <a href="/profile">Kembali </a>
    @endsection