<div>
   

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
                <th scope="col" class="px-6 py-3">
                  Pilih
                </th>
              
              
            </tr>
        </thead>
        <tbody>
         @foreach($keranjang as $d)
            <tr class="bg-white border-b-[1px] border-slate-200 dark:bg-white  ">
                <th scope="row" class="px-6 py-4 font-medium text-slate-700 whitespace-nowrap dark:text-black">
                {{$d->barang->nama_barang}}
                </th>
           
                <td class="px-6 py-4 text-slate-700" wire:model="hargaBarang">
                       {{$d->barang->harga_barang}}
                </td>
                <td class="px-6 py-4 text-slate-700 ">
                    {{$d->count}}
                </td>

                        <td class="px-6 py-4 text-slate-700">
                      <div class="grid grid-cols-2 gap-2">
                      <input wire:model="checkBarang" type="checkbox">
                        <div class="hapus-keranjang bg-orange-500 rounded-full text-center w-fit hover:bg-orange-300">
                         <button type="submit" class="mx-5 text-white"> hapus </button>
                        </div>

                        </div>
                </td>

            </tr>

              @endforeach
        </tbody>
    </table>
</div>

    <div class="container price bg-black">
    <div class="price-content fixed bottom-0 left-0 right-0">
    <h1> total Harga : </h1>
    <button button="submit" class="bg-orange-500"> Lanjut Bayar</button>
    </div>
    </div>

</div>
