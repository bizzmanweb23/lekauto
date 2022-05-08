<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lek Auto</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('asset/images/icons/favicon.ico') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset//fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/asset/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <span style="color: red">{{ session('error') }}</span>
				<form class="login100-form validate-form" id="loginform" action="{{ route('admin.login.store') }}"
                    method="post">
                    @csrf
                    <span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img src="{{ asset('asset/image/logo.png') }}" alt="" class="img-fluid">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                        <div class="input-group-prepend">
                            <span class="text-white input-group-text bg-success" id="basic-addon1"><i
                                    class="ti-user"></i></span>
                        </div>
						<input class="input100 @error('email') is-invalid @enderror" style="margin-top: 24px;" type="text" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
						<span class="focus-input100" data-placeholder="Email"></span>
                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>

				
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('asset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('asset/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('asset/js/main.js') }}"></script>

    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function() {

            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>

</body>
</html>