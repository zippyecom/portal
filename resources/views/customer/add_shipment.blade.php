@extends('layouts.simple.master')
@section('title', 'Add shipment')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/tree.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
@endsection

@section('style')
<style>
  .chd-option > option:first-child
  {
    background: #ccc;
  }
</style>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Add shipment</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <form class="theme-form" id="shipment_form" action="{{route('shipment.store')}}" method="POST">
        <div class="card card-with-border">
          <div class="card-header">
            <h5>Customer Details</h5>
          </div>
          @include('layouts.messages')
          
          <div class="card-body">
            @csrf
            <div class="form-group">
                <label class="col-form-label pt-0">Full Name</label>
                <input type="text" class="form-control" name="customer_name" required autocomplete="name" autofocus placeholder="Enter your Full Name">
            </div>

            <div class="form-group">
                <label class="col-form-label pt-0">Address</label>
                <input type="text" class="form-control" name="customer_address" required autocomplete="address" autofocus placeholder="Enter your Address">
            </div>

            <div class="form-group">
                <label class="col-form-label">Email</label>
                <input type="email" class="form-control" name="customer_email" required autocomplete="email" placeholder="Enter your Email">
            </div>

            <div class="form-group">
              <label class="col-form-label">Phone</label>
              <input type="text" class="form-control" name="customer_phone" placeholder="Enter your Phone">
            </div>

            <div class="form-group">
              <label class="col-form-label">Destination Country</label>
              <select class="form-control digits" name="destination_country">
                <option value="Pakistan">Pakistan</option>
              </select>
            </div>

            <div class="form-group">
              <label class="col-form-label">Destination City</label>
              <select class="form-control digits chd-option" name="destination_city" required>
                <option value="" selected disabled>Select City</option>
                <option value="Islamabad">Islamabad</option>
                <option value="Rawalpindi">Rawalpindi</option>
              </select>
            </div>

            <div class="form-group">
              <label class="col-form-label">Service</label>
              <select class="form-control digits" name="service_type" id="type">
                <option value="Normal">Normal</option>
                <option value="Timebound" id="timeB">Timebound</option>
              </select>
            </div>

            <div id="timebound">
              
            </div>
          </div>

          {{-- Shipper Details --}}
          <div class="card-header">
            <h5>Shipper Details</h5>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label class="col-form-label">Picup Location</label>
              <select id="select" class="form-control" name="pickup_location" required>
                <option value="{{Auth::user()->company->address}}" selected>{{Auth::user()->company->address}}</option>
                @if($pickups)
                  @foreach ($pickups as $pickup)
                    <option value="{{ $pickup->pickup_address }}">{{ $pickup->pickup_address }}</option>
                  @endforeach
                @endif
              </select>
            </div>

            <div class="form-group form-row mt-3 mb-0">
              <div class="btn btn-primary btn-block" data-toggle="modal" data-target="#pickupLocation">Add Pickup Location</div>
            </div>
          </div>


          {{-- Shipment Details --}}
          <div class="card-header">
            <h5>Shipment Details</h5>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label class="col-form-label">Product Name</label>
              <input type="text" class="form-control" name="product_name" placeholder="Red Suit">
            </div>

            <div class="form-group">
              <label class="col-form-label">Pieces</label>
              <input type="text" class="form-control" name="quantity" placeholder="1">
            </div>

            <div class="form-group">
              <label class="col-form-label">Weight</label>
              <select class="form-control" name="weight">
                @foreach (Auth::user()->weights as $weight)
                  <option value="{{$weight->id}}">{{$weight->weight}}</option> 
                @endforeach
                
              </select>
            </div>

            <div class="form-group">
              <label class="col-form-label">Product Value (Rs.)</label>
              <input type="number" id="product_value" class="form-control" name="product_value" placeholder="25000">
            </div>

            <div class="form-group">
              <label class="col-form-label">Product Ref.</label>
              <input type="text" class="form-control" name="product_reference">
            </div>

            <div class="form-group">
              <label class="col-form-label">Remarks</label>
              <textarea class="form-control" name="remarks" rows="3" placeholder="Shipment remarks"></textarea>
            </div>

          </div>
        </div>
    </div>

      {{-- Shipment options -- right --}}
      <div class="col-sm-4">
        <div class="card card-with-border">
          <div class="card-header">
            <h5>Shipment Options</h5>
          </div>
          <div class="card-body">
            <div class="media">
              <label class="col-form-label m-r-10">Cash Collection</label>
              <div class="media-body text-right">
                <label class="switch">
                <input type="checkbox" checked name="collect_cash"><span class="switch-state"></span>
                </label>
              </div>
            </div>

          </div>

          <div class="card-header p-0">
          </div>

          <div class="card-body">
            <div class="media">
              <label class="col-form-label m-r-10">Cash</label>
              <div class="media-body text-right">
                <span>Rs. <span id="collect_cash"></span></span>
              </div>
            </div>

            <div class="form-group form-row mt-3 mb-0">
              <button class="btn btn-primary btn-block" type="submit">BOOK NOW</button>
            </div>
          </div>
        </div>
      </form>

      <div class="card card-with-border">
        <div class="card-header" style="background-color: rgb(235, 142, 80); color: white;">
          <h5>Bulk Add Shipments</h5>
        </div>
        
        <form method="POST" action="{{route('bulk.add')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label class="col-form-label">Choose Weight</label>
              <select name="weight_id" class="form-control chd-option" required>
                <option value="" selected disabled>Select Weight</option>
                @foreach ($weights as $weight)
                  <option value="{{$weight->id}}">{{$weight->weight}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              {{-- <label class="col-form-label">Select File</label> --}}
              <input type="file" name="import_file" placeholder="Add file">
            </div>

            <div class="form-group form-row mb-0 mt-2">
              <button class="btn btn-success btn-block">Import</button>
            </div>
            <div class="form-group form-row mb-0 mt-2">
              <a class="btn btn-info btn-block text-light" href="{{asset('assets/files/shipments.xlsx')}}" download>Import Sample</a>
            </div>
          </div>
        </form>
      </div>

      </div>

      

    <div class="col-sm-4">
      
    </div>

  </div> 
</div>


<!-- Pickup Location Modal -->
<div class="modal fade" id="pickupLocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Pickup Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="theme-form" method="POST" action="{{route('location')}}" id="my_form">
        <div class="modal-body">
          @csrf
          <div class="form-group">
              <label class="col-form-label pt-0">Pickup Person Name</label>
              <input type="text" class="form-control" name="name" required autofocus placeholder="Enter Pickup Person Name">
          </div>
          <div class="form-group">
              <label class="col-form-label pt-0">Pickup Person Contact No.</label>
              <input type="number" class="form-control" name="contact" required autofocus placeholder="Enter Pickup Person Contact No.">
          </div>
          <div class="form-group">
              <label class="col-form-label pt-0">Pickup Person Email</label>
              <input type="email" class="form-control" name="email" required autofocus placeholder="Enter Pickup Person Email">
          </div>
          <div class="form-group">
              <label class="col-form-label pt-0">Address</label>
              <input id="newAddress" type="text" class="form-control" name="pickup_address" required autofocus placeholder="Enter Pickup Address">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Submit Location</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ! Pickup Location Modal -->
@endsection

@section('script')
<script>
  $(document).ready(function(){
    var wrapper = $(".form-inputs"); //Fields wrapper

    $('#type').change(function(){
      if($('#type option:selected').text() == "Timebound"){
        $("#timebound").append(`
          <div id="date_time">
            <div class="form-group">
              <label class="col-form-label">Select Date</label>
              <input type="date" class="form-control" name="tb_date">
            </div>

            <div class="form-group">       
              <label class="col-form-label">Select Date</label>
              <input type="time" class="form-control" name="tb_time">
            </div>
          </div>
      `);
      }
      else{
            $('#date_time').remove();
      }
    });

    $("#my_form").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    

    $.ajax({
      url : post_url,
      type: request_method,
      data : form_data,
      success: function(msg) {
        $("#pickupLocation").modal("hide");
        swal("Good job!", "Your location added", "success");
      }
    });

    // Inserting newly created option for pickup address
    var select = $("#select");
    var address = $('#newAddress').val();
    $(select).prepend("<option selected value='"+address+"'>"+address+"</option>");
  });

  $("#product_value").keyup(function(){
    var product_value = $("#product_value").val();
    $("#collect_cash").html(product_value);
  });
    
});
  
</script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
@endsection