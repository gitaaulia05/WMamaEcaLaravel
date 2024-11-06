<div>

    <div class="button-dashboard row">


          <div class="input-group  w-30 pb-5 col-4">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" wire:model.live="search"  placeholder="Cari Nama Barang">
            </div>

                 <div class="col-3">
              <input for="stokBarang" wire:model="stokBarang" wire:click="toggleStokBarang" type="checkbox" >
              <label for="stokBarang">Stok Barang Habis</label>
        </div>
                 <div class="col-2">
          <a href="/tambah-data" class="btn btn-orange" style="background-color: #ff8367; color: #ffffff; border: none;">Tambah Data</a>
        </div>

        <div class="col-3">
          <a href="/export" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Export Data</a>
        </div>


</div>



            @if (session()->has('message-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message-success')}}
    <button type="button" class="btn-close " data-bs-dismiss="alert" ><i class="fa-regular fa-circle-xmark"></i></button>
  </div>
            @endif

                      @if (session()->has('message-error'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message-error')}}
    <button type="button" class="btn-close " data-bs-dismiss="alert" ><i class="fa-regular fa-circle-xmark"></i></button>
  </div>
          @endif

      <div class="row">
        @foreach ($barang as $b)
        <div class="col-2 col-lg-3 w-25" >
          <div class="card mb-4" >
              @if($b->is_arsip == 0)
        <img src="{{ asset('storage/'.$b->img) }}" class="card-img-top w-100 uniform-image" alt="Gambar Produk">
        @else
          <img src="{{ asset('storage/'.$b->img) }}" class="card-img-top opacity-75 position-relative uniform-image" alt="Gambar Produk">
          <div class="position-absolute top-50 start-50 translate-middle">

      <p class="card-text my-lg-7 mx-lg-2">- BARANG HABIS -</p>

    </div>
        @endif
        <div class="card-body text-center">
          <h5 class="card-title capitalize">{{$b->nama_barang}}</h5>
          <p class="card-text">{{$b->harga_barang}}</p>
          <a href="detailBarang/{{$b->slug}}" class="btn btn-primary">Detail Barang</a>
        </div>
      </div>
              </div>
            @endforeach
  </div>


  {{$barang->links()}}

</div>
