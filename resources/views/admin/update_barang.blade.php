@extends('admin.template.aside')

@section('container')

<div class="button-dashboard" style="margin-left: 30px;">
    <a href="/tambah-data" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Tambah Data</a>
</div>

<div class="edit-form" style="margin: 30px;">
    <h2>Edit Data Barang</h2>
    <form action="{{ route('update-data', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
        </div>
        
        <div class="form-group">
            <label for="stok_barang">Stok Barang:</label>
            <input type="number" class="form-control" name="stok_barang" id="stok_barang" value="{{ old('stok_barang', $barang->stok_barang) }}" required>
        </div>

        <div class="form-group">
            <label for="harga_barang">Harga Barang:</label>
            <input type="number" class="form-control" name="harga_barang" id="harga_barang" value="{{ old('harga_barang', $barang->harga_barang) }}" required>
        </div>

        <div class="form-group">
            <label for="deks_barang">Deskripsi Barang:</label>
            <textarea class="form-control" name="deks_barang" id="deks_barang" required>{{ old('deks_barang', $barang->deks_barang) }}</textarea>
        </div>

        <div class="form-group">
            <label for="img">Gambar Barang:</label>
            <input type="file" class="form-control" name="img" id="img">
            @if($barang->img)
                <img src="{{ asset('storage/' . $barang->img) }}" alt="{{ $barang->nama_barang }}" style="width: 100px; height: auto; margin-top: 10px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection