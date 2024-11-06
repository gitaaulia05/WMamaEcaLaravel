  @extends('user.template.navbar')
@section('container')
     
   @livewire('cicilan-kasbon' , [
    'slug' => $slug
   ])
@endsection