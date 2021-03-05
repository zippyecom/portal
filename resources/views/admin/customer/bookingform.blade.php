@extends('layouts.simple.master')
@section('title', 'BookingForm')

@section('css')
@endsection

@section('style')
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
@endsection
@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Create Booking</h3>
@endsection



@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12" style="padding-right: 0px; padding-left: 0px;">
      <form action="{{ route('booking.store') }}" method="POST"  id="myForm" enctype="multipart/form-data">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Booking Form</h5>
              
           
               
                  <button class="btn btn-primary ml-auto" type="submit">Add Booking</button>
                
                {{-- <span class="btn btn-warning ml-2" style="font-weight: bold;">Edit</span>
                <span class="btn btn-danger ml-2" style="font-weight: bold;">Delete</span> --}}
            
           </div>
           @include('layouts.messages')
           <div class="card-body">
              <!-- <form class="theme-form" method="POST" enctype="multipart/form-data"> -->
              <!-- <form class="" method="POST" action="" enctype="multipart/form-data"> -->
                <div class="row">
                  <div class="col-sm-8" >
                    <div class="form-group row">
                     <label class="col-form-label pl-0 " style="font-weight: bold;">Services</label>
                      <select class="form-control col-md-3 ml-lg-3" id="services" name= "service_type">
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                      </select>
                      <label class="col-form-label pl-0 ml-lg-2"  style="font-weight: bold;">Pay Mode</label>
                      <select class="form-control col-md-3 ml-lg-2" name="paymentMethod" id="paymode">
                        <option>Cash</option>
                        <option>COD</option>
                      </select>
                      
                      <label class="col-form-label ml-lg-2" style="font-weight: bold;">Date</label>
                      <input type="datetime-local" class="form-control ml-lg-2"  style="width: 22%;" name="date">
                      <label class="col-form-label pl-0 mt-2" style="font-weight: bold;">Customer</label>
                      <select class="form-control col-md-3 mt-2 ml-2" name="customer" id="customer">
                        <option>Customer</option>
                      </select>
                      
                      <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">STATUS</label>
                      <input type="text" class="form-control ml-2 mt-2" style="width: 18%;" placeholder="" name="status">
                      <label class="col-form-label mt-2 mr-2 pl-1" style="font-weight: bold;">Booking #</label>
                      <input type="text" class="form-control pl-1 mt-2" style="width: 25%;" placeho name="bookingNumber">
                      <label class="col-form-label pl-0 mt-2" style="font-weight: bold;">City</label>
                      <select class="form-control col-md-3 mt-2 ml-lg-5" name="city" id="city">
                       
                        @foreach ($cities as $city)
                                <option value="{{ $city->id }}"> {{ $city->name }}</option>   
                        @endforeach
                      </select>
                     
                      <label class="col-form-label mt-2 ml-2" style="font-weight: bold;">Card Approvel Code</label>
                      <input type="text" class="form-control mt-2" style="width: 11%;" placeholder="" name="code">
                      <label class="col-form-label mt-2 mr-2 pl-1" style="font-weight: bold;">Manual #</label>
                      <input type="text" class="form-control pl-1 mt-2" style="width: 24%;" name="manual">
                      <label class="col-form-label pl-0 mt-2"  style="font-weight: bold;">SubCity</label>
                      <select class="form-control col-md-3 mt-2 ml-lg-3" name="subcity" id="subcity">
                        <option>subcity</option>
                      </select>
                     
                       <label class="col-form-label mt-2 ml-lg-2" style="font-weight: bold;">WTC</label>
                      <input type="text" class="form-control mt-2 ml-lg-2" style="width: 16%;"  name="wtc">
                       <label class="col-form-label mt-2 ml-lg-2" style="font-weight: bold;">T.KG</label>
                      <input type="text" class="form-control mt-2 ml-lg-2" style="width: 15%;" placeholder="0" name="tkg">
                      <label class="col-form-label mt-2 ml-lg-2" style="font-weight: bold;">T.QTY</label>
                      <input type="text" class="form-control mt-2 ml-lg-2" style="width: 14%;" placeholder="0" name="tqty">
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
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold; margin-left: -33%;">Dept</label>
                              <select class="form-control mt-2 w-75" style="margin-left: 12%;" id="depSender" name="depSender">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                             
                              <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Name</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left: 8%;" placeholder="" name="sname">
                               <label class="col-form-label mt-2 mr-2 ml-2 " style="font-weight: bold;">CNIC</label>
                               <input type="text" class="form-control mt-2 w-75" style="margin-left: 10%;" placeholder="" name="scnic">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Address</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left: 3%;" placeholder="" name="saddress">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Mobile</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left:6%;" placeholder="" name="smobile">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left: 6%;" placeholder="" name="saddress2">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                               <input type="text" class="form-control mt-2 w-75" style="margin-left: 6%;" placeholder="" name="sraddress2">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">City</label>
                               <input type="text" class="form-control mt-2 w-75" style="margin-left: 12%;" placeholder="" name="scity">
                              
                              

                          </div>

                           <div class="form-group row mr-0 ml-2 mt-2" style="border:2px solid; width: 47%;" >
                              <span style="width:128px;margin-top:-10px;margin-left:5px;background:white; font-weight: bold;">Receiver Details</span>
                               <label class="col-form-label pl-0 mt-3" style="font-weight: bold; margin-left: -33%;">Dept</label>
                               <select class="form-control mt-2 w-75" style="margin-left: 12%;" id="depreceiver" name="depreceiver">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                             
                              <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Name</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left: 8%;" placeholder="" name="rname">
                               <label class="col-form-label mt-2 mr-2 ml-2 " style="font-weight: bold;">CNIC</label>
                               <input type="text" class="form-control mt-2 w-75" style="margin-left: 10%;" placeholder="" name="rcnic">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Address</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left: 3%;" placeholder="" name="raddress">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Mobile</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left:6%;" placeholder="" name="rmobile">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                              <input type="text" class="form-control mt-2 w-75" style="margin-left: 6%;" placeholder="" name="raddress2">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">Add.L2</label>
                               <input type="text" class="form-control mt-2 w-75" style="margin-left: 6%;" placeholder="" name="rsaddress2">
                               <label class="col-form-label mt-2 mr-2 ml-2" style="font-weight: bold;">City</label>
                               <input type="text" class="form-control mt-2 w-75" style="margin-left: 12%;" placeholder="" name="rcity">
                               
                        
                             
                          </div>
                        </div>

                      </div>
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="form-group row w-100">
                          
                            <div class="col-md-2">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Category</label>
                              <select class="form-control mt-2" name="category">
                                @foreach ($category as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Goods Type</label>
                              <select class="form-control mt-2" id="goods_type" name="goods_type">
                                 @foreach ($goods as $good)
                                <option value="{{ $good->name }}">{{ $good->name }}</option>
                                @endforeach
                              </select>
                            </div>
                             <div class="col-md-2">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Pack Type</label>
                              <select class="form-control mt-2"  name="packing_type">
                                @foreach ($packings as $packing)
                                <option value="{{ $packing->name }}">{{ $packing->name }}</option>
                                @endforeach
                              </select>
                            </div>
                             <div class="col-md-1 p-1">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Qty</label>
                              <input type="text" class="form-control mt-2" placeholder="" name="qty">
                            </div>
                            <div class="col-md-2 p-1">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Unit/Qty</label>
                               <input type="text" class="form-control mt-2" placeholder="" name="unitQty">
                            </div>
                            <div class="col-md-1 p-1">
                              <label class="col-form-label pr-0 pl-0 mt-3" style="font-weight: bold;">Weight</label>
                              <input type="text" class="form-control mt-2" placeholder="" name="unitWeight">
                            </div>
                            <div class="col-md-1 p-1">
                              <label class="col-form-label pl-0 mt-3" style="font-weight: bold;">Total</label>
                              <input type="text" class="form-control mt-2" placeholder="" name="totalWeight">
                            </div>
                            <div class="col-md-1 p-0 mt-5">

                              <button type="submit" name="sub" value="submit" class="btn btn-success">Add item</button>
                            </div>
                         
                        <div class="w-100" style="border:2px solid black;">
                          <table class="table table-hover table-responsive mb-5" id="addtable">
                            <thead>
                              <tr>
                                <th>Category</th>
                                <th>Good Type</th>
                                <th>Packing</th>
                                <th>Qty.</th>
                                <th>Unit</th>
                                <th>Weight</th>
                                <th>Item_Desc</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody id="displayArea">
                              
                            </tbody>

                          </table>
                        </div>


                          
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div class="col-sm-4">
                    <div class="" style="height: 10%;border: 2px solid;text-align: center;" >
                    <button type="submit" class="btn btn-success btn-lg mt-3 ">Calculate Rate</button>
                    </div>
                    <div class="form-group row mt-2 mr-0 ml-0" style="border-style: ridge;">
                     <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Balance Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="balRs">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Courier Ch.</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="courierCh">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Handling Ch.</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="handlingCh">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Home Del Ch.</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="homeDelCh">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">V.A S Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="vasRs">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Fuel S.% / Rs</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="fuels">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="fRs">
                     <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Misc.Charges</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="miscCh">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Packing Ch. </label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="packingCh">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Box Packing</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="boxPacking">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="box">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Disc. % / Rs</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="disc">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="discRs">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">G.st Rs</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="gst">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="gstR">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Sum Insured</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="sumInsured">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">Ins.Rate</label>
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="ins">
                     <input type="text" class="form-control w-25 mt-2" placeholder="0" name="insRate">
                      <label class="col-form-label w-50 mt-2 pl-2" style="font-weight: bold;">R.Able Rs</label>
                     <input type="text" class="form-control w-50 mt-2" placeholder="0" name="rAble">
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
      </form>
     </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function(){
    $('select[name="city"]').on('change', function(){
        var cityId = $(this).val();
        console.log(cityId);
        if(cityId) {
            $.ajax({
                url: 'subcity/get/'+cityId,
                type:"GET",
                dataType:"json",

                success:function(data) {
                  console.log(data);
                    $('select[name="subcity"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="subcity"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
            });
        } else {
            $('select[name="subcity"]').empty();
        }

    });
    $("#services").click(function() {
    var des = $('#services').val();
    console.log(des);
  });
  });
</script>

<script>
  $('#myForm').submit(function(event) {
    event.preventDefault();
    var $inputs = $('#myForm :input');
    var values = {};
    $inputs.each(function() {
      values[this.name] = $(this).val();
    });
    $('#displayArea').append("<tr><td>" + values.category + "</td><td>" + values.goods_type + "</td><td>" + 
    values.packing_type + "</td><td>" + values.qty + "</td><td>" + values.unitQty + 
    "</td><td>" + values.totalWeight + "</td>"+ "<td style='width: 1%; '>" + "<input type='text' class='w-100' id='name' name='itemdesc'>" + "</td>" +
        "<td>" +
        "<button type='button' onclick='productDelete(this);' class='btn btn-default'>" +
        "<i class='fa fa-window-close'></i>" +
        "</button>" +
        "</td>" +
        "</tr>");
    $("input[type=text], textarea").val("");
  });

  function productDelete(ctl) {
    $(ctl).parents("tr").remove();
}
</script>
<script>

</script>
{{-- <script> 
  $(document).ready(function () { 

    // Denotes total number of rows 
    var rowIdx = 0; 

    // jQuery button click event to add a row 
    $('#addBtn').on('click', function () { 

      // Adding a row inside the tbody. 
      $('#tbody').append(`<tr id="R${++rowIdx}"> 
           <td class="row-index text-center"> 
           <p>Row ${rowIdx}</p> 
           </td> 
            <td class="text-center"> 
              <button class="btn btn-danger remove"
                type="button">Remove</button> 
              </td> 
            </tr>`); 
    }); 

    // jQuery button click event to remove a row. 
    $('#tbody').on('click', '.remove', function () { 

      // Getting all the rows next to the row 
      // containing the clicked button 
      var child = $(this).closest('tr').nextAll(); 

      // Iterating across all the rows  
      // obtained to change the index 
      child.each(function () { 

        // Getting <tr> id. 
        var id = $(this).attr('id'); 

        // Getting the <p> inside the .row-index class. 
        var idx = $(this).children('.row-index').children('p'); 

        // Gets the row number from <tr> id. 
        var dig = parseInt(id.substring(1)); 

        // Modifying row index. 
        idx.html(`Row ${dig - 1}`); 

        // Modifying row id. 
        $(this).attr('id', `R${dig - 1}`); 
      }); 

      // Removing the current row. 
      $(this).closest('tr').remove(); 

      // Decreasing total number of rows by 1. 
      rowIdx--; 
    }); 
  }); 
</script>  --}}

@endsection