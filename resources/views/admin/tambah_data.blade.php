
@extends('admin.template.aside')

@section('container')

<div class="container mt-4" style="min-height: 400px; margin-left: 30px; background-color: #EEEEEE; padding-bottom: 130px; position: relative;">

    <form class= "form" action="/tambah-data" method="POST">
        @csrf

        <div class="form-group mb-3">
        <label for="name" >Nama Barang:</label>
            <input type="text" id="name" name="name" class="form-control" style="width: 30%;" required>
        </div>

        <div class="form-group mb-3">
            <label for="price" >Harga Barang:</label>
            <input type="number" id="price" name="price" class="form-control" style="width: 25%;" required>
        </div>

        <div class="form-group mb-3">
            <label for="stock" >Stok Barang:</label>
            <input type="number" id="stock" name="stock" class="form-control" style="width: 20%;" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" class="form-control" style="width: 30%; height: 200px;" required></textarea>

        </div>

        <div class="form-group mb-3">
            <label for="date">Tanggal Input:</label>
            <input type="date" id="date" name="date" class="form-control" style="width: 18%;" required>
        </div>

        <div class="form-group mb-3">
            <div style="position: absolute; top: 300px; right: 70px; width: 20%;">
                <input type="file" id="image" name="image" class="form-control" required>
                <label for="image">Gambar Barang</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #ff6f5e; color: white; float: right; margin-top: 50px; ">Tambah Data</button>
    </form>
</div>


@endsection
