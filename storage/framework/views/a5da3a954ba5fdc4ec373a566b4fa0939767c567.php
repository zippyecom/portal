<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <?php echo $__env->make('layouts.simple.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldContent('style'); ?>
      <title>Consignment tracking</title>
</head>
<body>
  <div>
    <!-- u-step with icon-->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header align-center">
          <img class="mx-auto d-block" src="<?php echo e(asset('assets/images/zippy/logo.svg')); ?>" height=99 width=270>
        </div>

        
        <div class="card-body">
          <h6 class="mb-4 text-danger">Shipment with CN # <?php echo e($cn); ?> is not found.</h6>
          
          
        </div>
      </div>
    </div>
  </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/shipments/shipment-tracking-nf.blade.php ENDPATH**/ ?>