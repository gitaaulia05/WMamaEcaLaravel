@extends('user.template.navbar')

@section('container')

@foreach ($data as $d)
  @foreach ($d->detail_pembelian as $dp)
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
                                    <h5 class="text-base font-semibold">Nama Produk: {{$dp->namaBarang->nama_barang}}</h5>
                            </div>
                        </div>


                        <div class="text-right">
                            @foreach($d->detail_pembelian as $k)
                                <h5 class="text-gray-500">Kuantitas: {{$k->kuantitas}}x</h5>
                                <h5 class="text-gray-700">Harga: {{$k->harga_perProduk}}</h5>
                            @endforeach
                        </div>
                    </div>
                    <p class="text-gray-600">Tanggal Pemesanan: {{$d->created_at->format('d-m-Y, H:i')}}</p>
                </div>
            </div>
        </div>
    @endforeach
    @endforeach


    <div class="flex justify-end mt-0 px-12">
    <a href="/profile" class="bg-orange-500 text-white font-bold py-2 px-4 rounded">Kembali</a>
</div>





@endsection
