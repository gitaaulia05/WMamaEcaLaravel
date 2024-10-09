@extends('user.template.navbar')

    @section('container')


        @livewire('pembelian-live' , [
            'token' => $token,
        ])
    @endsection