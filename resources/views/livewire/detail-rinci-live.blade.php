<div>

                    <div class="input-group ms-4 mt-4 w-20 ">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" wire:model.live="search"  placeholder="Cari ID Detail Kasbon di sini...">
            </div>
           
            @if ($data)
@foreach ($data->detKasbon as $d)

    <div class="col-md-7 mt-4 ms-5">
          <div class="card">
            <div class="card-header pb-0 px-3" style="border-bottom: none; background-color: white;">
              <h6 class="mb-0">Cicilan Kasbon</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-m">Cicilan Ke-{{$d->cicilan_ke}}</h6>
                     @if($d->is_lunas == 1)
                        <h6 class="mb-3 text-m">Lunas</h6>
                     @else
                        <h6 class="mb-3 text-m">Belum lunas</h6>
                     @endif
                 

                    <span class="mb-2 text-s">Nama Pembeli: <span class="text-dark font-weight-bold ms-sm-2">{{$data->pembelian->users->nama}}</span></span>


			@foreach ($pembelian->detail_pembelian as $detail)
                    <span class="mb-2 text-s">Nama Barang: <span class="text-dark ms-sm-2 font-weight-bold">{{$detail->namaBarang->nama_barang}}</span></span>
			@endforeach
                    <span class="text-s">Total Bayar: <span class="text-dark ms-sm-2 font-weight-bold">{{$d->total_bayar}}</span></span>
		    <span class="text-s">Tanggal Bayar: <span class="text-dark ms-sm-2 font-weight-bold">{{$d->created_at}}</span></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

    @endforeach
          @endif
    <div class="button-dashboard d-flex justify-content-end align-items-center" style="padding-right: 90px; padding-top: 300px;">

</div>

</div>
