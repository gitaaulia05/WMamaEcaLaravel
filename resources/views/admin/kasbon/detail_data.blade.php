

{{-- //  INI HAPUS AJA LINK BOOTSTRAP NYA CUMAN BUAT TEST AJA --}}


    {{-- @foreach ($data->detKasbon as $d)
          <div class="bg-danger mx-auto col-5">
    <h1>cicilan ke {{$d->cicilan_ke}}</h1>
     @if ($user)
         <h1> nama pembeli : {{$user->nama}}</h1>
     @endif
              @foreach ($pembelian->detail_pembelian as $detail)
         <h1>Nama Barang : {{$detail->namaBarang->nama_barang}}</h1>
     @endforeach
        <h1>total bayar : {{$d->total_bayar}}</h1>
        <h1>tanggal Bayar : {{$d->created_at}}</h1>
</div>
    @endforeach --}}

    @extends('admin.template.aside')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@section('container')

<div class="button-dashboard d-flex justify-content-between align-items-center" style="margin-left:30px;">
    <a href="/tambah-data-kasbon" class="btn btn-orange">Tambah Data</a>
</div>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 ms-3">
            <div class="card-header pb-0" style="border-bottom: none; background-color: white;">
              <h6>List Data Kasbon</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0 ms-3">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">profil</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Kasbon</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Limit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                       @foreach ($pembelian as $d )
                  <tbody>
                       
                        
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">

                            <img src="{{asset('images/img/team-2.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                        
               
                      </td>
                          <td>
                        <p class="text-xs font-weight-bold mb-0">
                         {{$d->users->nama}}
                      </td> 
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          @foreach($d->kasbon as $p)
                        {{$p->total_kasbon}}
                        @endforeach
                        </p>
                      </td>
                      <td class="align-middle text-center text-sm">
        <span class="text-secondary text-xs font-weight-bold">
                       @foreach ($d->detail_pembelian as $nB )
                           {{$nB->namaBarang->nama_barang}}
                       @endforeach
                      </span
                    </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                        2000/50000
                      </span
                     </td>
                      <td class="align-middle text-center">
                      <a href="/detail-kasbon/{{$d->slug}}" class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
               
                    </tr>
                       
                    </tr>
                  </tbody>
                     @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>




    <a href="/tambah-data-kasbon">Tambah data</a>
@endsection