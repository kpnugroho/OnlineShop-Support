<!DOCTYPE html>
<html>
<head>
	<title>OS Support - Login</title>
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>
<body>
	<form action="/home" method="post">
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-sm-7 col-9" id="form-login">
					<div class="form-group">
                        <img src="/images/shopping-chart-image.jpg" alt="onlineshop-support-image" width="100" height="100">
                        
                        <h5>ONLINESHOP SUPPORT</h5>

                        <input type="text" name="noTelp" id="noTelp" value="{{ old('noTelp') }}" class="form-control @error('noTelp') is-invalid @enderror" placeholder="No Telphone">
                        <!-- tampilkan error required no telp dari proses validate di controller -->
                        @error('noTelp')<div class="invalid-feedback">{{ $message }}</div>@enderror                 
						
						<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <!-- tampilkan error required password dari proses validate di controller -->
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>
						@enderror					
					</div>

                    <!-- tampilkan error value dari session status -->
					@if (session('status'))
						<div class="alert alert-danger">{{ session('status') }}</div>
					@endif

					<button type="submit" name="submit" id="submit" class="btn btn-danger mt-2">LOGIN</button>

                    <div class="register">
                        <a href="/user/register">Create an Account</a>
					</div>

					<div class="copyright">
						<label><i>&copy; 2020 - OS Support by Project Plus</i></label>
					</div>
				</div>
			</div>
		</div>
	</form>
<script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</body>
</html>