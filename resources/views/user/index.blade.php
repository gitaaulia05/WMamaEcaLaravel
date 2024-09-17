

  @extends('user.template.navbar')
@section('container')
     @auth
   <h1 class="pt-3">Hallo {{ auth()->user() ? auth()->user()->nama : 'Guest' }}</h1>
   <form method="POST" action="/logout">
   @csrf
      <button type="submit">Logout</button>
   </form>
        @else
            <a href="/login" class="px-5 py-5">LOGIN </a>
    @endauth

  
  @endsection