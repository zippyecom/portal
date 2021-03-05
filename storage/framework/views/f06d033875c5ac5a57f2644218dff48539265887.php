
<?php $__env->startSection('title', 'Shipments'); ?>

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
<h3>Delivered Shipments</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
           <h5>Delivered Shipments list</h5>
          </div>
          <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                         <th scope="col">Consignment No.</th>
                         <th scope="col">User Name</th>
                         <th scope="col">Company</th>
                         <th scope="col">Destination City</th>
                         <th scope="col">Service Type</th>
                         <th scope="col">Pickup Address</th>
                         <th scope="col">Product Value</th>  
                         <th scope="col">Actions</th>                      
                      </tr>
                   </thead>
                   <tbody>
                    <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($shipment->id); ?>

                      <tr>
                        <th scope="row"><?php echo e($shipment->consignment_no); ?></th>
                        <td><?php echo e($shipment->user->name); ?></td>
                        <td><?php echo e($shipment->user->company->company_name); ?></td>
                        <td><?php echo e($shipment->destination_city); ?></td>
                        <td><span class="badge badge-primary"><?php echo e($shipment->service_type); ?></span></td>
                        <td><?php echo e($shipment->pickup_location); ?></td>
                        <td><?php echo e($shipment->product_value); ?></td>
                        <td>
                          <a data-toggle="modal" href="#viewModal<?php echo e($shipment->id); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-eye btn-action"></i></button></a>

                          
                          <div class="modal fade" id="viewModal<?php echo e($shipment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Shipment Details</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                  <table class="table table-striped">
                                    <tr>
                                      <th scope="col">Consignment No.</th>
                                      <td><?php echo e($shipment->consignment_no); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Customer Name</th>
                                      <td><?php echo e($shipment->customer_name); ?></td>
                                    </tr><tr>
                                      <th scope="col">Customer Address</th>
                                      <td><?php echo e($shipment->customer_address); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Customer Email</th>
                                      <td><?php echo e($shipment->customer_email); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Customer Phone</th>
                                      <td><?php echo e($shipment->customer_phone); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Destination City</th>
                                      <td><?php echo e($shipment->destination_city); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Service Type</th>
                                      <td><?php echo e($shipment->service_type); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Timebound Date</th>
                                      <td><?php echo e($shipment->tb_date); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Timebound Time</th>
                                      <td><?php echo e($shipment->tb_time); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Pickup Address</th>
                                      <td><?php echo e($shipment->pickup_location); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Product Name</th>
                                      <td><?php echo e($shipment->product_name); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Quantity</th>
                                      <td><?php echo e($shipment->quantity); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Weight</th>
                                      <td><?php echo e($shipment->weights->weight); ?></td>     
                                    </tr>
                                    <tr>
                                      <th scope="col">Product Value</th>
                                      <td><?php echo e($shipment->product_value); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Product Reference</th>
                                      <td><?php echo e($shipment->product_reference); ?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Remarks</th>
                                      <td><?php echo e($shipment->remarks); ?></td>
                                    </tr>
                                  </table>

                                  <h5 class="mt-3">Tracking For: <?php echo e($shipment->consignment_no); ?></h5>
                                  <?php $__currentLoopData = $shipment->tracking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tracking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($tracking->created_at); ?> - <?php echo e($tracking->description); ?></p>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- View modal end-->

                          <a data-toggle="modal" href="#editModal<?php echo e($shipment->id); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil btn-action"></i></button></a>

                          
                          <div class="modal fade" id="editModal<?php echo e($shipment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title">Edit Shipment</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <form class="theme-form" method="POST" action="<?php echo e(route('shipments.update', $shipment->id)); ?>">
                                      <div class="modal-body">
                                         <?php echo csrf_field(); ?>
                                         <div class="form-group">
                                            <label class="col-form-label">Weights</label>
                                            <select name="weight" id="" class="form-control">
                                              <?php $__currentLoopData = $shipment->user->weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($w->id); ?>" <?php echo e($w->id == $shipment->weight? "selected": ""); ?>><?php echo e($w->weight); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-form-label">Product Value</label>
                                            <input class="form-control" type="number" name="product_value" value="<?php echo e($shipment->product_value); ?>">
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
                          


                          <a data-toggle="modal" href="#deleteModal<?php echo e($shipment->id); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                          
                          <div class="modal fade" id="deleteModal<?php echo e($shipment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Shipment</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <div class="modal-body">Are you sure you want to delete this shipment?</div>
                                   <div class="modal-footer">
                                      <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                      <a href="<?php echo e(url('shipment/delete/'.$shipment->id)); ?>">
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Zippy\resources\views/shipments/delivered-shipments.blade.php ENDPATH**/ ?>