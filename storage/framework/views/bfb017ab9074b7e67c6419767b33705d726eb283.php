
<?php $__env->startSection('title', 'Delivery Sheets'); ?>

<?php $__env->startSection('css'); ?>
<style>
  form {
    width: 50%;
  }

  .status {
     background-color: black;
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
<h3>Delivery Sheets</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Delivery Sheets</h5>
               <?php if(auth()->check() && auth()->user()->hasRole('rider')): ?>

               <?php else: ?>
                  <button class="btn btn-primary ml-auto" data-toggle="modal" href="#addPickup">Generate</button>
               <?php endif; ?>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

           
           <div class="modal fade" id="addPickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Delivery Sheet</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="theme-form" method="POST" action="<?php echo e(route('sheet.store')); ?>">
                  <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                      <label class="col-form-label pt-0">Route</label>
                      <input type="text" name="route" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label pt-0">Rider</label>
                      <select name="rider" class="form-control selectC" style="width: 100%; border: 1px solid grey;" >
                        <?php $__currentLoopData = $riders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rider->id); ?>"><?php echo e($rider->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label pt-0">Station</label>
                      <select name="station" id="stationSelect" class="form-control selectC" style="width: 100%; border: 1px solid black;" >
                        <option value="">Select station ...</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Rawalpindi">Rawalpindi</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Shipments</label>
                        <select name="shipment[]" id="shipmentSelect" class="form-control selectC shipmentunique" style="width: 100%;" multiple>
                           
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Date</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Generate</button>
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
                                 <a href="<?php echo e(route('shipment-record', $sheet->id)); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button></a>

                                 <a data-toggle="modal" href="#deleteModal<?php echo e($sheet->id); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                              
                              <div class="modal fade" id="deleteModal<?php echo e($sheet->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete Delivery Sheet</h5>
                                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                       </div>
                                       <div class="modal-body">Are you sure you want to delete this Delivery Sheet?</div>
                                       <div class="modal-footer">
                                          <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                          <a href="<?php echo e(route('sheet.delete',$sheet->id)); ?>">
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
                     <?php endif; ?>
                     <?php if(auth()->check() && auth()->user()->hasRole('rider')): ?>
                        <?php $__currentLoopData = $rider_ds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td><?php echo e($sheet->id); ?></td>
                              <td><?php echo e($sheet->date); ?></td>
                              <td><?php echo e($sheet->user->name); ?></td>
                              <td><?php echo e($sheet->route); ?></td>
                              <td>
                                 <a href="<?php echo e(route('shipment-record', $sheet->id)); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button></a>
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
         $(".shipmentunique option").remove();
         // console.log(station);

         // $("#shipmentSelect").append($("<option>"+station+"</station>"))
         $.ajax({
            url : '/shipByStation/'+station,
            type: 'GET',
            success: function(shipments) {
               $(".shipmentunique option").remove();
               shipments.forEach(function(currentValue){
                  $(".shipmentunique").append("<option value='"+currentValue.id+"'>"+currentValue.consignment_no +" - "+currentValue.customer_address+ " -- " +currentValue.status+"</option>")
                  // $(".shipmentunique").append("<option value='"+currentValue.id+"'>"+currentValue.user.company.company_name+"</option>")
               });
            }
         });
         // console.log(station);
      });

      
   });
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/admin/delivery-sheets/index.blade.php ENDPATH**/ ?>