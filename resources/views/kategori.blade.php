<!DOCTYPE html>
<html>
    <head>
        <title> Data Kategori Pengguna</title>
    </head>
    <body>
        <h1> Data Kategori Pengguna </h1>
        <table border="1" cellpadding="2" cellspacing ="0">
            <tr>
                <td>ID</td>
                <tb>Kode Kategori</tb>
                <tb>Nama Kategori</tb>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d -> kategori_id}}</td>
                <td>{{ $d -> kategori_kode}}</td>
                <td>{{ $d -> kategori_nama}}</td>
            </tr>       
            @endforeach
        </table>
    </body>
</html>   