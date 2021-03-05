
<?php $__env->startSection('title', 'Create Customer'); ?>

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

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Create Customer</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Create Customer</h5>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <div class="card-body">
              <form class="theme-form" method="POST" action="<?php echo e(route('customer.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label class="col-form-label pt-0">Contact Name</label>
                  <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                  <?php $__errorArgs = ['name'];
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

                <div class="form-group">
                  <label class="col-form-label pt-0">Company Email Address</label>
                  <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

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

                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

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

                <div class="form-group">
                  <label class="col-form-label">CNIC</label>
                  <input type="text" class="form-control" name="cnic" value="<?php echo e(old('cnic')); ?>" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">City</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city" value="<?php echo e(old('city')); ?>">

                  <?php $__errorArgs = ['city'];
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

                <div class="form-group">
                  <label class="col-form-label">Comapny Name</label>
                  <input type="text" class="form-control" name="company_name" value="<?php echo e(old('company_name')); ?>" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Company NTN</label>
                  <input type="text" class="form-control" name="company_ntn" value="<?php echo e(old('company_ntn')); ?>">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Company Address</label>
                  <input type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Pickup Address</label>
                  <input type="text" class="form-control" name="pick_address" value="<?php echo e(old('pick_address')); ?>" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Logo</label><br>
                  <input type="file" name="logo">
                </div>

                <div class="weight-inputs">
                  <div class="form-row">
                    <div class="col-3">
                      <input type="text" class="form-control" name="weight[]" placeholder="Weight">
                    </div>
                    <div class="col-3">
                      <input type="number" class="form-control" name="price[]" placeholder="Price">
                    </div>
                    <div class="col-3">
                      <input type="number" class="form-control" name="tb_price[]" placeholder="Timebound Price">
                    </div>
                    <div class="col-1">
                      <a href="javascript:void(0)" id="add"><i class="fa fa-plus-circle"></i></a>
                    </div>
                  </div>
                </div>

                <input type="hidden" id="hiddenVal" name="input" value="0">

                <div class="form-group form-row mt-3 mb-0">
                  <button class="btn btn-primary btn-block" type="submit">Create Customer</button>
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
<script>
  $(document).ready(function(){
    var wrapper = $(".weight-inputs"); //Fields wrapper
      $("#add").click(function(e){
        var counter = parseInt($("#hiddenVal").val());
        counter++;
        $("#hiddenVal").val(counter);

        e.preventDefault();
        $(wrapper).append(`
          <div class="form-row mt-2">
            <div class="col-3">
              <input type="text" class="form-control" name="weight[]" placeholder="Weight">
            </div>
            <div class="col-3">
              <input type="number" class="form-control" name="price[]" placeholder="Price">
            </div>
            <div class="col-3">
              <input type="number" class="form-control" name="tb_price[]" placeholder="Timebound Price">
            </div>
            <div class="col-1">
              <a href="javascript:void(0)" id="sub"><i class="fa fa-minus-circle"></i></a>
            </div>
          </div>
        `);
      });
      $(wrapper).on("click", "a#sub" , function(e) {
        var counter = parseInt($("#hiddenVal").val());
        counter--;
        $("#hiddenVal").val(counter);
        e.preventDefault();  $(this).parent().parent().remove();
      }); 
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BitsnIO-2\Videos\Zippy\resources\views/admin/customer/create.blade.php ENDPATH**/ ?>