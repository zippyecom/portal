
<?php $__env->startSection('title', 'All Customers'); ?>

<?php $__env->startSection('css'); ?>
<style>
  
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
<h3>All Customer</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>customers</h5>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                         <th scope="col">Id</th>
                         <th scope="col">Name</th>
                         <th scope="col">Email</th>
                         <th scope="col">Company</th>
                         <th scope="col">Actions</th>
                      </tr>
                   </thead>
                   <tbody>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <th scope="row"><?php echo e($customer->id); ?></th>
                        <td><?php echo e($customer->name); ?></td>
                        <td><?php echo e($customer->email); ?></td>
                        
                        <td><?php echo e($customer->company->company_name); ?></td>
                        <td>
                           <a data-toggle="modal" href="#editModal<?php echo e($customer->id); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil btn-action"></i></button></a>

                           
                           <div class="modal fade" id="editModal<?php echo e($customer->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">Edit Customer</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form class="theme-form" method="POST" action="<?php echo e(route('customer.update', $customer->id)); ?>">
                                       <div class="modal-body">
                                          <?php echo csrf_field(); ?>
                                          <div class="form-group">
                                             <label class="col-form-label">Contact Name</label>
                                             <input class="form-control" type="text" name="name" value="<?php echo e($customer->name); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Company Email Address</label>
                                             <input class="form-control" type="email" name="email" value="<?php echo e($customer->email); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">CNIC</label>
                                             <input class="form-control" type="text" name="cnic" value="<?php echo e($customer->cnic); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">City</label>
                                             <input class="form-control" type="text" name="city" value="<?php echo e($customer->city); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Company Name</label>
                                             <input class="form-control" type="text" name="company_name" value="<?php echo e($customer->company->company_name); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Phone</label>
                                             <input class="form-control" type="text" name="phone" value="<?php echo e($customer->company->phone); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Company NTN</label>
                                             <input class="form-control" type="text" name="company_ntn" value="<?php echo e($customer->company->company_ntn); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Address</label>
                                             <input class="form-control" type="text" name="address" value="<?php echo e($customer->company->address); ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Logo</label>
                                             <input class="form-control" type="file" name="logo">
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
                           


                           <a data-toggle="modal" href="#deleteModal<?php echo e($customer->id); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                           
                           <div class="modal fade" id="deleteModal<?php echo e($customer->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">Are you sure you want to delete this customer?</div>
                                    <div class="modal-footer">
                                       <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                       <a href="<?php echo e(url('customer/delete/'.$customer->id)); ?>">
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BitsnIO-2\Videos\Zippy\resources\views/admin/customer/index.blade.php ENDPATH**/ ?>