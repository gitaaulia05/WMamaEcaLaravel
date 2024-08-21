<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{  $title }}</title>
</head>
<body>

    <div class="data-appear">

    <a href="">Tambah data</a>
        <table border="1">
            <tr>
                <th>id barang</th>
                <th>nama barang</th>
                <th>stok barang</th>
                <th>deks barang</th>
            </tr>

            <tr>
            @foreach($Jbarang->JenisBarang as $jenis)
    <th>{{ $jenis->id_barang }}</th>
    @endforeach

               {{-- <th> {{ $data["jenis_barang"]}}</th>
               <th> {{ $data["stok_barang"]}}</th>
               <th> {{ $data["deks_barang"]}}</th> --}}
            </tr>
        </table>
    </div>
    
</body>
</html>