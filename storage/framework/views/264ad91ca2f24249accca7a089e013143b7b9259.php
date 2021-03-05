
<?php $__env->startSection('title', 'BookingForm'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
  i.fa.fa-plus-circle {
    padding-top: 8px;
    color: green;
    font-size: 22px;
    margin-top: 0;
  }
  
  i.fa.fa-minus-circle {
    padding-top: 8px;
    color: red;
    font-size: 22px;
    margin-top: 0;
  }
</style>
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?> -->

<!-- <?php $__env->startSection('breadcrumb-title'); ?>
<h3>Booking Form</h3>
<?php $__env->stopSection(); ?> -->

<?php $__env->startSection('content'); ?>
<div class="container-fluid" style="padding-top: 5%;">
  <div class="row">
     <div class="col-sm-12" style="padding-right: 0px; padding-left: 0px;">
        <div class="card">
           <div class="card-header">
              <h5>Booking Form</h5>
              <div class="row mt-3">
                <span class="btn btn-success" style="font-weight: bold;">Add</span>
                <span class="btn btn-warning ml-2" style="font-weight: bold;">Edit</span>
                <span class="btn btn-danger ml-2" style="font-weight: bold;">Delete</span>
              </div>
           </div>
           <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <div class="card-body">
              <!-- <form class="theme-form" method="POST" action="<?php echo e(route('customer.store')); ?>" enctype="multipart/form-data"> -->
              <!-- <form class="" method="POST" action="" enctype="multipart/form-data"> -->
                <div class="row">
                  <div class="col-sm-9" >
                    <div class="form-group row" >
                     <label class="col-form-label pl-0 pr-3" style="font-weight: bold;">Services</label>
                      <select class="form-control col-md-3" id="exampleFormControlSelect1">
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <label class="col-form-label pl-0"  style="font-weight: bold;">Payment Method</label>
                      <select class="form-control col-md-3" name="Payment Method" id="exampleFormControlSelect1">
                        <option>Cash</option>
                        <option>COD</option>
                      </select>
                      
                      <label class="col-form-label" style="font-weight: bold;">Date/Time</label>
                      <input type="text" class="form-control" style="width: 18%;" name="date/time">
                      <label class="col-form-label pl-0 mt-2" style="font-weight: bold;">SubCity</label>
                      <select class="form-control col-md-3 mt-2" id="exampleFormControlSelect1">
                        <?php $__currentLoopData = $subcities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subcity->id); ?>"><?php echo e($subcity->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      
                      <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">STATUS</label>
                      <input type="text" class="form-control ml-2 mt-2" style="width: 18%;" placeholder="" name="status">
                      <label class="col-form-label pl-0 mt-2" style="font-weight: bold;">City</label>
                      <select class="form-control col-md-3 mt-2" id="exampleFormControlSelect1">
                       
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <label class="col-form-label mt-2 mr-2 pl-1" style="font-weight: bold;">Booking #</label>
                      <input type="text" class="form-control pl-1 mt-2" style="width: 28%;" placeho name="">
                      <label class="col-form-label mt-2 ml-2" style="font-weight: bold;">Card Approvel Code</label>
                      <input type="text" class="form-control mt-2" style="width: 11%;" placeholder="" name="data">
                      <label class="col-form-label pl-0 mt-2"  style="font-weight: bold;">Customer</label>
                      <select class="form-control col-md-3 mt-2" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      <label class="col-form-label mt-2 mr-2 pl-1" style="font-weight: bold;">Manual #</label>
                      <input type="text" class="form-control pl-1 mt-2" style="width: 28%;" name="manual">
                       <label class="col-form-label mt-2" style="font-weight: bold;">WTC</label>
                      <input type="text" class="form-control mt-2" style="width: 7%;"  name="wtc">
                       <label class="col-form-label mt-2" style="font-weight: bold;">T.KG</label>
                      <input type="text" class="form-control mt-2" style="width: 5%;" placeholder="0" name="tkg">
                      <label class="col-form-label mt-2" style="font-weight: bold;">T.QTY</label>
                      <input type="text" class="form-control mt-2" style="width: 5%;" placeholder="0" name="tqty">
                      <label class="col-form-label pl-0 mt-2" style="font-weight: bold;">Remarks</label>
                      <input type="text" class="form-control col-md-10 mt-2" placeholder="0" name="remarks">
                    </div>
                    <div style="text-align: right;">
                             
                      <label class="col-form-label pl-0 pr-3" style="font-weight: bold;"> <input type="checkbox" value="">Sender Risk</label>
                      <label class="col-form-label pl-0 pr-3" style="font-weight: bold;"> <input type="checkbox"  value="">No Claim</label>
                      <label class="col-form-label pl-0 pr-3" style="font-weight: bold;"> <input type="checkbox" value="">No Time Limit</label>
                      <label class="col-form-label pl-0 pr-3" style="font-weight: bold;"> <input type="checkbox"  value="">Insurance</label>

                    </div>
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active font-weight-bold" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sender & Receiver Address</a>
                        <a class="nav-link font-weight-bold" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Shipment Details</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                          <div class="form-group row mr-0 ml-3 mt-2" style="border:2px solid; width: 47%;" >
                             <span style="width:130px;margin-top:-10px;margin-left:5px;background:white;font-weight: bold;">Sender Details</span>
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold; margin-left: -26%;">Dept</label>
                              <select class="form-control mt-2 w-50 ml-4" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                              <button type="submit" class="btn btn-success ml-3 mt-2 mb-1 w-25">Repeat</button>
                              <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Name</label>
                              <input type="text" class="form-control ml-3 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2 " style="font-weight: bold;">CNIC</label>
                               <input type="text" class="form-control ml-4 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Address</label>
                              <input type="text" class="form-control ml-1 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Mobile 2</label>
                              <input type="text" class="form-control ml-1 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                              <input type="text" class="form-control ml-2 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                               <input type="text" class="form-control ml-2 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">City</label>
                               <input type="text" class="form-control ml-4 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Country</label>
                              <input type="text" class="form-control ml-0 mt-2" style="width: 31%;" placeholder="" name="status">
                              

                          </div>

                           <div class="form-group row mr-0 ml-2 mt-2" style="border:2px solid; width: 47%;" >
                              <span style="width:120px;margin-top:-10px;margin-left:5px;background:white; font-weight: bold;">Receiver Details</span>
                               <label class="col-form-label pl-0 mt-3" style="font-weight: bold; margin-left: -26%;">Dept</label>
                              <select class="form-control mt-2 w-50 ml-2" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                              <button type="submit" class="btn btn-success ml-3 mt-2 mb-1 w-25">Repeat</button>
                              <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Name</label>
                              <input type="text" class="form-control ml-3 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2 " style="font-weight: bold;">CNIC</label>
                               <input type="text" class="form-control ml-4 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Address</label>
                              <input type="text" class="form-control ml-1 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Mobile 2</label>
                              <input type="text" class="form-control ml-1 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                              <input type="text" class="form-control ml-2 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                               <input type="text" class="form-control ml-2 mt-2 w-75" placeholder="" name="status">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">City</label>
                               <input type="text" class="form-control ml-4 mt-2 w-75" placeholder="" name="status">
                        
                             
                          </div>
                        </div>

                      </div>
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="form-group row w-100">
                            <div class="col-md-2">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Category</label>
                              <select class="form-control mt-2" id="exampleFormControlSelect1">
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Goods Type</label>
                              <select class="form-control mt-2" id="exampleFormControlSelect1">
                                 <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($good->id); ?>"><?php echo e($good->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                             <div class="col-md-2">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Packing Type</label>
                              <select class="form-control mt-2" id="exampleFormControlSelect1">
                                <?php $__currentLoopData = $packings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($packing->id); ?>"><?php echo e($packing->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                             <div class="col-md-1 p-1">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Qty</label>
                              <input type="text" class="form-control mt-2" placeholder="" name="status">
                            </div>
                            <div class="col-md-1 p-1">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Unit/Qty</label>
                               <input type="text" class="form-control mt-2" placeholder="" name="status">
                            </div>
                            <div class="col-md-1 p-1">
                              <label class="col-form-label pr-0 pl-0 mt-2" style="font-weight: bold;">Unit Weight</label>
                              <input type="text" class="form-control mt-0" placeholder="" name="status">
                            </div>
                            <div class="col-md-1 p-1">
                              <label class="col-form-label pl-0 mt-2" style="font-weight: bold;">Total Weight</label>
                              <input type="text" class="form-control mt-0" placeholder="" name="status">
                            </div>
                            <div class="p-0">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Max</label>
                              <input type="checkbox" class="form-control mt-3" value="">
                            </div>
                            <div class="col-md-1 ml-1 p-0 mt-5">

                              <button type="submit" class="btn btn-success">Add Item</button>
                            </div>
                        <div class="w-100" style="border:2px solid black;">
                          <table class="table table-hover table-responsive mb-5">
                            <thead>
                              <tr>
                                <th>Category</th>
                                <th>Good Type</th>
                                <th>Packing</th>
                                <th>Qty.</th>
                                <th>Unit</th>
                                <th>Weight</th>
                                <th>Bar Code</th>
                                <th>Item_Desc</th>
                                <th>Max</th>
                                <th>Del</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Box</td>
                                <td>Check Book</td>
                                <td>Envelope</td>
                                <td>1</td>
                                <td>1</td>
                                <td>5</td>
                                <td>0</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>

                          </table>
                        </div>


                          
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div class="col-sm-3" style="padding-right: 0px; padding-left: 0px;">
                    <div class="" style="height: 10%;border: 2px solid;text-align: center;" >
                    <button type="submit" class="btn btn-success btn-lg mt-3 ">Calculate Rate</button>
                    </div>
                    <div class="form-group row mt-2" style="border-style: ridge;">
                     <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Balance Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Courier Ch.</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Handling Ch.</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Home Del Ch.</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">V.A S Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Fuel S.% / Rs</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                     <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Misc.Charges</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Packing Ch. </label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Box Packing</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Disc. % / Rs</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">G.st Rs</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Sum Insured</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Ins.Rate</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="data">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">R.Able Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="r.able">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Recived Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="recived">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Balance Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="balance">
                    </div>
                  </div> 
                </div>
              <!-- </form> -->
            </div>
          </div>
        </div>
     </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function(){
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\resources\views/admin/customer/bookingform.blade.php ENDPATH**/ ?>