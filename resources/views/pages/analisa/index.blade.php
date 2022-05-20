@extends('layout/app')
@section('content')
<title>Analisa - Kasir Praziqmart</title>

<!-- Main content -->
<section class="content">
    <div class="container-fluid my-3">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
            @if(Session::get('message'))
            <div class="alert alert-success" style="" id="message">
                <strong>{{ session()->get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
            @endif

            <div class="card-header">
                <h3 class="card-title">Analisa - Kasir Praziqmart</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg">
                        
                        <a href="{{route('transaksi.cari')}}" class="btn btn-info" target="_blank">
                            <i class="fa fa-print"></i> Laporan Penjualan
                        </a>
                        <a href="{{route('step2analisa')}}" class="btn btn-light">
                            <i class="fa fa-arrow-right"></i> Next
                        </a>
                    </div>
                </div>
                <table class="table table-bordered table-striped text-center align-center my-3">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Nama Produk</th>
                            <th colspan="13">Banyak Permintaan</th>
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
                            <th>Total</th>
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
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- modal hapus -->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formDelete">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        Yakin Hapus Data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // untuk hapus data
    function mHapus(url) {
        $('#ModalHapus').modal()
        $('#formDelete').attr('action', url);
    }
    </script>
    @if (session()->has('message'))
    <script>
    // $('#message').show();
    setTimeout(function() {
        $('#message').remove();
    }, 3000);
    </script>
    @endif
</section>
@endsection