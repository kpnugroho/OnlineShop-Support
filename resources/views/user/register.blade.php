<!DOCTYPE html>
<html>
<head>
	<title>OS Support - Register</title>
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>
<body>
	<form action="/user/store" method="post">
		@csrf
		<div class="container">
			<div class="row register">
				<div class="col-lg-5 col-sm-7 col-9" id="form-login">
					<div class="form-group">
                        
                        <h5>REGISTRASI ACCOUNT</h5>

                        <input type="text" name="namaDepan" id="namaDepan" value="{{ old('namaDepan') }}" class="form-control @error('namaDepan') is-invalid @enderror" placeholder="Nama Depan">
                        @error('namaDepan')<div class="invalid-feedback">{{ $message }}</div>@enderror   

                        <input type="text" name="namaBelakang" id="namaBelakang" value="{{ old('namaBelakang') }}" class="form-control @error('namaBelakang') is-invalid @enderror" placeholder="Nama Belakang">
                        @error('namaBelakang')<div class="invalid-feedback">{{ $message }}</div>@enderror   

                        <input type="text" name="noTelp" id="noTelp" value="{{ old('noTelp') }}" class="form-control @error('noTelp') is-invalid @enderror" placeholder="No Telphone">
                        @error('noTelp')<div class="invalid-feedback">{{ $message }}</div>@enderror      
                        
                        <input type="text" name="noWa" id="noWa" value="{{ old('noWa') }}" class="form-control @error('noWa') is-invalid @enderror" placeholder="No Whatsapp">
                        @error('noWa')<div class="invalid-feedback">{{ $message }}</div>@enderror 

                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror 
						
						<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>
						@enderror					
					</div>

                    <!-- tampilkan error value dari session status -->
					@if (session('status'))
						<div class="alert alert-danger">{{ session('status') }}</div>
					@endif

					<button type="submit" name="submit" id="submit" class="btn btn-danger mt-2">REGISTER</button>

                    <div class="register">
                        <a href="/">Back to Login</a>
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