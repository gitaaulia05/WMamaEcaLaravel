@extends('admin.template.aside')

@section('container')



<div class="container-fluid py-4">
      <div class="row">
      <div class="col-12 col-md-10 col-lg-12">
          <div class="card mb-4">
            <div class="card-header pb-0" style="border-bottom: none; background-color: white;">
              <h6>Tabel Penjualan</h6>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Habis</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                   

                    @foreach($data as $d)

       
                 
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $d->namaBarang->nama_barang }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $d->total }}</p>
                      </td>

                   
                      <td class="align-middle text-center text-sm">
                        <a href="/detailLaporanPenjualan/{{ $d->namaBarang->slug }}" class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
                      <td class="align-middle">
                      </td>
                    </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
