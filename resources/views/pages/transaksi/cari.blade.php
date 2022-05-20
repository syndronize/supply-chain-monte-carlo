<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
</head>

<body onload="window.print()">

    <div class="container my-5">
        <center>
            <h3>Laporan Penjualan</h3>
        </center>
        <br />
        <table class="table table-bordered text-center align-center " border="1">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Nama Produk</th>
                    <th colspan="12">Banyak Permintaan</th>
                </tr>
                <tr>
                    <th>Januari</th>
                    <th>Februari</th>
                    <th>Maret</th>
                    <th>April</th>
                    <th>Mei</th>
                    <th>Juni</th>
                    <th>Juli</th>
                    <th>Agustus</th>
                    <th>September</th>
                    <th>Oktober</th>
                    <th>November</th>
                    <th>Desember</th>
                </tr>
            </thead>
            <tbody>
                @php
                $x= 1;
                @endphp
                @foreach($data as $key => $item)
                <tr>
                    <td>{{$x ++}}</td>
                    <td>{{$item['nm_produk']}}</td>
                    @foreach($item['detail'] as $i => $value)
                    <td>{{$value}}</td>
                    <td></td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>

    </div>

</body>


</html>