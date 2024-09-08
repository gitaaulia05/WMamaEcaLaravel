@extends('admin.template.aside')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@section('container')

    <div class="bg-danger mx-auto col-5">
   <h1>nama pembeli : {{$data->users->nama}}</h1> 
   <h1>total bayar : {{$data->total_bayar}}</h1> 

  @foreach ($data->detail_pembelian as $dp)
            <h1> nama barang : {{ $dp->namaBarang->nama_barang }}</h1>
    
       <h1> jumlah barang : {{ $dp->kuantitas}}</h1>
    @endforeach

      @foreach ($data->kasbon as $k)
            <h1>{{ $k->total_bayar }}</h1>
    
    @endforeach
    </div>



@endsection