  @extends('admin.template.aside')
@section('container')
    <div class="px-6 py-5">

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('storage/barang/'.$barang->img)}}" class="img-fluid rounded-start my-4 mx-2" alt="Gambar-Produk">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title capitalize">{{$barang->nama_barang}}</h5>
        <p class="card-text">Rp. {{$barang->harga_barang}}</p>
        <p class="card-text">Deksripsi </p>
        <p class="card-text">{{$barang->deks_barang}} </p>

        <p class="card-text ">{{$barang->created_at}}</p>

        <div class="row">
        <div class="col-6 col-lg-6"><a href="/editBarang/{{$barang->slug}}" type="button" class="btn btn-warning">Ubah Data Barang</a></div>
        <div class="col-6 col-lg-6"><button type="button" class="btn btn-danger">Hapus Barang</button></div>

        </div>
        

      </div>
    </div>
  </div>
</div>

</div>
@endsection