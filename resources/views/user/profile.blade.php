    @extends('user.template.navbar')

    @section('container')

    <div class="w-11/12 shadow-xl pt-9 pb-5 mx-auto font-serif">
        <h1 class="text-center pb-3">Profile Anda</h1>
        <div class="grid grid-cols-2 ms-10">    
                
            <div>
            <h1 class="pb-1">{{$data->nama}}</h1>
            <h1 class="pb-1">{{$data->alamat}}</h1>
            <h1 class="pb-1">{{$data->no_hp}}</h1>
            </div>

            <div class="flex justify-end mt-0 px-12 h-fit">
                <a href="/update-profile" class="bg-orange-400 text-white font-bold py-2 px-4 rounded-xl">Perbarui Data</a>
            </div>

        </div>
       
    </div>

    

       @livewire('profile-table')
    @endsection
