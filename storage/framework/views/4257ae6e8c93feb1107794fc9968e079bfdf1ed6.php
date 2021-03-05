<?php
   $icon = App\Settings::where('name', 'icon')->first()->value;
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Xolo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Xolo admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="/images/logos/<?php echo e($icon); ?>" type="image/x-icon">
      <link rel="shortcut icon"  href="/images/logos/<?php echo e($icon); ?>" type="image/x-icon">
      <title>Zippy <?php echo $__env->yieldContent('title'); ?></title>
      <?php echo $__env->make('layouts.errors.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldContent('style'); ?>
   </head>
   <body>
      <!-- Loader starts-->
      <div class="loader-wrapper">
         <div class="theme-loader"></div>
      </div>
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <div class="page-wrapper compact-wrapper" id="pageWrapper">
         <?php echo $__env->yieldContent('content'); ?>
      </div>
      <?php echo $__env->make('layouts.errors.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
   </body>
</html><?php /**PATH C:\xampp\htdocs\Zippy\resources\views/layouts/errors/master.blade.php ENDPATH**/ ?>