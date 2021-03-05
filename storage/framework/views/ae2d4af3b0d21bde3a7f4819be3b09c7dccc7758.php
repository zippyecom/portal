
<?php $__env->startSection('title', 'PH2 Shipment Record'); ?>

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
      [type="radio"]:checked,
      [type="radio"]:not(:checked) {
          position: absolute;
          left: -9999px;
      }
      [type="radio"]:checked + label,
      [type="radio"]:not(:checked) + label
      {
          position: relative;
          padding-left: 28px;
          cursor: pointer;
          line-height: 20px;
          display: inline-block;
          color: #666;
      }
      [type="radio"]:checked + label:before,
      [type="radio"]:not(:checked) + label:before {
          content: '';
          position: absolute;
          left: 0;
          top: 0;
          width: 18px;
          height: 18px;
          border: 1px solid #ddd;
          border-radius: 100%;
          background: #fff;
      }
      [type="radio"]:checked + label:after,
      [type="radio"]:not(:checked) + label:after {
          content: '';
          width: 12px;
          height: 12px;
          background: #F87DA9;
          position: absolute;
          top: 4px;
          left: 4px;
          border-radius: 100%;
          -webkit-transition: all 0.2s ease;
          transition: all 0.2s ease;
      }
      [type="radio"]:not(:checked) + label:after {
          opacity: 0;
          -webkit-transform: scale(0);
          transform: scale(0);
      }
      [type="radio"]:checked + label:after {
          opacity: 1;
          -webkit-transform: scale(1);
          transform: scale(1);
      }
   </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>PH2 Shipment Records</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">PH2 Shipment Records list</h5>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card-body">
               <form action="<?php echo e(route('ph2-status-update')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="table-responsive">
                     <table class="table table-bordered" id="">
                        <thead>
                           <tr>
                              <th scope="col">Id</th>
                              <th scope="col">CN #</th>
                              <th scope="col">Consignee Name</th>
                              <th scope="col">Consignee Contact</th>
                              <th scope="col">Consignee Address</th>
                              <th scope="col">COD Amount</th>
                              <th scope="col">Weight</th>
                              <th scope="col">Action</th>                   
                           </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;
                        $rn = 0;
                        ?>
                        <?php $__currentLoopData = $shipmentSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td><?php echo e($ss->id); ?></td>
                              <td><?php echo e($ss->shipment->consignment_no); ?></td>
                              <td><?php echo e($ss->shipment->customer_name); ?></td>
                              <td><?php echo e($ss->shipment->customer_phone); ?></td>
                              <td><?php echo e($ss->shipment->customer_address); ?></td>
                              <td><?php echo e($ss->shipment->product_value); ?></td>
                              <td><?php echo e($ss->shipment->weight); ?></td>
                              <td>
                              <?php if($ss->shipment->status == 'Pickup'): ?>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Arrived" required>
                                 <label for="status<?php echo $i; ?>">Arrived</label>
                              </p>
                              <?php else: ?>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Delivered" required>
                                 <label for="status<?php echo $i; ?>">Delivered</label>
                              </p>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Refused">
                                 <label for="status<?php echo $i; ?>">RDF</label>
                              </p>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Hold In Ops">
                                 <label for="status<?php echo $i; ?>">HIO</label>
                              </p>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Cash Not Available">
                                 <label for="status<?php echo $i; ?>">CNA</label>
                              </p>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Customer Not Available">
                                 <label for="status<?php echo $i; ?>">CN</label>
                              </p>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Want To Check">
                                 <label for="status<?php echo $i; ?>">WTC</label>
                              </p>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Hold on Customer Request">
                                 <label for="status<?php echo $i; ?>">HCR</label>
                              </p>
                              <p>
                                 <input type="radio" id="status<?php echo ++$i; ?>" name="return_comment[<?php echo $rn; ?>]" value="Address Untraceable">
                                 <label for="status<?php echo $i; ?>">UA</label>
                              </p>
                              <?php endif; ?>
                              
                              <input type="hidden" name="return_id[<?php echo $rn; ?>]" value="<?php echo e($ss->shipment->id); ?>">
                              <input type="hidden" name="sheet_id[]" value="<?php echo e($ss->sheet->id); ?>">
                              </td>
                              <?php $rn++; ?>
                           </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                     </table>
                  </div>
                  <button class="btn btn-primary pull-right mr-4 mt-4 px-3">Submit</button>
               </form>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/admin/delivery-sheets/ph2/ph2-shipment-sheet.blade.php ENDPATH**/ ?>