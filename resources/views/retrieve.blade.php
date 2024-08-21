<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail dalam Detail</title>
</head>
<body>

    <div class="data-appear">
        <table border="1">
            <tr>
                <th>id barang</th>
                <th>nama barang</th>
                <th>stok barang</th>
                <th>deks barang</th>
            </tr>

            <tr>
                @foreach($barang as $p)
                <th><a href="/{{ $p->id_barang}}">{{  $p['nama_barang'] }}</a></th>
              
                @endforeach
            </tr>
        </table>
    </div>
    
</body>
</html>