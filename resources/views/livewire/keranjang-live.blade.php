<div >

   @if (session()->has('message'))
       <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 " role="alert">
  <div class="ms-3 text-sm font-medium">
 {{session('message')}}
  </div>
  <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8  " data-dismiss-target="#alert-3" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
    </svg>
  </button>
</div>

   @endif

      

<div class="relative overflow-x-auto  shadow-xl w-11/12 rounded-lg mx-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-11/12  mx-auto">
        <thead class="text-xs text-slate-400 uppercase bg-white border-b-[1px] border-slate-200">
            <tr>
                <th scope="col" class="px-6 py-3 ">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                   Harga
                </th>
                <th scope="col" class="px-6 py-3">
                   Jumlah Produk
                </th>
                <th scope="col" class="px-6 py-3 ">
                  Pilih
                </th>


            </tr>
        </thead>
        <tbody>

         @foreach($keranjang as $d)
         {{-- @foreach($d->keranjangDetail as $u) --}}
            <tr class="bg-white border-b-[1px] border-slate-200 dark:bg-white  ">
                <th scope="row" class="px-6 py-4 font-medium text-slate-700 whitespace-nowrap dark:text-black">
                {{$d->barang->nama_barang}}
                </th>

                <td class="px-6 py-4 text-slate-700" wire:model="hargaBarang">
                       {{$d->barang->harga_barang}}
                </td>


                <td class="px-6 py-4 text-slate-700">

                           <input wire:change="updateKuantitas({{$d->barang->id_barang}})" wire:model="kuantitas.{{$d->barang->id_barang}}" wire:key="kuantitas-{{ $d->barang->id_barang }}"  type="number" min="1"  max="{{$d->barang->stok_barang}}" oninput ="if(this.value < 1) this.value=1; if(this.value > {{$d->barang->stok_barang}}) this.value={{$d->barang->stok_barang}};" class="border-2 border-transparent focus:border-orange-500 focus:ring-0 focus:outline-none rounded-md">
                            
                </td>

              
                        <td class="px-6 py-4 text-slate-700">
                      <div class="grid grid-cols-2 gap-2">

                      <input  wire:model="checkBarang.{{$d->barang->id_barang}}" wire:click="pembelian" type="checkbox" value="{{$d->barang->id_barang}}">

                        <div class="hapus-keranjang bg-orange-500 rounded-full text-center w-fit hover:bg-orange-300">

                            {{-- <form method="POST">
                         <button  wire:click="hapusBarang({{$d->barang->id_barang}})" class="mx-5 text-white"> hapus </button>
                  </form> --}}

                   <form action="/hapusKeranjang/{{$d->barang->id_barang}}" method="POST">
        @csrf
        @method('DELETE')
         <button type="submit"class="mx-5 text-white" >Hapus</button>
        </form>
            
                         
                        </div>
                        </div>
                </td>

            </tr>

              @endforeach
        </tbody>
    </table>
</div>


    <div class="container price grid justify-items-center pt-7">
    <div class="price-content ">

    <h1 wire:model="helo"> Total Harga :
        Rp{{$harga_barangLive}}
     </h1>


            @if ($harga_barangLive >  $user->limit )
                 <button type="button" disabled wire:click="limitOut"  class="bg-orange-600  text-white py-2 px-3 rounded-md"> Lanjut Bayar</button>
                 <p class="text-red-600">Anda melebihi limit kasbon </p>
                 @else
                    <button type="button" wire:click="setSessionLive"  class="bg-orange-500 text-white py-2 px-3 rounded-md"> Lanjut Bayar</button>
                   
            @endif


    </div>
    </div>

</div>
