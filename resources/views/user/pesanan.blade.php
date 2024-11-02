@extends('user.template.navbar')

@section('container')

@foreach ($data1 as $d)
 
        <div class="container mx-auto  py-2">
            <div class="card mx-auto lg:w-1/2 w-full bg-white shadow-lg rounded-lg overflow-hidden mb-4">
                <h5 class="bg-gray-100 text-lg font-bold py-3 px-4">Detail Pesanan</h5>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-4">

                        <div class="flex items-center">
                            <div class="w-12 h-12">
                                <img src="{{ asset('images/img/curved-images/white-curved.jpeg') }}" class="w-full h-full object-cover rounded" alt="gambar">
                            </div>
                            <div class="ml-4">
                                    <h5 class="text-base font-semibold capitalize">Nama Produk: {{$d->namaBarang->nama_barang}}</h5>
                            </div>
                        </div>

    
                        <div class="text-right">
                          
                                <h5 class="text-gray-500">Kuantitas: {{$d->kuantitas}}x</h5>
                                <h5 class="text-gray-700">Harga: {{$d->harga_perProduk}}</h5>
                          
                        </div>
                    </div>
                    <p class="text-gray-600">Tanggal Pemesanan: {{$d->created_at->format('d-m-Y, H:i')}}</p>
                </div>
            </div>
        </div>
    @endforeach


    <div class="flex justify-end mt-0 px-12">
    <a href="/profile" class="bg-orange-500 text-white font-bold py-2 px-4 rounded">Kembali</a>
</div>





@endsection
