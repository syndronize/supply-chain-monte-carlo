@extends('layout.app')
@section('content')

<title>Form Permintaan - Kasir Praziqmart</title>

<div class="col-md-12 my-3">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form Permintaan - Kasir Praziqmart</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($permintaan) ? route('permintaan.update', $permintaan->id_permintaan) : route('permintaan.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($permintaan))
            @isset($permintaan)
            @method('put')
            @endif
            @endif
            <div class="card-body">
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
                        @if(isset($permintaan))
                        <script>
                        document.getElementById('id_produk').value =
                            '<?php echo $permintaan->id_produk ?>'
                        </script>
                        @endif
                        @error('id_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_permintaan">Total</label>
                    <input type="number" class="form-control @error('total_permintaan') {{ 'is-invalid' }} @enderror"
                        value="{{ old('total_permintaan') ?? $permintaan->total_permintaan ?? ''}}" name="total_permintaan" placeholder="Type Here">
                    @error('total_permintaan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_permintaan">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal_permintaan') {{ 'is-invalid' }} @enderror"
                        value="{{ old('tanggal_permintaan') ?? $permintaan->tanggal_permintaan ?? ''}}" name="tanggal_permintaan" placeholder="Type Here">
                    @error('tanggal_permintaan')
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