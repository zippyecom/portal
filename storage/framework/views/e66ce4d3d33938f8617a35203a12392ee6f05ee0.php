
<?php $__env->startSection('title', 'All operations'); ?>

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
<h3>All Operations</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Operations</h5>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Role</th>
                         <th>Actions</th>
                      </tr>
                   </thead>
                   <tbody>
                    <?php $__currentLoopData = $operations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <th><?php echo e($operation->id); ?></th>
                        <td><?php echo e($operation->name); ?></td>
                        <td><?php echo e($operation->email); ?></td>
                        <td><?php echo e($operation->getRoleNames()->implode(' ')); ?></td>
                        <td>
                           <a data-toggle="modal" href="#editModal<?php echo e($operation->id); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil btn-action"></i></button></a>

                           
                           <div class="modal fade" id="editModal<?php echo e($operation->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">Edit Operation</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form class="theme-form" method="POST" action="<?php echo e(route('operation.update', $operation->id)); ?>">
                                       <div class="modal-body">
                                          <?php echo csrf_field(); ?>
                                          <div class="form-group">
                                             <label class="col-form-label">Name</label>
                                             <input class="form-control" type="text" name="name" value="<?php echo e($operation->name); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Email</label>
                                             <input class="form-control" type="email" name="email" value="<?php echo e($operation->email); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">CNIC</label>
                                             <input class="form-control" type="text" name="cnic" value="<?php echo e($operation->cnic); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">City</label>
                                             <input class="form-control" type="text" name="city" value="<?php echo e($operation->city); ?>">
                                          </div>
                                          
                                       </div>
                                       <div class="modal-footer">
                                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                          <button class="btn btn-primary" type="submit">Update</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           


                           <a data-toggle="modal" href="#deleteModal<?php echo e($operation->id); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                           
                           <div class="modal fade" id="deleteModal<?php echo e($operation->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Delete operation</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">Are you sure you want to delete this operation?</div>
                                    <div class="modal-footer">
                                       <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                       <a href="<?php echo e(url('operation/delete/'.$operation->id)); ?>">
                                       <button class="btn btn-secondary" type="button">Delete</button>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                          <!-- modal -->
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                   </tbody>
                </table>
             </div>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Zippy\resources\views/admin/operation/index.blade.php ENDPATH**/ ?>