        <div class="font-serif">
    <div class="flex items-center ml-16 mt-4 w-80 mb-10 bg-white shadow-md rounded-lg">
        <span class="px-3 text-gray-500"><i class="fas fa-search" aria-hidden="true"></i></span>
        <input type="text" class="w-full py-2 px-3 focus:outline-none focus:ring focus:ring-orange-300 rounded-r-lg" wire:model.live="search" placeholder="Cari Nama Barang ...">
    </div>

      @if($data === null)
        <h1>Anda belum Membuat Cicilan</h1>
    @else
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


  @endif
</div>
