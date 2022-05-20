@extends('layout.app')
@section('content')

<title>Form Analisa - Kasir Praziqmart</title>

<div class="col-md-12 my-3">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form Analisa - Kasir Praziqmart</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($analisa) ? route('analisa.update', $analisa->id_analisa) : route('analisa.create') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($analisa))
            @isset($analisa)
            @method('put')
            @endif
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="id_produk">Nama Produk</label>
                    <input type="text" class="form-control @error('id_produk') {{ 'is-invalid' }} @enderror"
                        value="{{ old('id_produk') ?? $analisa->id_produk ?? ''}}" name="id_produk"
                        placeholder="Type Here">
                    @error('id_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_prediksi">Tanggal Prediksi</label>
                    <input type="date" class="form-control @error('tgl_prediksi') {{ 'is-invalid' }} @enderror"
                        value="{{ old('tgl_prediksi') ?? $analisa->tgl_prediksi ?? ''}}" name="tgl_prediksi"
                        placeholder="Type Here">
                    @error('tgl_prediksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hasil_analisa">Hasil Analisa</label>
                    <input type="text" class="form-control @error('hasil_analisa') {{ 'is-invalid' }} @enderror"
                        value="{{ old('hasil_analisa') ?? $analisa->hasil_analisa ?? ''}}" name="hasil_analisa"
                        placeholder="Type Here">
                    @error('hasil_analisa')
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