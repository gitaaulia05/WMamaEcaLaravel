  @extends('user.template.navbar')
@section('container')


@livewire('barang-user' , [
    'slug' => $slug,
    'id_user' => $id_user
])
@endsection