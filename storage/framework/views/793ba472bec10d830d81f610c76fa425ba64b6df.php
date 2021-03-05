
<?php $__env->startSection('title', 'Notifications'); ?>

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
   </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Notifications</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex align-itmes-center">
            <h5 class="mr-auto">Notifications</h5> 
          </div>
          <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="card-body">

            <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
              <?php $__currentLoopData = $admin_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-light dark" role="alert">
                  <a href="<?php echo e($notification->link); ?>"><?php echo e($notification->notification_text); ?></a>
                  <?php if($notification->isRead == 1): ?>
                  <div class="badge badge-success">Read</div>
                  <?php endif; ?>
                  <span class="pull-right"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
              <?php $__currentLoopData = $customer_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-light dark" role="alert">
                  <a href="<?php echo e($notification->link); ?>"><?php echo e($notification->notification_text); ?></a>
                  <?php if($notification->isRead == 1): ?>
                  <div class="badge badge-success">Read</div>
                  <?php endif; ?>
                  <span class="pull-right"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/admin/all-notifications.blade.php ENDPATH**/ ?>