
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
<h3>Arrived Shipments</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
           <h5>Arrived Shipments list</h5>
          </div>
          <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card-body">
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
                <tr>
                  <th scope="col">Status</th>
                  <td><?php echo e($shipment->status); ?></td>
                </tr>
                <tr>
                  <th scope="col">Comment</th>
                  <td style="color: red;"><?php echo e($shipment->comment); ?></td>
                </tr>
                <tr>
                  <th scope="col">Return Advice</th>
                  <td>
                    <form action="<?php echo e(route('advice.store', $shipment->id)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <textarea name="return_advice" class="form-control" rows="4" placeholder="Enter return advice ..."><?php echo e($shipment->return_advice); ?></textarea>
                      <button class="btn btn-primary mt-2">Submit</button>
                    </form>
                  </td>
                </tr>
              </table>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/shipments/shipment-advice.blade.php ENDPATH**/ ?>