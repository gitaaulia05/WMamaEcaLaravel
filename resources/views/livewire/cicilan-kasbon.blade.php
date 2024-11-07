        <div class="font-serif">
    <div class="flex items-center ml-16 mt-4 w-80 mb-10 bg-white shadow-md rounded-lg">
        <span class="px-3 text-gray-500"><i class="fas fa-search" aria-hidden="true"></i></span>
        <input type="text" class="w-full py-2 px-3 focus:outline-none focus:ring focus:ring-orange-300 rounded-r-lg" wire:model.live="search" placeholder="Cari Nama Barang ...">
    </div>

      @if($data->detKasbon->isEmpty())
       <div class="w-fit bg-red-400 mx-auto">
        <h1 class="mx-6 py-5">Anda belum Membuat Cicilan Buat</h1>
       </div>
    @else
      @foreach ($data->detKasbon as $d )

<div class="col-md-7 mt-4 ms-5 lg:w-1/3">
  <div class="card">


    <div class="card-body pt-4 p-3">
      <ul class="list-group">
        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
          <div class="d-flex justify-content-between align-items-start" style="width: 100%;">

            <div class="d-flex flex-column">
                <div class=" grid grid-cols-2">
                    <h6 class="mb-3 pt-2">
                    <span class="d-inline-block p-2 border rounded-lg  bg-orange-300 custom-label">Cicilan Ke-{{$d->cicilan_ke}}</span>
              </h6>


                    <span class="d-inline-block p-2  custom-label-b text-end">{{$d->created_at->format('Y-m-d')}}</span>
    </div>

                <div class="ms-2 ">
              <span class="mb-2 text-s">Detail Barang:
                <span class="text-dark ms-sm-2 font-weight-bold">
                  {{ $pembelian->detail_pembelian->pluck('namaBarang.nama_barang')->implode(', ') }}
                </span>
              </span>
                    <div class="pt-1">
                    <span class="mb-2 text-s ">Total Bayar:
                    <span class="text-dark ms-sm-2 font-weight-bold">{{$d->total_bayar}}</span>
                    </div>
    </div>


            </div>

            <div class="grid justify-items-end" style="margin-right: 10px; margin-top: 5px;">

              <div class="mt-7 ">
                @if($d->is_lunas == 1)
                  <h6 class="d-inline-block p-2 border rounded custom-label-b">Lunas</h6>
                @else
                  <h6 class="d-inline-block p-2 border rounded custom-label-b">Belum lunas</h6>
                @endif
              </div>
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

  @endif
</div>
