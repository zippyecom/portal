
<?php $__env->startSection('title', 'PH2 Delivery Sheets'); ?>

<?php $__env->startSection('css'); ?>
<style>
  form {
    width: 50%;
  }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
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
<h3>PH2 Delivery Sheets</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">PH2 Delivery Sheets</h5>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Rider</th>
                        <th scope="col">Route</th>
                        <th scope="col">Actions</th>             
                      </tr>
                   </thead>
                   <tbody>
                     <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
                     <?php $__currentLoopData = $delivery_sheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($sheet->id); ?></td>
                           <td><?php echo e($sheet->date); ?></td>
                           <td><?php echo e($sheet->user->name); ?></td>
                           <td><?php echo e($sheet->route); ?></td>        
                           <td>
                              <a <?php if($sheet->ph2_created == 1): ?> href="<?php echo e(route('shipments.returned')); ?>" <?php else: ?> href="<?php echo e(route('ph2-shipment-record', $sheet->id)); ?>" <?php endif; ?>><button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button></a>
                           </td>
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                     <?php if(auth()->check() && auth()->user()->hasRole('rider')): ?>
                     <?php $__currentLoopData = $rider_ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($sheet->id); ?></td>
                           <td><?php echo e($sheet->date); ?></td>
                           <td><?php echo e($sheet->user->name); ?></td>
                           <td><?php echo e($sheet->route); ?></td>
                           <td>
                              <?php if($sheet->ph2_created == 0): ?>
                              <a href="<?php echo e(route('ph2-shipment-record', $sheet->id)); ?>">
                                 <button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button>
                              </a>
                              <?php endif; ?>
                           </td>
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script>
   $(document).ready(function(){
      $('.selectC').select2({
         dropdownParent: $('#addPickup')
      });

      $( "#stationSelect" ).change(function() {
         var station = $(this).val();
         empty()

         // $("#shipmentSelect").append($("<option>"+station+"</station>"))
         $.ajax({
            url : '/shipByStation/'+station,
            type: 'get',
            success: function(shipments) {
               foreach(shipments as shipment) {
                  
               }
            }
         });
         // console.log(station);
      });

      
   });
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/admin/delivery-sheets/ph2/index.blade.php ENDPATH**/ ?>