<div>
 

        <div class="w-10/12 mx-auto font-serif shadow-xl mt-9">
       <form class="p-5" wire:submit.prevent="updateDataUser" enctype="multipart/form-data">
       @csrf

   <div class="img grid grid-cols-2 w-1/2 ms-5 pb-3">
    <!-- Image Preview -->
    <div class="img">
        <img id="preview" class="rounded-md h-16" src="{{$data->img ? asset('storage/' . $data->img) : asset('images/logo1-removebg-preview.png')}}" alt="Image Preview">
    </div>
    
    <!-- File Input -->
    <input type="file" id="image" wire:model="img" name="img" class="form-control @error('img') is-invalid @enderror" value="{{ old('img') }}" required onchange="previewImage(event)">
    @error('img')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
       <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 ms-5">
             <div class="nama">
             <h2 class="lg:text-2xl">Nama</h2>
            <input type="text" id="nama" name="nama" wire:model="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring focus:ring-orange-300  block w-full p-2.5" value="{{ old('nama' , $data->nama) }}" placeholder="Masukkan Nama Anda" required />
        </div>

        <div class="no Hp">
             <h2 class="lg:text-2xl">No Telepon</h2>
            <input type="number" id="no_telp" name="no_hp" wire:model="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring focus:ring-orange-300 block w-full p-2.5" value="{{ old('nama' , $data->no_hp) }}" placeholder="Masukkan Nama Anda" required />
        </div>
       </div>

         <div class=" mx-auto pt-3 ms-5">
         <h1 class="lg:text-2xl">Alamat</h1>
            <textarea wire:model="alamat" class="pt-1 focus:outline-none focus:ring focus:ring-orange-300 p-2.5">{{$data->alamat}}</textarea>
         </div>

       <div class="button ms-5 pt-2">
        <button class="bg-orange-400 rounded-lg px-4 py-2 hover:bg-orange-300 transition duration-150">Ubah Data</button>
       </div>

             </form>
        </div>
       
</div>
