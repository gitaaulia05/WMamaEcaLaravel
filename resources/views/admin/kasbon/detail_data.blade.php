
    @extends('admin.template.aside')

@section('container')

            {{-- INI COMPONEN LIVEWIRE BUAT LIVE SEARCHING ADANYA DI FOLDER LIVEWIRE - DETAIL-KASBON  CONTROLLER NYA DETAILKASBON / LIVEWIRE--}}
            @livewire('detail-kasbon' ,[
                'id_user' => $id_user
            ])
            
@endsection

