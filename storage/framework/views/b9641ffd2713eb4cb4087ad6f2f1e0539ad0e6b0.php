
<?php $__env->startSection('title', 'Settings'); ?>

<?php $__env->startSection('css'); ?>
<style>
  form {
    width: 50%;
  }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/tree.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Settings</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Settings</h5>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <div class="card-body">
              <form class="theme-form" method="POST" action="<?php echo e(route('settings.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="col-form-label pt-0">Main Logo</label><br>
                    <input type="file" name="main_logo">
                    <input type="text" name="main_logo_old" value="<?php echo e($main_logo); ?>" hidden>
                </div>

                <div class="form-group">
                    <label class="col-form-label pt-0">Website Icon</label><br>
                    <input type="file" name="icon">
                    <input type="text" name="icon_old" value="<?php echo e($icon); ?>" hidden>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Login Logo</label><br>
                  <input type="file" name="login_logo">
                  <input type="text" name="login_logo_old" value="<?php echo e($login_logo); ?>" hidden>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Footer Left</label>
                  <input type="text" class="form-control" name="footer_left" value="<?php echo e($footer_left); ?>">
                </div>

                <div class="form-group">
                  <label class="col-form-label">Footer Right</label>
                  <input type="text" class="form-control" name="footer_right" value="<?php echo e($footer_right); ?>">
                </div>

                <div class="form-group form-row mt-3 mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Change Settings</button>
                </div>
              </form>
            </div>
          </div>
        </div>
     </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/admin/settings.blade.php ENDPATH**/ ?>