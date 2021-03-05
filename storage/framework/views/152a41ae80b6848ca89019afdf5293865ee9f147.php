
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
<h3>CASH ON DELIVERY</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class ="card" style="background:white;">
<div class="container-fluid">
  <div class="row" style="border-bottom: 1px solid #dfe5f5;">
    <div class="col-sm-12" style="margin-left:-10%">
      <div class="">
        <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
          <div class="scan-box mb-5" style="margin-left: -800px; height:45px;">
            <label class="barcode-label">Sheet #</label><br>
            <input type="text" id="barcode" name="barcode" class="" autofocus style="border:2px solid;">
          </div>
          
        </div>
      </div>
    </div>
    
 <br>
    <div class="row">
    <div style="padding-left:90%; margin-top:-5%; " >
    <button id="btnResult" class="btn btn-primary btn-lg " style="height:40px; width:100px;" >Calculate</button>
    </div>
        <div class="col-sm-12">
       
        <label > <b> COD ITEMS </b> </label>
            <table id="shipment-div"  class="table table-bordered table-condensed table-striped display " >
                <thead>
                    <tr>
                        <th>Sheet-id</th>
                        <th>CN</th>
                        <th>COD</th>
                        <th>Collect</th>
                        <th>Delete</th>
                    </tr>
                    
                </thead>
                
            </table>
            <br>
           
        </div>
    </div>
    <div class="row pt-5">
      <div class="col-sm-12">
        <form action="<?php echo e(route('collect')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
       <label style="padding-left:65%;"> <b> Total COD Amount Collect </b></label>
          <input type="input"  readonly id="total" name="total_amount" />
        <br>
        <label style="padding-left:63.5%;"><b> Total COD Amount to Collect </b> </label>
        <input type="input" readonly id="cod_amount" name="cod_amount" />
        <br>
        <label style="padding-left:71%;"><b> Balance Amount </b></label>
        <input type="input" id="balance" readonly name="balance" />
       <br>
       <div style="padding-left:89%; ">
        <input type="input" hidden id="sheet" name="sheet_shipment_id" >
        <button type="submit" class="btn btn-primary" style="height:40px; width:80px;" >Save</button>
       </div>
        </form>

      </div>
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
      url : '/sheetShipment_search/'+value,
      type: 'GET',
      success: function(msg) {
        if(msg["ifFound"]){
          var shipment = msg["sheetShipment"];
          console.log(shipment);
          // if(shipment.id == 1) {
          //   console.log("hello")
          // }
          $('#card-ship').remove();
          $('.btnAction').remove();
          $(wrapper).append(`
          
            <tr class="getdata">
              <td>`+`<input type="input" readonly value= `+shipment["sheet_id"]+` id="sheetids" class="sheetid" name="sheetid" />`+`</td>
                
                <td>`+shipment.shipment["consignment_no"]+`</td>
              
                <td>`+`<input type="input" readonly value= `+shipment.shipment["product_value"]+` class="productValue" name="collect" />`+`</td>
                <td>`+`<input type="input"  id="dynamicAdd" class="dynamictxt" name="collect" />`+`</td>
                <td>` +`<button type='button' onclick='productDelete(this);' class='btn btn-default'>`+
                `<i class='fa fa-window-close'></i>`+`</button>`+`</td>
            </tr>
        
            
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
  
function productDelete(ctl) {
    $(ctl).parents("tr").remove();
}

var res = document.querySelector("#btnResult");
res.onclick=function(){
var x = document.querySelectorAll('.dynamictxt');
var y = document.querySelectorAll('.productValue');
var z = document.querySelector('#sheetids').value;
var zvalue = document.querySelector('#sheet');

if(typeof z !== 'undefined'){
    // this statement will execute
   zvalue.value = z;
}


if(typeof x !== 'undefined'){
var tot = 0;
for(i=0; i<x.length; i++){
 tot = tot+Number(x[i].value);
}
var pro = 0;
for(i=0; i<y.length; i++){
 pro = pro+Number(y[i].value);
}
var cod = document.querySelector("#cod_amount");
var total = document.querySelector("#total");
var balance = document.querySelector('#balance');

total.value = tot;
cod.value = pro;
balance.value = pro - tot;
}
// alert(tot);
} 

// function for calculating everything
function calcAll() {
            // calculate total for one row
            
            $(".getdata").each(function () {
                
                var productValue = 1;
                var total = 1;
                if (!isNaN(parseFloat($(this).find(".productValue").val()))) {
                    price = parseFloat($(this).find(".productValue").val());
                }
                total = productValue;
                $(this).find(".cod_amount").val(total.toFixed(2));
            });

            //$(".amount").each(function () {
               
            //    if (!isNaN(this.value) && this.value.length != 0) {
            //        product *= parseFloat(this.value);
            //    }
            //    $("#total1").val(product.toFixed(2));
            //    if (!isNaN($(this).find(".qnty"))) {

            //    }
            //});

            // sum all totals
            var sum = 0;
            $(".cod_amount").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            // show values in netto, steuer, brutto fields
            // $("#netto").val(sum.toFixed(2));
            // $("#steuer").val(sum.toFixed(2) * 0.19);
            // $("#brutto").val(parseFloat(sum.toFixed(2)) + parseFloat(($("#steuer").val())));
        }

        $(document).ready(function() { 
        $('tr').each(function()
{
var totalamount = 0;
$(this).find('productValue').each(function(){
var totals = $(this).text();
if(totals.length!==0){
  totalamount+=parsefloat(total);
}
});
$(this).find('#total').html(totalamount);
}); 
});



 

</script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Zippy\resources\views/admin/delivery-sheets/ph2/cod-collection.blade.php ENDPATH**/ ?>