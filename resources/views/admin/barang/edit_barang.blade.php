@extends('admin.template.aside')

@section('container')

<div class="container-c mt-4 pb-6">
<div class="row justify-content-center">
<div class="col-md-11">
    <div class="card" style="margin-left: 0; background-color: #EEEEEE; padding-bottom: 5px; min-height: 300px; position: relative;">
        <div class="card-header">
            <h5>Tambah Data Barang</h5>
        </div>
        <div class="card-body">
            <form class="form-b" action="/UbahBarang" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name">Nama Barang:</label>
                    <input type="text" id="name" name="nama_barang" class="form-control @error('nama_barang')
                        is-invalid
                    @enderror" value="{{old ('nama_barang', $barang->nama_barang) }} " style="width: 30%;" required>
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
                    @enderror" style="width: 20%;" value="{{old ('stok_barang' , $barang->stok_barang)}}" required>
                      @error('stok_barang')
                </div>
                 <div class="invalid-feedback">
                {{$message}}
                </div>
                    @enderror

                <div class="form-group mb-3">
                    <label for="price">Harga Barang:</label>
                    <input type="number" id="price" min="1" name="harga_barang" value="{{old ('harga_barang', $barang->harga_barang)}}" class="form-control" style="width: 25%;" required>
                </div>

             

                <div class="form-group mb-3">
                    <label for="description">Deskripsi:</label>
                    <textarea id="description" name="deks_barang"   class="form-control" style="width: 40%; height: 100px;" required> {{old('deks_barang' , $barang->deks_barang)}}</textarea>
                </div>

             

                <div class="form-group mb-3">
                    <label for="date">Tanggal Input:</label>
                    <input type="date" id="date" name="created_at" value="{{ $barang->created_at->format('d/m/Y')}}" class="form-control" style="width: 18%;" required>
                </div>

                <div class="form-group mb-3">
                    <div style="position: absolute; top: 300px; right: 70px; width: 20%;">
                 
                      <img id="imagePreview" src="{{ old('img') ? asset('storage/barang' . old('img')) : asset('storage/barang/' . $barang->img) }}" alt="Preview Image" style="display: block; width: 100%; margin-top: 10px;">

                        <input type="file" id="image" name="img" class="form-control @error('img')
                        is-invalid
                    @enderror" required onchange="previewImage(event)" >
                   
                        <label for="image">Gambar Barang</label>
                          @error('img')
                    </div>
                    <div class="invalid-feedback" >
                            {{ $message }}
                        </div>
                        @enderror

                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #ff6f5e; color: white; float: right; margin-top: 30px;">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection
