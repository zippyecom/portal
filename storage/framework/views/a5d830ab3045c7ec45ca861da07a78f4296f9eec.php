<?php if(session()->has('success')): ?>
    <div class="alert alert-success dark alert-dismissible fade show" role="alert"><?php echo e(session()->get('success')); ?>

        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><?php echo e(session()->get('error')); ?>

        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/layouts/messages.blade.php ENDPATH**/ ?>