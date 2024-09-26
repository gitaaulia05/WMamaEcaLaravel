@extends('user.template.navbar')

    @section('container')
        @livewire('pembelian' , [
            'token' => $token,
        ])
    @endsection