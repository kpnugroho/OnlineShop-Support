@extends('layouts.master')
@section('title', 'OS Support | Scan Resi')
@section('menu', 'SCAN RESI')
@section('content')

<form action="{{route('ScanResi_Store')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
            <!-- <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email address</span> -->
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" aria-describedby="exampleInputPassword1-error">
            <!-- <span id="exampleInputPassword1-error" class="error invalid-feedback">Please provide a password</span> -->
        </div>
        <div class="form-group mb-0">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" aria-describedby="terms-error">
                <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
            </div>
            <!-- <span id="terms-error" class="error invalid-feedback" style="display: inline;">Please accept our terms</span> -->
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection