  @extends('admin.template.aside')
@section('container')
    <div class="px-6 py-5">

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('storage/'.$barang->img)}}" class="img-fluid rounded-start my-4 mx-2" alt="Gambar-Produk">
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
        <div class="col-6 col-lg-6">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Hapus Barang
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">HAPUS BARANG</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-uppercase fs-6">
        Apa Anda Yakin Menghapus Barang {{$barang->nama_barang}}
      </div>
      <div class="modal-footer">
        <div class="row">

        <div class="col-6 col-lg-6">  
        <form action="/hapusBarang/{{$barang->slug}}" method="POST">
        @csrf
        @method('DELETE')
         <button type="submit" class="btn btn-secondary" >YA</button>
        </form>
        </div>

        <div class="col-6 col-lg-6">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">TIDAK</button>
        </div>

        </div>

      </div>
    </div>
  </div>
</div>
        </div>

        </div>
        

      </div>
    </div>
  </div>
</div>

</div>
@endsection