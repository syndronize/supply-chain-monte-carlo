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
                        <a href="{{route('step4analisa')}}" class="btn btn-light"><i class="fa fa-arrow-left"></i>
                            Previous</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped text-center align-center my-3">
                    <thead>
                        <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>Produk</th>
                                <th>Simulasi Angka Acak</th>
                                <th>Hasil Produk</th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <!-- Untuk data range -->
                    @php
                        $x= 1;
                    @endphp
                    @foreach($data as $key => $item)
                    
                        @php
                        $totalProb = 0;
                        $start = 1;
                        $interval=[];
                        @endphp
                        
                        @foreach($item['x'] as $i => $value)
                        
                            @php
                            $strInt = 0;
                            
                                    $strInt = $start."-".number_format($value + $totalProb);
                                    if($i != 12){
                                        if($item['x'][$i+1] != 0){
                                            $start = number_format($value + $totalProb) + 1;
                                        }
                                    }
                                    $interval[] = $strInt;
                            @endphp
                            @php
                            if($i != 12){
                                $totalProb += $value;
                            }
                            @endphp
                        @endforeach
                    @endforeach

                    <!-- untuk data random -->
                    @php
                    $nilaiarray = [];
                    @endphp
                    @foreach ($data as $key => $randoms )
                        @php 
                            $random = rand(1,99);
                            $range = array_unique($interval);
                            foreach($range as $no => $nilai){
                                $pecah = explode('-',$nilai);
                                for($i = $pecah[0]; $i <= $pecah[1]; $i++){
                                    if($random == $i){
                                        $x = $randoms['detail'][$no+1];
                                    }
                                }
                            }
                        @endphp
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$randoms['nm_produk']}}</td>
                            <td>{{$random}}</td>
                            <td>{{$x}}</td>
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