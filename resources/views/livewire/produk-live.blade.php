<div>
    <div class="flex items-center ml-16 mt-4 w-80 mb-10 bg-white shadow-md rounded-lg">
        <span class="px-3 text-gray-500"><i class="fas fa-search" aria-hidden="true"></i></span>
        <input type="text" class="w-full py-2 px-3 focus:outline-none focus:ring focus:ring-orange-300 rounded-r-lg" wire:model.live="search" placeholder="Cari Nama Barang ...">
    </div>

    <div class="container list-barang px-10 py-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($data as $b)
                @if ($b->is_arsip == 0)
                    <div class="list-barang-card bg-slate-50 shadow-sm hover:scale-105 mb-5 hover:shadow-lg transition duration-500">
                        <div class="barang-content mx-3 my-3">
                            <div class="barang-image">
                                <img src="{{ asset('storage/' . ($b->img ?? 'default_image.png')) }}" class="rounded-md" alt="Image of {{ $b->nama_barang }}">
                                @if (!file_exists(public_path('storage/' . ($b->img ?? 'default_image.png'))))
                                    <p class="text-red-500">Image not found: {{ asset('storage/' . ($b->img ?? 'default_image.png')) }}</p>
                                @endif
                            </div>
                            <div class="text-button-barang mt-3" id="text-button">
                                <p class="text-center mx-auto capitalize">{{ $b->nama_barang }}</p>
                                <div class="button-lihat-produk rounded-full mx-auto bg-orange-300 w-fit hover:bg-orange-200">
                                    <a class="mx-2 my-1" href="/barang/{{ $b->slug }}">{{ number_format($b->harga_barang, 0, ',', '.') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($data as $b)
                @if ($b->is_arsip == 1)
                    <div class="list-barang-card bg-slate-50 shadow-sm hover:scale-105 mb-5 hover:shadow-lg transition duration-500">
                        <div class="barang-content mx-3 my-3">
                            <div class="barang-image">
                                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer">
                                    <a href="#">
                                        <img class="rounded-lg opacity-40" src="{{ asset('storage/' . ($b->img ?? 'default_image.png')) }}" alt="Image of {{ $b->nama_barang }}">
                                    </a>
                                    <figcaption class="absolute px-4 text-sm lg:text-lg md:text-lg text-black bottom-3 lg:bottom-32 md:bottom-32 lg:left-6 md:left-8">
                                        <p>- Stok Barang Habis -</p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="text-button-barang mt-3" id="text-button">
                                <p class="text-center">{{ $b->nama_barang }}</p>
                                <div class="button-lihat-produk rounded-full mx-auto bg-gray-200 w-fit mb-2">
                                    <a class="mx-2 my-1 text-center" href="">Rp {{ number_format($b->harga_perProduk, 0, ',', '.') }}</a>
                                </div>
                                <div class="button-lihat-produk rounded-full lg:mx-auto bg-orange-400 text-sm w-fit hover:bg-orange-300 mx-auto">
                                    <a class="inline-block mx-2 my-1 text-center" href="/barang/{{ $b->slug }}">Lihat Produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
