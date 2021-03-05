
<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('css'); ?>
<style>
  form {
    width: 50%;
  }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
   <style>
      .btn-action {
         font-size: 16px;
      }
      button.btn {
         padding: 5px 7px;
      }
      form {
         width: 100%;
      }

      .grey-bg {
        background-color: rgb(228, 228, 228) !important;
      }

   </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Profile</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
              <h5>Profile</h5>
          </div>
          <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="card-body">
            <form class="theme-form col-6" method="POST" action="<?php echo e(route('change-password', Auth::user()->id)); ?>">
              <div class="modal-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label class="col-form-label pt-0">Name</label>
                <input type="text" class="form-control grey-bg" name="name" required autofocus placeholder="<?php echo e(Auth::user()->name); ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Email</label>
                    <input type="email" class="form-control grey-bg" name="contact" required autofocus placeholder="<?php echo e(Auth::user()->email); ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">CNIC</label>
                    <input type="text" class="form-control grey-bg" name="email" required autofocus placeholder="<?php echo e(Auth::user()->cnic); ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">City</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="<?php echo e(Auth::user()->city); ?>" disabled>
                </div>
                
                <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
                <div class="form-group">
                    <label class="col-form-label pt-0">Company Name</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="<?php echo e(Auth::user()->company->company_name); ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Phone</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="<?php echo e(Auth::user()->company->phone); ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Company NTN</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="<?php echo e(Auth::user()->company->company_ntn); ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Address</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="<?php echo e(Auth::user()->company->address); ?>" disabled>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <label class="col-form-label pt-0">Change Password</label>
                  <input type="password" class="form-control" name="password" required placeholder="Enter new password">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\resources\views/customer/profile.blade.php ENDPATH**/ ?>