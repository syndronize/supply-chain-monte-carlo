@extends('layout.app')
@section('content')

<title>Form Transaksi - Kasir Praziqmart</title>

<div class="col-md-12 my-3">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form Transaksi - Kasir Praziqmart</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('temp.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="col">
                        <div class="row">
                            <div class="form-group  col-md-12">
                                <label>Nama Produk</label>
                                <select name="id_produk" id="id_produk"
                                    class="form-control @error('id_produk') {{ 'is-invalid' }} @enderror">
                                    <option value="">Select</option>
                                    @foreach($produk as $no => $produk)
                                    <option value="{{ $produk->id_produk }}">
                                        {{ $produk->nm_produk}}</option>
                                    @endforeach
                                </select>
                                @if(isset($sales))
                                <script>
                                document.getElementById('id_produk').value =
                                    '<?php echo $sales->id_produk ?>'
                                </script>
                                @endif
                                @error('id_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') {{ 'is-invalid' }} @enderror"
                            name="jumlah" placeholder="Type Here">
                        @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="harga">Harga</label>
                        <input type="text" id="harga" class="form-control @error('harga') {{ 'is-invalid' }} @enderror"
                            name="harga" placeholder="Type Here">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr align="center">
                <th>No.</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temp as $no=>$temp )
            <tr align="center">
                <td>{{$no + 1}}</td>
                <td>{{$temp->nm_produk}}</td>
                <td>{{$temp->harga}}</td>
                <td>{{$temp->jumlah}}</td>
                <td>{{$temp->total}}</td>
                <td>
                    <a href="{{ route('temp.delete',$temp->id_temp) }}" class="btn btn-danger btn-sm"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <form action="{{route('transaksi.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <label for="uang">Total Uang</label>
                    <input type="text" class="form-control" id="uang" placeholder="Type Here">
                </div>
                <div class="col">
                    <label for="total">Total Pembayaran Rp.</label>
                    <input type="text" value="{{$temp1[0]->total}}" class="form-control" id="total"
                        placeholder="Type Here" disabled>
                </div>
                <div class="col">
                    <label for="total">Kembalian</label>
                    <input type="text" value="" class="form-control" id="kembalian"
                        placeholder="Type Here">
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </form>
    <!-- /.card -->
</div>

<script>
$(document).on('change', '#id_produk', function(e) {

    $.ajax({
        type: "POST",
        url: "{{ route('transaksi.detail')}}",
        data: {
            id_produk: $('#id_produk').val(),
            _token: "{{ csrf_token() }}"
        },
        dataType: "JSON",
        success: function(data) {
            var harga = data.data.harga;
            document.getElementById('harga').value = harga;
        }
    });
});

$(document).on('keyup','#uang',function(e){
    var total = document.getElementById('total').value;
    var uang = document.getElementById('uang').value;
    var kembalian = uang - total;
    document.getElementById('kembalian').value = kembalian;
    
});


</script>
@endsection