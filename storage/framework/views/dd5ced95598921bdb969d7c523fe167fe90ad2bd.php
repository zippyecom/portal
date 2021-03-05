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
   
   <link rel="icon" type="image/png" href="/images/logos/<?php echo e($icon); ?>"/>
<!--===============================================================================================-->
   
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/vendor/animate/animate.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/vendor/css-hamburgers/hamburgers.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/vendor/animsition/css/animsition.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/vendor/select2/select2.min.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/vendor/daterangepicker/daterangepicker.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/css/util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/Login_v17/css/main.css')); ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter" style="height: 100% !important">
		<div class="container-login100" style="min-height: 100% !important">
			<div class="wrap-login100" style="min-height: 100% !important">
            <form class="login100-form validate-form" method="POST" action="<?php echo e(route('login')); ?>">
               <?php echo csrf_field(); ?>
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
               
               <div class="row w-100" style="margin: 0 !important">
                  <div class="col-12 col-md-6 input-wrap">
                    <input id="email" class="input100 form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" name="email" placeholder="Email" required autocomplete="email">

                     <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                        </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-12 col-md-6 input-wrap">
                     <input class="input100 form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">

                     <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                        </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
               
               

					
					
					
               

               <div class="mb-0 container-login100-form-btn">
                  <button type="submit" class="login100-form-btn" style="margin: 0 15px;">
                     Login
                  </button>

                  <?php if(Route::has('password.request')): ?>
                     <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('Forgot Your Password?')); ?>

                     </a>
                  <?php endif; ?>
              </div>

					

				</form>

				<div class="login100-more bg-img-class"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/Login_v17/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/Login_v17/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/Login_v17/vendor/bootstrap/js/popper.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/Login_v17/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/Login_v17/vendor/select2/select2.min.js')); ?>"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/Login_v17/vendor/daterangepicker/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/Login_v17/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/Login_v17/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/Login_v17/js/main.js')); ?>"></script>

</body>
</html>

<?php 
 //  $login_logo = App\Settings::where('name', 'login_logo')->first()->value;
 ?>


<?php /**PATH C:\Users\BitsnIO-2\Videos\Zippy\resources\views/auth/login.blade.php ENDPATH**/ ?>