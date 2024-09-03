@extends('admin.template.aside')

@section('container')

<div class="container-c mt-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card" style="margin-left: 0; background-color: #EEEEEE; padding-bottom: 5px; min-height: 300px; position: relative;">
                <div class="card-header">
                    <h5>Tambah Data Kasbon</h5>
                </div>
                        <div class="card-body">
                            <form class="form-b" action="/tambah-data" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Nama Pelanggan:</label>
                            <input type="text" id="name" name="name" class="form-control" style="width: 30%;" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name-prod">Nama Produk:</label>
                            <input type="text" id="name-prod" name="name-prod" class="form-control" style="width: 25%;" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Total Harga:</label>
                            <input type="number" id="price" name="price" class="form-control" style="width: 20%;" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pay">Jumlah Bayar:</label>
                            <input type="number" id="pay" name="pay" class="form-control" style="width: 20%;" required>
                        </div>

                        <button type="submit" class="btn btn-primary" style="background-color: #ff6f5e; color: white; float: right; margin-top: 30px;">Simpan Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
