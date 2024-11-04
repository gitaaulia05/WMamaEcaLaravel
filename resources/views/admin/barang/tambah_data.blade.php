
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
                    <input type="text" id="name" name="nama_barang" class="form-control @error('nama_barang')
                        is-invalid
                    @enderror" value="{{old ('nama_barang')}}" style="width: 30%;" required>
                    @error('nama_barang')
                </div>
                <div class="invalid-feedback">
                {{$message}}
                </div>
                    @enderror

               <div class="form-group mb-3">
                    <label for="stock">Stok Barang:</label>
                    <input type="number" id="stock" name="stok_barang" class="form-control @error('stok_barang')
                        is-invalid
                    @enderror" style="width: 20%;" value="{{old ('stok_barang')}}" required>
                      @error('stok_barang')
                </div>
                 <div class="invalid-feedback">
                {{$message}}
                </div>
                    @enderror

                <div class="form-group mb-3">
                    <label for="price">Harga Barang:</label>
                    <input type="number" id="price" min="1" name="harga_barang" class="form-control" style="width: 25%;" required>
                </div>

             

                <div class="form-group mb-3">
                    <label for="description">Deskripsi:</label>
                    <textarea id="description" name="deks_barang" class="form-control" style="width: 40%; height: 100px;" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="date">Tanggal Input:</label>
                    <input type="date" id="date" name="created_at" class="form-control" style="width: 18%;" value={{date('Y-m-d')}} required>
                </div>

                <div class="form-group mb-3">
                    <div style="position: absolute; top: 300px; right: 70px; width: 20%;">
                        <input type="file" id="image" name="img" class="form-control @error('img')
                        is-invalid
                    @enderror" value="{{old ('img')}}" required>
                        <label for="image">Gambar Barang</label>
                          @error('img')
                    </div>
                    <div class="invalid-feedback" >
                            {{ $message }}
                        </div>
                        @enderror

                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #ff6f5e; color: white; float: right; margin-top: 30px;">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>



@endsection
