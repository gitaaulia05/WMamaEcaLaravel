@extends('admin.template.aside')

@section('container')

<div class="button-dashboard " style="margin-left:30px;">
    <a href="/tambah-data-kasbon" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Tambah Data</a>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Kasbon</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Limit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">50.000</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">Beras</h6>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">40.000/50.000</span>
                      </td>
                      <td class="align-middle text-center">
                      <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Alexa Liras</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">50.000</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <h6 class="mb-0 text-sm">Telur</h6>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                      <td class="align-middle text-center">
                      <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm">Telur</h6>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                      <td class="align-middle text-center">
                        <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user4">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Michael Levi</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm"></h6>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                      <td class="align-middle text-center">
                      <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user5">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Richard Gran</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm"></h6>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                      <td class="align-middle text-center">
                        <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user6">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Miriam Eric</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm"></h6>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                      <td class="align-middle text-center">
                      <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection
