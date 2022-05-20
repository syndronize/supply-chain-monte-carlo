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
    <title>Sales</title>
</head>
<body onload="window.print()">
<div class="container my-5">
		<center>
			<h3>Laporan Sales</h3>
		</center>
		<br/>
		<table class="table table-bordered"  border="1"  >
			<thead>
				<tr>
                    <th>No.</th>
                    <th>Nama Sales</th>
                    <th>No. HP</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Tanggal Order</th>
				</tr>
			</thead>
			<tbody>
            @foreach ($cetak as $no=>$cetak )
                <tr align="center">
                    <td>{{$no + 1}}</td>
                    <td>{{$cetak->nm_sales}}</td>
                    <td>{{$cetak->no_hp}}</td>
                    <td>{{$cetak->nm_produk}}</td>
                    <td>{{$cetak->jumlah}}</td>
                    <td>{{$cetak->tgl_order}}</td>
                </tr>
            @endforeach
			</tbody>
		</table>
 
	</div>
</body>
</html>