@extends('admin.template.aside')


@section('container')

@php
 $dataKasbon =  $data->detKasbon->sortByDesc('created_at')->first();
 $cicilan_terakhir = $dataKasbon ? $dataKasbon->cicilan_ke +1 : 1;
@endphp

<div class="container-c mt-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card" style="margin-left: 0; background-color: #EEEEEE; padding-bottom: 5px; min-height: 300px; position: relative;">
                <div class="card-header">
                    <h5>Tambah Data Cicilan</h5>
                </div>
                <div class="card-body">
                        <form method="POST" action="/simpan-data-kasbon">
                        @csrf

                            <label for="cicilan_ke"> Cicilan ke: </label>
                            <input type="text"  name="cicilan_ke" value="{{$cicilan_terakhir}}" style="width: 3%; text-align: center;" readonly>
                        </div>

                        <div class="form-group mt-3 mb-3 ms-4">
                            <label for="total bayar">Total kasbon: </label>
                            <input type="number" id="total_bayar" name="total_bayar" class="form-control @error('total_bayar') is-invalid @enderror" placeholder="masukkan total kasbon" value="{{  old('total_bayar') }}" style="width: 18%;" required >
			            @error('total_bayar')
                        </div>
		                <div class="invalid-feedback" >
                            {{ $message }}
                        </div>
                        @enderror
                  <div class="invalid-feedback"  id="total_bayar_error"></div>

                         <div class="form-group mt-3 mb-3">
                            <label for="sisa_bayar">Sisa Bayar: </label>
                            <input type="number" id="sisa_bayar" name="sisa_bayar" class="form-control @error('sisa_bayar') is-invalid @enderror" placeholder="masukkan sisa kasbon" value="{{ $data->detKasbon->isEmpty() ? $data->total_kasbon  :  $data->detKasbon->first()->sisa_bayar }}" style="width: 18%;" readonly>
			            @error('sisa_bayar')
                        </div>
		                <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                        <div class="form-group mt-3 mb-3">
		                    <label for="tanggal bayar">Tanggal bayar: </label>
                            <input type="date" name="tanggal_bayar"class="form-control @error('tanggal_bayar') is-invalid @enderror" placeholder="masukkan tanggal kasbon" value="{{date('Y-m-d')}}" style="width: 18%;">
		                @error('tanggal_bayar')
                        </div>
		                <div class="invalid-feedback">
                            {{ $message }}
                        </div>x
                        @enderror

                        <div class="form-group mt-3 mb-3">
                            <label for="is_lunas">Apakah pembayaran sudah lunas?</label>
                            <select id="is_lunas" class="form-control @error('is_lunas') is-invalid @enderror" style="appearance: auto; -webkit-appearance: menulist-button; -moz-appearance: menulist-button; width: 18%;" disabled>
                                <option value="1"  >Lunas</option>
                                <option value="0" >Belum Lunas</option>
                            </select>
		                @error('is_lunas')
                        </div>
		                <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <input id="final_is" name="is_lunas"  value="" type="hidden">
                        <button type="sumbit" class="btn btn-primary" id="simpan" style="background-color: #ff6f5e; color: white; float: right; margin-top: 30px;" >Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

