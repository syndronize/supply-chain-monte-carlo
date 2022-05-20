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
            <h3>Laporan Transaksi</h3>
        </center>
        <br />
        <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Total Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cetak as $no=>$cetak )
                @php
                $total += $cetak->total;
                @endphp
                <tr align="center">
                    <td>{{$no + 1}}</td>
                    <td>{{$cetak->id_transaksi}}</td>
                    <td>{{$cetak->tanggal_transaksi}}</td>
                    <td>{{$cetak->total}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="center">Total</td>
                    <td align="center">{{$total}}</td>
                </tr>
            </tfoot>
        </table>

    </div>

</body>


</html>