@extends('admin.template.aside')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@section('container')

    {{-- INI MESSAGE KALO DATA UDAH BERHASIL DITAMBAHIN --}}
      @if(session()->has('status'))
      <button class="status-button-s" disabled>
        {{session('status')}}
      </button>
      @endif



   {{-- INI MESSAGE KALO USER BELUM BUAT DETAIL CICILAN SAMA SEKALI ( TABLE DETAIL_CICILAN) --}}
    @if ($data->detKasbon->isEmpty())
    <div class="message-button">
      Pembeli {{$data->pembelian->users->nama}} Belum Membuat Cicilan
    </div>
    @endif


    @php
    $lunas = $data->detKasbon->sortByDesc('created_at')->first();
    $hasil_lunas = $lunas ? $lunas->is_lunas : null;
    @endphp

    @if($hasil_lunas == 0)
    <a href="/tambah-data-kasbon/{{$data->slug}}" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none; margin-left: 50px; margin-top: 20px;">Tambah Data</a>
    @else
    <h1 style="margin-left: 50px; margin-top: 20px;">Cicilan ini sudah lunas</h1>
    @endif
     
     {{-- INI DI PINDAH KE DETAIL-RINCI-LIVE CONTROLLER DETAILRINCILIVE / LIVEWIRE --}}
     @livewire('detail-rinci-live', [
      'slug' => $slug
     ])


                

@endsection
