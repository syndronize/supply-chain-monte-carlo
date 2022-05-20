@extends('layout.app')
@section('content')

<title>Form Sales - Kasir Praziqmart</title>

<div class="col-md-12 my-3">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form Sales - Kasir Praziqmart</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($sales) ? route('sales.update', $sales->id_invoice) : route('sales.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($sales))
            @isset($sales)
            @method('put')
            @endif
            @endif
            <div class="card-body">

                <div class="form-group">
                    <label for="nm_sales">Nama Sales</label>
                    <input type="text" class="form-control @error('nm_sales') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nm_sales') ?? $sales->nm_sales ?? ''}}" name="nm_sales" placeholder="Type Here">
                    @error('nm_sales')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">No. HP</label>
                    <input type="text" class="form-control @error('no_hp') {{ 'is-invalid' }} @enderror"
                        value="{{ old('no_hp') ?? $sales->no_hp ?? ''}}" name="no_hp" placeholder="Type Here">
                    @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
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
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control @error('jumlah') {{ 'is-invalid' }} @enderror"
                        value="{{ old('jumlah') ?? $sales->jumlah ?? ''}}" name="jumlah" placeholder="Type Here">
                    @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" class="form-control @error('total') {{ 'is-invalid' }} @enderror"
                        value="{{ old('total') ?? $sales->total ?? ''}}" name="total" placeholder="Type Here">
                    @error('total')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_order">Tanggal Order</label>
                    <input type="date" class="form-control @error('tgl_order') {{ 'is-invalid' }} @enderror"
                        value="{{ old('tgl_order') ?? $sales->tgl_order ?? ''}}" name="tgl_order" placeholder="Type Here">
                    @error('tgl_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection