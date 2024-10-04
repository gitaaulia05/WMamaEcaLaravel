<div >

       <div class="flex items-center ml-16 mt-4 w-80 mb-10 bg-white shadow-md rounded-lg">

              <span class="px-3 text-gray-500"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="w-full py-2 px-3 focus:outline-none focus:ring focus:ring-orange-300 rounded-r-lg" wire:model.live="search"  placeholder="Cari Nama Barang ...">
            </div>


      <div class="container pt-5  ">

<div class="relative overflow-x-auto  shadow-xl w-11/12 rounded-lg mx-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-11/12  mx-auto">
        <thead class="text-xs text-slate-400 uppercase bg-white border-b-[1px] border-slate-200">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                   Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>

            </tr>
        </thead>
        <tbody>
         @foreach($data as $d)
            <tr class="bg-white border-b-[1px] border-slate-200 dark:bg-white  ">
                <th scope="row" class="px-6 py-4 font-medium text-slate-700 whitespace-nowrap dark:text-black">
                  <div class="d-flex px-2 py-1">
                            <img src="{{asset('images/img/team-2.jpg')}}" class=" h-11 rounded-md" alt="user1">

                </th>
                <td class="px-6 py-4 text-slate-700">

                       {{$d->detail_pembelian->pluck('namaBarang.nama_barang')->implode(', ')}}

                </td>
                <td class="px-6 py-4 text-slate-700 ">
                     <a href="/pesanan/{{$d->slug}}" class="bg-orange-400 text-white rounded-md">
                     <span class="px-4 py-5 my-5 text-center">
                         Detail
                     </span>

                        </a>
                </td>
            </tr>

              @endforeach
        </tbody>
    </table>
</div>

     </div>


</div>
