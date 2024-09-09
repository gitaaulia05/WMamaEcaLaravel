@extends('admin.template.aside')


@section('container')

@php

 $dataKasbon =  $data->detKasbon->sortByDesc('created_at')->first();

 $cicilan_terakhir = $dataKasbon ? $dataKasbon->cicilan_ke +1 : 1;
@endphp
        <form method="post" action="/simpan-data-kasbon">
        @csrf
        <input type="hidden" name="id_kasbon" value="{{$data->id_kasbon}}">


        <label for="cicilan_ke"> cicilan Ke : </label>
         <input type="text" name="cicilan_ke" value="{{$cicilan_terakhir}}" readonly>
        

        <input type="number" name="total_bayar" class="form-control @error('total_bayar') is-invalid @enderror" placeholder="masukkan total kasbon" value="{{ old('total_bayar') }}">

                            @error('total_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
      
        <input type="date" name="tanggal_bayar"class="form-control @error('tanggal_bayar') is-invalid @enderror" placeholder="masukkan tanggal kasbon" value="{{date('Y-m-d')}}">

                            @error('tanggal_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror


<label for="is_lunas" class="form-control @error('is_lunas') is-invalid @enderror">Apakah Pembayaran sudah lunas ?</label>
                        <select name="is_lunas" id="is_lunas">
        <option value="1">Lunas</option>
        <option value="0">Belum Lunas</option>

        </select>
                        @error('is_lunas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
        <br>
        <button type="submit">simpan</button>
        </form>

@endsection