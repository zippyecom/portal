
<?php $__env->startSection('title', 'Pickup Locations'); ?>

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
<h3>Pickup Locations</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Pickup Locations List</h5>
              <button class="btn btn-primary ml-auto" data-toggle="modal" href="#addPickup">Add Pickup Location</button> 
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

           
           <div class="modal fade" id="addPickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Pickup Location</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="theme-form" method="POST" action="<?php echo e(route('location')); ?>">
                  <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                      <label class="col-form-label pt-0">Pickup Person Name</label>
                      <input type="text" class="form-control" name="name" required autofocus placeholder="Enter Pickup Person Name">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Pickup Person Contact No.</label>
                        <input type="number" class="form-control" name="contact" required autofocus placeholder="Enter Pickup Person Contact No.">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Pickup Person Email</label>
                        <input type="email" class="form-control" name="email" required autofocus placeholder="Enter Pickup Person Email">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Address</label>
                        <input id="newAddress" type="text" class="form-control" name="pickup_address" required autofocus placeholder="Enter Pickup Address">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add Pickup</button>
                  </div>
                </form>
               </div>
              </div>
            </div>
            

            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                         <th scope="col">Id</th>
                         <th scope="col">Name</th>
                         <th scope="col">Contact No.</th>
                         <th scope="col">Email</th>
                         <th scope="col">Origin</th>
                         <th scope="col">Pickup Address</th> 
                         <th scope="col">Actions</th>                      
                      </tr>
                   </thead>
                   <tbody>
                    <?php $__currentLoopData = $pickups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pickup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($pickup->id); ?></td>
                        <td><?php echo e($pickup->name); ?></td>
                        <td><?php echo e($pickup->contact); ?></td>
                        <td><?php echo e($pickup->email); ?></td>
                        <td><?php echo e($pickup->origin_city); ?></td>
                        <td><?php echo e($pickup->pickup_address); ?></td>
                        <td>
                          <a data-toggle="modal" href="#editModal<?php echo e($pickup->id); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil btn-action"></i></button></a>

                          
                          <div class="modal fade" id="editModal<?php echo e($pickup->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title">Edit Pickup Location</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <form class="theme-form" method="POST" action="<?php echo e(route('pickups.update', $pickup->id)); ?>">
                                      <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                          <label class="col-form-label pt-0">Pickup Person Name</label>
                                          <input type="text" class="form-control" name="name" value="<?php echo e($pickup->name); ?>" required autofocus placeholder="Enter Pickup Person Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Pickup Person Contact No.</label>
                                            <input type="number" class="form-control" name="contact" value="<?php echo e($pickup->contact); ?>" required autofocus placeholder="Enter Pickup Person Contact No.">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Pickup Person Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo e($pickup->email); ?>" required autofocus placeholder="Enter Pickup Person Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Address</label>
                                            <input id="newAddress" type="text" class="form-control" name="pickup_address" value="<?php echo e($pickup->pickup_address); ?>" required autofocus placeholder="Enter Pickup Address">
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
                          


                          <a data-toggle="modal" href="#deleteModal<?php echo e($pickup->id); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                          
                          <div class="modal fade" id="deleteModal<?php echo e($pickup->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Pickup Location</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <div class="modal-body">Are you sure you want to delete this Pickup Location?</div>
                                   <div class="modal-footer">
                                      <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                      <a href="<?php echo e(route('pickups.delete',$pickup->id)); ?>">
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Zippy\resources\views/customer/pickups/index.blade.php ENDPATH**/ ?>