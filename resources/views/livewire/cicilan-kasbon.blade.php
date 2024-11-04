        <div class="font-serif">
            <div class="input-group ms-5 mt-4 w-40 pb-5 ">
              <span class="input-group-text text-body">
                <i class="fas fa-search" aria-hidden="true"></i>
              </span>
              <input type="text" class="form-control" wire:model.live="search"  placeholder="Cari Cicilan Ke">
            </div>

      @foreach ($data->detKasbon as $d )


        <div class="mx-auto bg-slate-50 w-10/12">

              <div class="grid grid-cols-2">

                <div class="Button-cicilanKe">
                <button class="rounded-md bg-orange-400 text-white">Cicilan Ke - {{$d->cicilan_ke}}</button>
                </div>

                  <div class="Button-tanggal flex justify-end">
                <button class=""> {{$d->created_at->format("Y-m-d")}}</button>
                </div>
                </div>


            <div>
              <span class="mb-2 text-s">Detail Barang :
                   
                    <span class="text-dark ms-sm-2 font-weight-bold">
                       {{ $pembelian->detail_pembelian->pluck('namaBarang.nama_barang')->implode(', ') }}
                           </span>
                    </span>
            </div>

           <div> Jumlah Bayar : {{$d->total_bayar}}
           </div>
        </div>
 @if($d->is_lunas == 1)
                        <h6 class="d-inline-block p-2 border rounded custom-label-b">Lunas</h6>
                        @else
                        <h6 class="d-inline-block p-2 border rounded custom-label-b">Belum lunas</h6>
                        @endif

    @endforeach
    <div class="button-dashboard d-flex justify-content-end align-items-center" style="padding-right: 90px; padding-top: 300px;">

</div>

</div>
