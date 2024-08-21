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
        <table border="1">
            <tr>
                <th>id barang</th>
                <th>nama barang</th>
                <th>stok barang</th>
                <th>deks barang</th>
            </tr>

            <tr>
               <th> {{ $data["id_barang"]}}</th>
               <th> {{ $data["jenis_barang"]}}</th>
            </tr>
        </table>
    </div>
    
</body>
</html>