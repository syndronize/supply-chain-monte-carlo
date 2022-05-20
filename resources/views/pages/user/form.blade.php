@extends('layout.app')
@section('content')

<title>Form User - Kasir Praziqmart</title>

<div class="col-md-12 my-3">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Form User - Kasir Praziqmart</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($user) ? route('user.update', $user->id_user) : route('user.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($user))
            @isset($user)
            @method('put')
            @endif
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="nm_user">Nama user</label>
                    <input type="text" class="form-control @error('nm_user') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nm_user') ?? $user->nm_user ?? ''}}" name="nm_user" placeholder="Type Here">
                    @error('nm_user')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- select -->
                        <label for="level_user">Level</label>
                        <div class="form-group">
                            <select class="form-control" name="level_user" required>
                                <option disabled selected value=''>Select</option>
                                <option value="kasir" {{$user->level_user=='kasir' ? 'selected' : ''}}>Kasir</option>
                                <option value="manajer" {{$user->level_user=='manajer' ? 'selected' : ''}}>Manajer
                                </option>
                                <option value="admin" {{$user->level_user=='admin' ? 'selected' : ''}}>Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('pass') {{ 'is-invalid' }} @enderror"
                        name="pass" id="pass" value="{{ old('pass') ?? '' }}">
                    @if (isset($user))
                    <span style="color: red; font-style: italic; font-size: 14px;">* Abaikan jika tidak ingin
                        ganti password</span>
                    @endif
                    @error('pass')
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
