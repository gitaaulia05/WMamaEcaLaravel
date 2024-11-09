<div class="width-11/12   shadow-lg rounded-lg overflow-hidden px-6 py-8 mb-10 font-serif">
{{-- dari file detail_barang --}}
  @if(session()->has('message'))

   <div  x-data="{show: true}" x-init="setTimeout(() => show = false, 1000)" x-show="show" id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full mx-auto py-48">
        <div class="relative bg-white opacity-100 rounded-lg shadow ">
            <div class="p-4 md:p-5 text-center">

                 <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
            <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
            </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ session('message')}}</h3>

            </div>
        </div>
    </div>
</div>
    @endif

<form wire:submit.prevent="simpanBarang">
       @csrf

    <div class="grid lg:grid-cols-2 " >



   {{-- start gambar produk --}}
        <div class="Gambar-produk bg-[#F2F2F2] w-10/12 rounded-xl mx-9">
      <img src="{{asset('images/img/bruce-mars.jpg')}}" class="w-1/2 rounded-xl shadow-sm mx-auto py-10">
    </div>
    {{-- end gambar produk --}}

      {{-- start deks produk --}}
        <div class="Deks-produk-Button ">
        <h1 class=" text-4xl pt-5 lg:text-3xl lg:pt-0 mb-2 capitalize">{{$data->nama_barang}}</h1>
        <h1 class=" pt-2 text-2xl lg:text-3xl lg:pt-3">Rp. {{$data->harga_barang}}</h1>
        <h1 class="pt-3 lg:text-lg lg:mt-5">Deskripsi</h1>
        <p class="pt-1 text-sm lg:text-md text-slate-700 text-pretty leading-relaxed">{{$data->deks_barang}}</p>

          <div class="kuantitas">
             <label>Kuantitas:</label>
         <input wire:model="kuantitas.0" wire:input="checkKuantitas" name="kuantitas" type="number" value="1"  min="1"  max="{{$maxBarang}}"  oninput ="if(this.value < 1) this.value=1; if(this.value > {{$maxBarang}}) this.value={{$maxBarang}};" class="border-2 border-gray-100 focus:border-orange-500 focus:ring-0 focus:outline-none rounded-md">

         @if (session()->has('kuantitasMessage'))
           <h1 class="text-center text-red-400">{{session('kuantitasMessage')}}</h1>
         @endif
          </div>


          <div class="grid grid-cols-2 pt-2">
          <div class="masukKeranjang">
        @if(session()->has('disabled') || $data->is_arsip == 1 || $maxBarang == 0)
        <button class="bg-orange-300 text-white px-1 py-1 rounded-lg mr-6" disabled type="submit" id="masukkan">Masukkan keranjang</button>
        <p class="text-red-500">{{session('disabled')}}</p>
          @else
          <button class="bg-orange-400 text-white px-1 py-1 rounded-lg mr-6" type="submit" id="masukkan">Masukkan keranjang</button>
        @endif
        </div>

        
          <div class="beliSekarang">
  @if($data->is_arsip == 1 || $maxBarang == 0)
  <button class="bg-orange-300 text-white px-1 py-1 rounded-lg mt-2" id="masukkan" disabled >Beli Sekarang</button>

        @else 
       <input id="beliCheckbox"  wire:model="checkBarang.{{$data->id_barang}}" type="checkbox" wire:click="simpanBarangDanBeliLangsung" class=" text-white px-1 py-1 rounded-lg hidden peer">
          @if($pembeli->limit < $data->harga_barang || $totalHarga > $pembeli->limit)
           <button class="bg-orange-300 text-white px-1 py-1 rounded-lg" id="masukkan" disabled >Beli Sekarang</button>
           <p class="text-red-400">Limit Kamu Tidak Mencukupi Untuk Membeli Barang Ini</p>
          @else
             <label for="beliCheckbox" class="ms-6 bg-orange-400  text-white px-1 py-1 rounded-lg hover:bg-orange-300">Beli Sekarang</label>
          @endif
  @endif 
</div>

</div>


    </div>

    </div>
    {{-- end deks produk --}}

    </div>
</form>
  

</div>
</div>
