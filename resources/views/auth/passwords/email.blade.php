<?php 
 $icon = App\Settings::where('name', 'icon')->first()->value;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
   {{-- <link rel="icon" type="image/png" href="{{asset('assets/Login_v17/images/icons/favicon.ico')}}"/> --}}
   <link rel="icon" type="image/png" href="/images/logos/{{$icon}}"/>
<!--===============================================================================================-->
   {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/vendor/bootstrap/css/bootstrap.min.css')}}"> --}}
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Login_v17/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter" style="height: 100% !important">
		<div class="container-login100" style="min-height: 100% !important">
			<div class="wrap-login100" style="min-height: 100% !important">
        <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
          @csrf
					<span class="login100-form-title p-b-34">
						Reset Password
					</span>
               
          <div class="row w-100" style="margin: 0 !important">
            <div class="col-12 input-wrap">
              <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required autocomplete="email" autofocus>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
            </div>
          </div>
          
          <div class="mb-0 container-login100-form-btn">
            <button type="submit" class="login100-form-btn" style="margin: 0 15px;">
              Send Password Reset Link
            </button>
          </div>

				</form>

				<div class="login100-more bg-img-class"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('assets/Login_v17/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/Login_v17/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/Login_v17/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/Login_v17/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/Login_v17/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('assets/Login_v17/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('assets/Login_v17/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/Login_v17/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/Login_v17/js/main.js')}}"></script>

</body>
</html>