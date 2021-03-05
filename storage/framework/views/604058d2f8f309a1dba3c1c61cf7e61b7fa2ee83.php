<?php $__env->startSection('title', '- error-403'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- error-403 start-->
<div class="error-wrapper">
  <div class="container">
    <img class="img-100" src="<?php echo e(asset('assets/images/other-images/sad.png')); ?>" alt="">
    <div class="error-heading">
      <h2 class="headline font-success">403</h2>
    </div>
    <div class="col-md-8 offset-md-2">
      <p class="sub-content">The page you are attempting to reach is currently not available. This may be because you do not have permission to access the page or has been moved.</p>
    </div>
    <div><a class="btn btn-success-gradien btn-lg" href="<?php echo e(route('/')); ?>">BACK TO HOME PAGE</a></div>
  </div>
</div>
<!-- error-403 end-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.errors.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/errors/403.blade.php ENDPATH**/ ?>