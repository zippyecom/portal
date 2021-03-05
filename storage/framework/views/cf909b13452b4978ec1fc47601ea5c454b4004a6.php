
<?php $__env->startSection('title', 'Shipment Arrived'); ?>

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

      .scan-box-input {
        font-weight: 800;
        margin: 0 auto;
        width: 50%;
        font-size: 50px;
        letter-spacing: 34px;
        padding: 0 42px;
        text-align: center;
        border: none;
      }

      .scan-box {
        text-align: center;
      }

      .barcode-label {
        font-size: 26px;
        font-weight: 800;
      }

      th {
        width: 500px;
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
<h3>Shipment Arrived</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="">
        <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
          <div class="scan-box mb-5">
            <label class="barcode-label">Scan Barcode</label><br>
            <input type="text" id="barcode" name="barcode" class="scan-box-input" autofocus>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-sm-12" id="shipment-div">
      
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function() { 
    $("#barcode").keyup(function(){
      var value = $("#barcode").val();
      var wrapper = $("#shipment-div");

      // var post_url = $("#barcode-form").attr("action"); //get form action url
      // var request_method = $("#barcode-form").attr("method"); //get form GET/POST method
      // var form_data = $("#barcode-form").serialize(); //Encode form elements for submission

      // $(document).ajaxStart(function(){
      //   console.log("start")
      //   $("#wait").css("display", "block");
      // });
      // $(document).ajaxComplete(function(){
      //   console.log("complete")
      //   $("#wait").css("display", "none");
      // });
      $.ajax({
      url : '/barcode-search/'+value,
      type: 'GET',
      success: function(msg) {
        if(msg["ifFound"]){
          var shipment = msg["shipment"];
          // if(shipment.id == 1) {
          //   console.log("hello")
          // }
          $('#card-ship').remove();
          $('.btnAction').remove();
          $(wrapper).append(`
          <div class="card" id="card-ship">
            <div class="card-body">
              <table class="table table-striped">
                <tr>
                  <th scope="col">Consignment No.</th>
                  <td>`+shipment["consignment_no"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Customer Name</th>
                  <td>`+shipment["customer_name"]+`</td>
                </tr><tr>
                  <th scope="col">Customer Address</th>
                  <td>`+shipment["customer_address"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Customer Email</th>
                  <td>`+shipment["customer_email"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Customer Phone</th>
                  <td>`+shipment["customer_phone"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Destination City</th>
                  <td>`+shipment["destination_city"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Service Type</th>
                  <td>`+shipment["service_type"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Pickup Address</th>
                  <td>`+shipment["pickup_location"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Product Name</th>
                  <td>`+shipment["product_name"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Quantity</th>
                  <td>`+shipment["quantity"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Weight</th>
                  <td>`+shipment.weights.weight+`</td>
                </tr>
                <tr>
                  <th scope="col">Product Value</th>
                  <td>`+shipment["product_value"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Product Reference</th>
                  <td>`+shipment["product_reference"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Remarks</th>
                  <td>`+shipment["remarks"]+`</td>
                </tr>
                <tr>
                  <th scope="col">Status</th>
                  <td>`+shipment["status"]+`</td>
                </tr>
              </table>`);
              if(shipment.status == "Booked" || shipment.status == "Pickup"){
                $(wrapper).append(`
                <a class="btn btn-success btn-block mt-3 btnAction" href="/shipment-tracking/`+shipment['id']+`">Arrived</a>
                `);
              }
              else if(shipment.status == "Arrived"){
                $(wrapper).append(`<?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <a class="btn btn-success btn-block mt-3 btnAction" href="/shipment-tracking/`+shipment['id']+`">In-Transit</a><?php endif; ?>
                `);
              }
              else if(shipment.status == "In-Transit"){
                $(wrapper).append(`<?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <a class="btn btnAction btn-success col-5 mt-3 offset-lg-1" href="/shipment-tracking/`+shipment['id']+`">Delivered</a>

                <button class="btn btnAction btn-danger col-5 mt-3" data-toggle="modal" data-target="#comments">Returned</button>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('operation')): ?>
                <button class="btn btnAction btn-danger col-6 offset-3 my-2" data-toggle="modal" data-target="#comments">Returned</button>
                <?php endif; ?>

                <div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Add Comment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form class="theme-form" method="POST" action="<?php echo e(route('shipment-comments')); ?>" id="my_form">
                      <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="shipment_id" value="`+shipment['id']+`" hidden>
                        <p>
                          <input type="radio" id="status" name="return_comment" value="Refused">
                          <label for="status">RDF</label>
                        </p>
                        <p>
                          <input type="radio" id="status1" name="return_comment" value="Hold In Ops">
                          <label for="status1">HIO</label>
                        </p>
                        <p>
                          <input type="radio" id="status2" name="return_comment" value="Cash Not Available">
                          <label for="status2">CNA</label>
                        </p>
                        <p>
                          <input type="radio" id="status3" name="return_comment" value="Customer Not Available">
                          <label for="status3">CN</label>
                        </p>
                        <p>
                          <input type="radio" id="status4" name="return_comment" value="Want To Check">
                          <label for="status4">WTC</label>
                        </p>
                        <p>
                          <input type="radio" id="status5" name="return_comment" value="Hold on Customer Request">
                          <label for="status5">HCR</label>
                        </p>
                        <p>
                          <input type="radio" id="status6" name="return_comment" value="Address Untraceable">
                          <label for="status6">UA</label>
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
                `);
              }
              
              else if(shipment.status == "Delivered" || shipment.status == "Returned") {
                $(wrapper).append(`
                <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <button class="btn btnAction btn-success col-6 offset-3 my-2" data-toggle="modal" data-target="#voidcn">Void CN</button>
                <?php endif; ?>

                <div class="modal fade" id="voidcn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Void CN</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form class="theme-form" method="POST" action="<?php echo e(route('shipment-comments')); ?>" id="my_form">
                      <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <a class="btn btn-success btn-block mt-3 btnAction" href="/void-arrived/`+shipment['id']+`">Arrived</a>
                        <a class="btn btn-success btn-block mt-3 btnAction" href="/void-inTransit/`+shipment['id']+`">In-Transit</a>
                        <a class="btn btn-success btn-block mt-3 btnAction" href="/void-delivered/`+shipment['id']+`">Delivered</a>

                        <h5 class="mt-3">Returned</h5>
                        <input type="text" name="shipment_id" value="`+shipment['id']+`" hidden>
                        <p>
                          <input type="radio" id="status" name="return_comment" value="Refused" required> 
                          <label for="status">RDF</label>
                        </p>
                        <p>
                          <input type="radio" id="status1" name="return_comment" value="Hold In Ops">
                          <label for="status1">HIO</label>
                        </p>
                        <p>
                          <input type="radio" id="status2" name="return_comment" value="Cash Not Available">
                          <label for="status2">CNA</label>
                        </p>
                        <p>
                          <input type="radio" id="status3" name="return_comment" value="Customer Not Available">
                          <label for="status3">CN</label>
                        </p>
                        <p>
                          <input type="radio" id="status4" name="return_comment" value="Want To Check">
                          <label for="status4">WTC</label>
                        </p>
                        <p>
                          <input type="radio" id="status5" name="return_comment" value="Hold on Customer Request">
                          <label for="status5">HCR</label>
                        </p>
                        <p>
                          <input type="radio" id="status6" name="return_comment" value="Address Untraceable">
                          <label for="status6">UA</label>
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
                `);
              }
                  
              $(wrapper).append(` 
            </div>
          </div>
            
          `);
        }
        else{
          $('#card-ship').remove();
          $('.btnAction').remove();
        }
      }
    });

    });

    

  });
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\Zippy\resources\views/admin/scan-booked-shipment.blade.php ENDPATH**/ ?>