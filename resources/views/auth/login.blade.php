<?php 
 $icon = App\Settings::where('name', 'icon')->first()->value;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
               @csrf
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
               
               <div class="row w-100" style="margin: 0 !important">
                  <div class="col-12 col-md-6 input-wrap">
                    <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required autocomplete="email">

                     @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-12 col-md-6 input-wrap">
                     <input class="input100 form-control @error('email') is-invalid @enderror" type="password" id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">

                     @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                </div>
               
               {{-- <div class="input-wrap">
                  <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required autocomplete="email">

                  @error('email')
                     <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>

               <div class="input-wrap">
                  <input class="input100 form-control @error('email') is-invalid @enderror" type="password" id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">

                  @error('password')
                     <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div> --}}

					{{-- <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                  <input id="first-name email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required autocomplete="email">

                  <span class="focus-input100"></span>
                  @error('email')
                     <span class="invalid-feedback" role="alert" style="padding: 0 25px;">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" id="password" type="password" name="password" placeholder="Password" required>
                  <span class="focus-input100"></span>
					</div> --}}
					
					{{-- <div class="container-login100-form-btn">
						<button class="login100-form-btn" style="margin: 0 15px;">
							Sign in
						</button>
               </div> --}}
               

               <div class="mb-0 container-login100-form-btn">
                  <button type="submit" class="login100-form-btn" style="margin: 0 15px;">
                     Login
                  </button>

                  @if (Route::has('password.request'))
                     <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                     </a>
                  @endif
              </div>

					{{-- <div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="{{ route('password.request') }}" class="txt2">
						   Password?
						</a>
					</div> --}}

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

<?php 
 //  $login_logo = App\Settings::where('name', 'login_logo')->first()->value;
 ?>
{{-- 
@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')

@endsection

@section('style')
<style>
   .auth-bg-video {
      background-color: rgba(236, 98, 0, 0.233) !important;
   }
   .btn-primary {
      background-color: #ec6400 !important;
      border-color: #ec6400 !important;
   }
</style>
@endsection

@section('content')
<div class="page-wrapper">
   <div class="page-wrapper">
      <div class="container-fluid p-0">
         <!-- login page with video background start-->
         <div class="auth-bg-video">
            <video id="bgvid" poster="{{asset('assets/images/other-images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
               <source src="{{asset('assets/video/auth-bg.mp4')}}" type="video/mp4">
            </video>
            <div class="authentication-box">
               <div class="mt-4">
                  <div class="card-body">
                     <div class="cont text-center">
                        <div>
                           <form class="theme-form" method="POST" action="{{ route('login') }}">
                              @csrf
                              <a href="{{route('/')}}"><img class="mb-4" width="200px" height="40" src="/storage/logos/{{$login_logo}}" alt=""></a>
                              <div class="form-group">
                                 <label class="col-form-label pt-0">Email</label>
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                 <label class="col-form-label">Password</label>
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>

                              <div class="form-group form-row mt-3 mb-0">
                                 <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- login page with video background end-->
      </div>
   </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/login.js')}}"></script>
@endsection --}}

