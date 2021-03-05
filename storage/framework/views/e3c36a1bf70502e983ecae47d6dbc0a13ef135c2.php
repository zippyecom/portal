
<?php $__env->startSection('title', 'BookingForm'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
  i.fa.fa-plus-circle {
    padding-top: 8px;
    color: green;
    font-size: 22px;
    margin-top: 0;
  }
  
  i.fa.fa-minus-circle {
    padding-top: 8px;
    color: red;
    font-size: 22px;
    margin-top: 0;
  }
</style>
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?> -->

<!-- <?php $__env->startSection('breadcrumb-title'); ?>
<h3>Booking Form</h3>
<?php $__env->stopSection(); ?> -->

<?php $__env->startSection('content'); ?>
<div class="container-fluid" style="padding-top: 5%;">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Booking Form</h5>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <div class="card-body">
              <!-- <form class="theme-form" method="POST" action="<?php echo e(route('customer.store')); ?>" enctype="multipart/form-data"> -->
              <!-- <form class="" method="POST" action="" enctype="multipart/form-data"> -->
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group row">
                      <label class="col-form-label col-1">Product</label>
                      <select class="form-control col-md-4" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      
                      <button type="submit" class="btn btn-success  ml-2" style="width: 20%;">CONVERT TO PAY</button>
                      <label class="col-form-label col-1">DATE/TIME</label>
                     
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-lg ">Calculate Rate</button>
                  </div> 
                </div>
              <!-- </form> -->
            </div>
          </div>
        </div>
     </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function(){
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BitsnIO-2\Videos\Zippy\resources\views/admin/customer/bookingform.blade.php ENDPATH**/ ?>