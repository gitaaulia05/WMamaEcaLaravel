@extends('admin.template.aside')

@section('container')

        <form method="post" action="/simpan-data-kasbon">
        @csrf
        <input type="text" name="total_kasbon" value="{{$data->user->nama}}" readonly>
        <input type="number" name="total_kasbon" placeholder="masukkan total kasbon">
        <input type="number" name="sisa_kasbon" value="">
        <input type="date" name="tanggal_kasbon" placeholder="masukkan tanggal kasbon">

        <br>
        <button type="submit">simpan</button>
        </form>

@endsection