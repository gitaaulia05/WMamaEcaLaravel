
<div>
    <div class="flex items-center ml-16 mt-4 w-80 mb-10 bg-white shadow-md rounded-lg">
        <span class="px-3 text-gray-500"><i class="fas fa-search" aria-hidden="true"></i></span>
        <input type="text" class="w-full py-2 px-3 focus:outline-none focus:ring focus:ring-orange-300 rounded-r-lg" wire:model.live="search" placeholder="Cari Nama Barang ...">
    </div>

    <div class="container pt-5">
        <div class="relative overflow-x-auto shadow-xl w-11/12 rounded-lg mx-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-11/12 mx-auto">
                <thead class="text-xs text-slate-400 uppercase bg-white border-b-[1px] border-slate-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">Gambar</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center py-4">No products found</td>
                        </tr>
                    @else
                        @foreach($data as $d)
                            @php
                                $imagePath = 'storage/' . ($d->img ?? 'default_image.png');
                                $imageUrl = Storage::exists($imagePath) ? asset($imagePath) : asset('images/default_image.png');
                            @endphp
                            <tr class="bg-white border-b-[1px] border-slate-200 dark:bg-white">
                                <td class="px-6 py-4">
                                    <div class="flex px-2 py-1">
                                        <img src="{{ $imageUrl }}" alt="{{ $d->namaBarang->nama_barang ?? 'No Image' }}" class="h-16 w-16 object-cover rounded">
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-700 capitalize">
                                    {{ $d->detail_pembelian->pluck('namaBarang.nama_barang')->implode(', ') }}
                                </td>
                                <td class="px-6 py-4 text-slate-700">
                                    <a href="/pesanan/{{$d->slug}}" class="bg-orange-400 text-white rounded-md py-2 px-4 hover:bg-orange-500">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
