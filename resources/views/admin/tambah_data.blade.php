@extends('admin.template.aside')

@section('container')

<div class="container-c mt-4">
<div class="row justify-content-center">
<div class="col-md-11">
    <div class="card" style="margin-left: 0; background-color: #EEEEEE; padding-bottom: 5px; min-height: 300px; position: relative;">
        <div class="card-header">
            <h5>Tambah Data Barang</h5>
        </div>
        <div class="card-body">
            <form class="form-b" action="/simpanBarang" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Nama Barang:</label>
                    <input type="text" id="name" name="nama_barang" class="form-control" style="width: 30%;" required>
                </div>

                <div class="form-group mb-3">
                    <label for="stock">Stok Barang:</label>
                    <input type="number" id="stock" name="stok_barang" class="form-control" style="width: 20%;" required>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Harga Barang:</label>
                    <input type="number" id="price" name="harga_barang" class="form-control" style="width: 25%;" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Deskripsi:</label>
                    <textarea id="description" name="deks_barang" class="form-control" style="width: 40%; height: 100px;" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="date">Tanggal Input:</label>
                    <input type="date" id="date" name="created_at" class="form-control" style="width: 18%;" required>
                </div>

                <div class="form-group mb-3">
                    <label for="image">Gambar Barang:</label>
                    <input type="file" id="image" name="img" class="form-control" style="width: 30%;" required>
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #ff6f5e; color: white; float: right; margin-top: 30px;">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection