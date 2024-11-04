@extends('admin.template.aside')

@section('container')

<div class="button-dashboard" style="margin-left: 30px;">
    <a href="/tambah-data" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Tambah Data</a>
    <a href="{{ url('export') }}" class="btn btn-orange" style="background-color: #ff8567; color: #ffffff; border: none;">Export Data</a>
</div>

<div class="data-table" style="margin: 30px;">
    <h2>Data Barang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->id_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->stok_barang }}</td>
                    <td>{{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                    <td>{{ $barang->deks_barang }}</td>
                    <td>
                        @if($barang->img)
                            <img src="{{ asset('storage/' . $barang->img) }}" alt="{{ $barang->nama_barang }}" style="width: 100px; height: auto;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('edit-data', $barang->id_barang) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
