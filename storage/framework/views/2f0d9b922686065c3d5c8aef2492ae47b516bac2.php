
<?php $__env->startSection('title', 'Shipment Record'); ?>

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
         font-size: 15px;
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
<h3>Shipment Records</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Shipment Records list</h5>
              <a href="<?php echo e(route('delivery-sheet-print', $sheet_id)); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-print btn-action"></i> Print</button></a>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">CN #</th>
                        <th scope="col">Consignee Name</th>
                        <th scope="col">Consignee Contact</th>
                        <th scope="col">Consignee Address</th>
                        <th scope="col">COD Amount</th>
                        <th scope="col">Weight</th>
                        <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
                        <th scope="col">Actions</th>
                        <?php endif; ?>                   
                      </tr>
                   </thead>
                   <tbody>
                    <?php $__currentLoopData = $shipmentSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($ss->id); ?></td>
                        <td><?php echo e($ss->shipment->consignment_no); ?></td>
                        <td><?php echo e($ss->shipment->customer_name); ?></td>
                        <td><?php echo e($ss->shipment->customer_phone); ?></td>
                        <td><?php echo e($ss->shipment->customer_address); ?></td>
                        <td><?php echo e($ss->shipment->product_value); ?></td>
                        <td><?php echo e($ss->shipment->weights->weight); ?></td>
                        <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
                        <td>
                          <a data-toggle="modal" href="#deleteModal<?php echo e($ss->id); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                          
                          <div class="modal fade" id="deleteModal<?php echo e($ss->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Shipment Sheet</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <div class="modal-body">Are you sure you want to delete this Shipment Sheet?</div>
                                   <div class="modal-footer">
                                      <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                      <a href="<?php echo e(route('shipment-record-delete',$ss->id)); ?>">
                                      <button class="btn btn-secondary" type="button">Delete</button>
                                      </a>
                                   </div>
                                </div>
                             </div>
                          </div>
                         <!-- modal -->
                        </td>
                        <?php endif; ?>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/admin/delivery-sheets/shipment-sheet.blade.php ENDPATH**/ ?>