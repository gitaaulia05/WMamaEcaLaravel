<div>
  
            <div class="input-group ms-4 w-40 pb-5">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" wire:model.live="search"  placeholder="Cari Nama Barang">
            </div>

      <div class="row">
        @foreach ($barang as $b)
        <div class="col-2 col-lg-3">
          <div class="card mb-4" >
        <img src="{{ asset('storage/barang/'.$b->img) }}" class="card-img-top" alt="Gambar Produk">
        <div class="card-body">
          <h5 class="card-title capitalize">{{$b->nama_barang}}</h5>
          <p class="card-text">{{$b->harga_barang}}</p>
          <a href="detailBarang/{{$b->slug}}" class="btn btn-primary">Detail Barang</a>
        </div>
      </div>
              </div>
            @endforeach
  </div>

  

 
</div>
