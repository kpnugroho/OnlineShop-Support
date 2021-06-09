@extends('layouts.master')
@section('title', 'OS Support | Change Password')
@section('menu', 'CHANGE PASSWORD')
@section('content')

{!! Form::model($model, [
	'route'=> ['User_Update', $model->user_id],
	'method'=> 'PUT'
]) !!}

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" hidden="true">
                <label for="user_id">ID User</label>
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Enter ID User" value="{{ $model->user_id }}" readonly = "true">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ $model->email }}" readonly = "true">
                @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="no_telp">No Telphone</label>
                <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Enter No Telphone" value="{{ $model->no_telp }}" readonly = "true">
                @error('no_telp')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="password_lama">Password Lama</label>
                <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Enter Password Lama" value="">
                @error('password_lama')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="password_baru">Password Baru</label>
                <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Enter Password Baru" value="">
                @error('password_baru')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror   
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password Baru" value="">
                @error('password_confirmation')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                @if (session('status'))
                    <div class="alert alert-danger">{{ session('status') }}</div>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" id ="btn-submit">Submit</button>

</div>

{!! Form::close() !!}

@endsection