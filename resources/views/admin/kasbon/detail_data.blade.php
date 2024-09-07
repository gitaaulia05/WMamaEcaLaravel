@extends('admin.template.aside')

{{-- //  INI HAPUS AJA LINK BOOTSTRAP NYA CUMAN BUAT TEST AJA --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@section('container')
    @foreach ($data->detKasbon as $d)
          <div class="bg-danger mx-auto col-5">
    <h1>cicilan ke {{$d->cicilan_ke}}</h1>
     @if ($user)
         <h1> nama pembeli : {{$user->nama}}</h1>
     @endif
              @foreach ($pembelian->detail_pembelian as $detail)
         <h1>Nama Barang : {{$detail->namaBarang->nama_barang}}</h1>
     @endforeach
        <h1>total bayar : {{$d->total_bayar}}</h1>
        <h1>tanggal Bayar : {{$d->created_at}}</h1>
</div>
    @endforeach

    <a href="/tambah-data-kasbon/{{$data->slug}}">Tambah data</a>
@endsection