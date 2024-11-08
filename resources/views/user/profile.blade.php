    @extends('user.template.navbar')

    @section('container')

    <div class="w-11/12 shadow-xl pt-9 pb-5 mx-auto font-serif">
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


        <h1 class="text-center pb-3">Profile Anda</h1>
        <div class="grid grid-cols-2 ms-10">    
                
            <div>
            <h1 class="pb-1">{{$data->nama}}</h1>
            <h1 class="pb-1">{{$data->alamat}}</h1>
            <h1 class="pb-1">{{$data->no_hp}}</h1>
            <h1  class="pb-1">Limit anda : {{$data->limit}}</h1>
            </div>

            <div class="flex justify-end mt-0 px-12 h-fit">
                <a href="/ubah-profile" class="bg-orange-400 text-white font-bold py-2 px-4 rounded-xl">Perbarui Data</a>
            </div>

        </div>
       
    </div>
 @if(session()->has('message'))
 
    @endif
    
       @livewire('profile-table')
    @endsection
