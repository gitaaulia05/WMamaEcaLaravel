
@extends('admin.template.aside')

@section('container')

<style>
        .container {
            height: 400px;
            margin-left: 30px;
        }

        .custom-textarea {
            width: 30%;
            height: 200px;
        }
</style>

<div class="container mt-4">
    <form class= "form" action="/tambah-data" method="POST">
        @csrf

        <div class="form-group mb-3">
        <label for="name" style="font-size: 15px;">Nama Barang:</label>
            <input type="text" id="name" name="name" class="form-control" style="width: 30%;" required>
        </div>

        <div class="form-group mb-3">
            <label for="price" style="font-size: 15px;">Harga Barang:</label>
            <input type="number" id="price" name="price" class="form-control" style="width: 25%;" required>
        </div>

        <div class="form-group mb-3">
            <label for="stock" style="font-size: 15px;">Stok Barang:</label>
            <input type="number" id="stock" name="stock" class="form-control" style="width: 20%;" required>
        </div>

        <div class="form-group mb-3">
            <label for="description" style="font-size: 15px;">Deskripsi:</label>
            <textarea id="description" name="description" class="form-control custom-textarea" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="date" style="font-size: 15px;">Tanggal Input:</label>
            <input type="date" id="date" name="date" class="form-control" style="width: 18%;" required>
        </div>

        <div class="form-group mb-3">
            <input type="file" id="product_img" name="product_img" style="width: 100%; align-items: center;" required>
            <label for="product_img" style="display: block;  margin-top: 5px;">Gambar Barang</label>
        </div>


        <button type="submit" class="btn btn-primary" style="background-color: #ff6f5e; color: white; float: right;">Tambah Data</button>
    </form>
</div>


@endsection
