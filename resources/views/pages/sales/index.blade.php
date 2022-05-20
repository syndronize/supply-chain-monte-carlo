@extends('layout/app')
@section('content')
<title>Sales - Kasir Praziqmart</title>

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
                <h3 class="card-title">Sales - Kasir Praziqmart</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{route('sales.create', '0')}}" class="btn btn-success"><i class="fas fa-plus"></i>
                    Sales</a>
                <a href="{{route('sales.cetak')}}" class="btn btn-info" target="_blank"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Nama Sales</th>
                        <th>No. HP</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tanggal Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $no=>$sales )
                    <tr align="center">
                        <td>{{$no + 1}}</td>
                        <td>{{$sales->nm_sales}}</td>
                        <td>{{$sales->no_hp}}</td>
                        <td>{{$sales->nm_produk}}</td>
                        <td>{{$sales->jumlah}}</td>
                        <td>{{$sales->tgl_order}}</td>
                        <td>
                            <a href="{{ route('sales.edit', $sales->id_invoice) }}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <a onclick="return confirm('Are You Sure ?')"
                                href="{{ route('sales.delete', $sales->id_invoice) }}" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i></a>
                        </td>
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