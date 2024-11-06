@extends('admin.template.aside')

@section('container')

<div class="container-fluid py-4">

       <h1> nama barang : {{ $data->slug }}</h1>
       <h1> harga barang :  {{ $data->harga_barang }}</h1>
       <h1> jumlah barang :  {{ $data->stok_barang }}</h1>
       <h1> deskripsi  :  {{ $data->deks_barang }} </h1>
       <h1> tanggal input  :  {{ $data->created_at }} </h1>

</div>


@endsection