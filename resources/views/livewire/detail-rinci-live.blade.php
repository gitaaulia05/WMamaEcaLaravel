        <div>
            <div class="input-group ms-5 mt-4 w-40">
              <span class="input-group-text text-body">
                <i class="fas fa-search" aria-hidden="true"></i>
              </span>
              <input type="text" class="form-control" wire:model.live="search"  placeholder="Cari Cicilan Ke">
            </div>

      @foreach ($data->detKasbon as $d )
         <div class="col-md-7 mt-4 ms-5">
          <div class="card">
            <div class="card-header pb-0 px-3" style="border-bottom: none; background-color: white;">
              <h6 class="mb-0">Cicilan Kasbon</h6>
            </div>

            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex justify-content-between align-items-start" style="width: 100%;">

                  <div class="d-flex flex-column">
                    <h6 class="mb-3">
                        <span class="d-inline-block p-2 border rounded custom-label">Cicilan Ke-{{$d->cicilan_ke}}</span>
                    </h6>
                    <span class="mb-2 text-s">Nama Pembeli: <span class="text-dark font-weight-bold ms-sm-2">{{$data->pembelian->users->nama}}</span></span>

                    <span class="mb-2 text-s">Detail Barang :

                    <span class="text-dark ms-sm-2 font-weight-bold">
                       {{ $pembelian->detail_pembelian->pluck('namaBarang.nama_barang')->implode(', ') }}
                           </span>
                    </span>

                    <span class="text-s">Total Bayar:
                    <span class="text-dark ms-sm-2 font-weight-bold">{{$d->total_bayar}}</span>
                  </div>

                  <div class="d-flex flex-column align-items-end" style="margin-right: 10px; margin-top: 5px;">
                    <span class="d-inline-block p-2 border rounded custom-label-b">{{$d->created_at}}</span>
                        <div class="mt-7">
                        @if($d->is_lunas == 1)
                        <h6 class="d-inline-block p-2 border rounded custom-label-b">Lunas</h6>
                        @else
                        <h6 class="d-inline-block p-2 border rounded custom-label-b">Belum lunas</h6>
                        @endif
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

    @endforeach
    <div class="button-dashboard d-flex justify-content-end align-items-center" style="padding-right: 90px; padding-top: 300px;">

</div>

</div>
