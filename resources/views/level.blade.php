<!DOCTYPE html>
<html>
    <head>
        <title> Data Level Pengguna</title>
    </head>
    <body>
        <h1> Data Level Pengguna </h1>
        <table border="1" cellpadding="2" cellspacing ="0">
            <tr>
                <td>ID</td>
                <tb>Kode Level</tb>
                <tb>Nama Level</tb>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d -> level_id}}</td>
                <td>{{ $d -> level_kode}}</td>
                <td>{{ $d -> level_nama}}</td>
            </tr>       
            @endforeach
        </table>
    </body>
</html>     