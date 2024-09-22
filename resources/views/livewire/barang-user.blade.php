<div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden px-6 py-8 ">
    <form wire:submit.prevent="simpanBarang" >
       @csrf
       <input wire:model="id_barang" hidden name="id_barang" value="{{$data->id_barang}}" readonly>

       <div class="mb-4">
         <h2 class="text-lg font-semibold"> Nama Produk: {{$data->nama_barang}}</h2>
       </div>
       <div class="mb-4">
         <h2 class="text-gray-600"> Stock: {{$data->stok_barang}}</h2>
       </div>
       <div class="mb-4">
         <h2 class="text-gray-600">Deksripsi: {{$data->deks_barang}}</h2>
       </div>
       <div class="mb-4">
         <label>Kuantitas:</label>
         <input wire:model="kuantitas" name="kuantitas" type="number" value="1" min="1">
       </div>
  </form>
  <div class="mb-1">
  <button class="bg-orange-400 text-white px-1 py-1 rounded-lg" type="submit" id="masukkan">Masukkan keranjang</button>
</div>
</div>
