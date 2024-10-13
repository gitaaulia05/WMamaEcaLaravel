<div>

   @if (session()->has('message'))
       <h1>{{session('message')}}</h1>
   @endif


<div class="relative overflow-x-auto  shadow-xl w-11/12 rounded-lg mx-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-11/12  mx-auto">
        <thead class="text-xs text-slate-400 uppercase bg-white border-b-[1px] border-slate-200">
            <tr>
                <th scope="col" class="px-6 py-3">
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

               {{-- {{$d->keranjang->id_user}} --}}

                <td class="px-6 py-4 text-slate-700">

                           <input wire:change="updateKuantitas({{$d->barang->id_barang}})" wire:model="kuantitas.{{$d->barang->id_barang}}" wire:key="kuantitas"  type="number" min="1"  max="{{$d->barang->stok_barang}}" oninput ="if(this.value < 1) this.value=1; if(this.value > {{$d->barang->stok_barang}}) this.value={{$d->barang->stok_barang}};" class="border-2 border-transparent focus:border-orange-500 focus:ring-0 focus:outline-none rounded-md">
                </td>
                        <td class="px-6 py-4 text-slate-700">
                      <div class="grid grid-cols-2 gap-2">

                      <input  wire:model="checkBarang.{{$d->barang->id_barang}}" wire:click="pembelian" type="checkbox">

                        <div class="hapus-keranjang bg-orange-500 rounded-full text-center w-fit hover:bg-orange-300">

                         <button  wire:click="hapusBarang({{$d->barang->id_barang}})" class="mx-5 text-white"> hapus </button>


                        </div>
                        </div>
                </td>

            </tr>



              {{-- @endforeach --}}
              @endforeach
        </tbody>
    </table>
</div>


    <div class="container price bg-black">
    <div class="price-content fixed bottom-0 left-0 right-0 flex flex-col items-center justify-center p-4">

    <h1 wire:model="helo"> Total Harga :
        Rp{{$harga_barang}}
     </h1>


            @if ($harga_barang >  $user->limit )
                 <button type="button" disabled wire:click="test"  class="bg-orange-600"> Lanjut Bayar</button>
                 <p>Anda melebihi limit kasbon </p>
                 @else
                    <button type="button" wire:click="pembelianPass"  class="bg-orange-500 text-white py-2 px-3 rounded-md"> Lanjut Bayar</button>
            @endif


    </div>
    </div>

</div>
