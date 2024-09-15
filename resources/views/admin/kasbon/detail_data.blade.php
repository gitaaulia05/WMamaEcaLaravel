
    @extends('admin.template.aside')

@section('container')

        <div class="input-group ms-4 mt-4 w-20 ">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" wire:model.live="search"  placeholder="Cari di sini...">
            </div>

            {{-- INI COMPONEN LIVEWIRE BUAT LIVE SEARCHING ADANYA DI FOLDER LIVEWIRE - DETAIL-KASBON  CONTROLLER NYA KASBONTABLEL / LIVEWIRE--}}
            @livewire('detail-kasbon' ,[
                'id_user' => $id_user
            ])
            
@endsection

