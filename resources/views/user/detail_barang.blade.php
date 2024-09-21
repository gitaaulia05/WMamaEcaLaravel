  @extends('user.template.navbar')
@section('container')

@livewire('barang-user' , [
    'slug' => $slug
])
@endsection