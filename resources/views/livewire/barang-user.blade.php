<div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden px-6 py-8 ">
{{-- dari file detail_barang --}}
  @if(session()->has('message'))

   <div  x-data="{show: true}" x-init="setTimeout(() => show = false, 1000)" x-show="show" id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full mx-auto py-48">
        <div class="relative bg-white opacity-100 rounded-lg shadow ">
            <div class="p-4 md:p-5 text-center">
              
                 <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
            <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
            </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">barang masuk</h3>
              
            </div>
        </div>
    </div>
</div>
    @endif


    <form wire:submit.prevent="simpanBarang">
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
         <input wire:model="kuantitas" wire:input="checkKuantitas" name="kuantitas" type="number" value="1"  min="1"  max="{{$maxBarang}}"  oninput ="if(this.value > {{$maxBarang}}) this.value={{$maxBarang}};" class="focus">
         
         @if (session()->has('kuantitasMessage'))
           <h1 class="text-center text-red-400">{{session('kuantitasMessage')}}</h1>
         @endif
       </div>
        @if(session()->has('disabled') || $data->is_arsip == 1)
 <button class="bg-orange-300 text-white px-1 py-1 rounded-lg" disabled type="submit" id="masukkan">Masukkan keranjang</button>
 <p class="text-red-500">{{session('disabled')}}</p>
  @else
   <button class="bg-orange-400 text-white px-1 py-1 rounded-lg" type="submit" id="masukkan">Masukkan keranjang</button>
  @endif


  </form>

   
  @if($data->is_arsip == 1)
  <button class="bg-orange-300 text-white px-1 py-1 rounded-lg" wire:submit="arsipButton" type="submit" id="masukkan" disabled >Beli Sekarang</button>
        @else 
        <button class="bg-orange-400 text-white px-1 py-1 rounded-lg" type="submit" id="masukkan" >Beli Sekarang</button>
  @endif

  <div class="mb-1">
 
 
</div>
</div>
