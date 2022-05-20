@extends('layout.app')
@section('content')

<title>Form Produk - Kasir Praziqmart</title>

<div class="col-md-12 my-3">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form Produk - Kasir Praziqmart</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($produk) ? route('produk.update', $produk->id_produk) : route('produk.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($produk))
            @isset($produk)
            @method('put')
            @endif
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="nm_produk">Nama Produk</label>
                    <input type="text" class="form-control @error('nm_produk') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nm_produk') ?? $produk->nm_produk ?? ''}}" name="nm_produk"
                        placeholder="Type Here">
                    @error('nm_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <input type="text" class="form-control @error('jenis') {{ 'is-invalid' }} @enderror"
                        value="{{ old('jenis') ?? $produk->jenis ?? ''}}" name="jenis" placeholder="Type Here">
                    @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') {{ 'is-invalid' }} @enderror"
                        value="{{ old('harga') ?? $produk->harga ?? ''}}" name="harga" placeholder="Type Here">
                    @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control @error('stok') {{ 'is-invalid' }} @enderror"
                        value="{{ old('stok') ?? $produk->stok ?? ''}}" name="stok" placeholder="Type Here">
                    @error('stok')
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