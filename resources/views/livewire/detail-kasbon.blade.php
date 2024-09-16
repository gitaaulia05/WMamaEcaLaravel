<div>
            <div class="input-group ms-4 mt-4 w-20 ">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" wire:model.live="search"  placeholder="Cari ID Kasbon di sini...">
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
                             @foreach($d->kasbon as $t)
                          {{$t->total_kasbon}}/{{$d->users->limit}}
                        @endforeach
                      </span
                     </td>
                      <td class="align-middle text-center">
                      <a href="/detail-kasbon-rinci/{{$d->slug}}" class="btn btn-orange"
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
    {{$pembelian->links()}}
</div>
