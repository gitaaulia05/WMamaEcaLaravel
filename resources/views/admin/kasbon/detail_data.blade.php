@extends('admin.template.aside')

{{-- //  INI HAPUS AJA LINK BOOTSTRAP NYA CUMAN BUAT TEST AJA --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@section('container')
    @foreach ($data->detKasbon as $d)
    <div class="col-md-7 mt-4 ms-5">
          <div class="card">
            <div class="card-header pb-0 px-3" style="border-bottom: none; background-color: white;">
              <h6 class="mb-0">Cicilan Kasbon</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-m">Cicilan Ke-{{$d->cicilan_ke}}</h6>
			@if ($user)
                    <span class="mb-2 text-s">Nama Pembeli: <span class="text-dark font-weight-bold ms-sm-2">{{$user->nama}}</span></span>
			@endif
			@foreach ($pembelian->detail_pembelian as $detail)
                    <span class="mb-2 text-s">Nama Barang: <span class="text-dark ms-sm-2 font-weight-bold">{{$detail->namaBarang->nama_barang}}</span></span>
			@endforeach
                    <span class="text-s">Total Bayar: <span class="text-dark ms-sm-2 font-weight-bold">{{$d->total_bayar}}</span></span>
		    <span class="text-s">Tanggal Bayar: <span class="text-dark ms-sm-2 font-weight-bold">{{$d->created_at}}</span></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
    @endforeach

    <div class="button-dashboard d-flex justify-content-end align-items-center" style="padding-right: 90px; padding-top: 300px;">
    <a href="/tambah-data-kasbon/{{$data->slug}}" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Tambah Data</a>
</div>
@endsection
