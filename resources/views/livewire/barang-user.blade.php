<div>
  
        <form wire:submit.prevent="simpanBarang" >
       @csrf
 <input wire:model="id_barang" hidden name="id_barang" value="{{$data->id_barang}}" readonly> 
 <label>kuantitas </label>

 <input wire:model="kuantitas" name="kuantitas" type="number" value="1" min="1"> 

 <h2 > Nama Produk : {{$data->nama_barang}}</h2>
 <h2> Stock : {{$data->stok_barang}}</h2>
 <h2>deksripsi : {{$data->deks_barang}}</h2>


 <button class="bg-stone-200 rounded-full" type="submit">Masukkan keranjang</button>
  </form>

</div>
