@extends('layouts.simple.master')
@section('title', 'Shipments')

@section('css')
<style>
  form {
    width: 50%;
  }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('style')
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
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Arrived Shipments</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
           <h5>Arrived Shipments list</h5>
          </div>
          @include('layouts.messages')
            <div class="card-body">
              <table class="table table-striped">
                <tr>
                  <th scope="col">Consignment No.</th>
                  <td>{{ $shipment->consignment_no }}</td>
                </tr>
                <tr>
                  <th scope="col">Customer Name</th>
                  <td>{{ $shipment->customer_name }}</td>
                </tr><tr>
                  <th scope="col">Customer Address</th>
                  <td>{{ $shipment->customer_address }}</td>
                </tr>
                <tr>
                  <th scope="col">Customer Email</th>
                  <td>{{ $shipment->customer_email }}</td>
                </tr>
                <tr>
                  <th scope="col">Customer Phone</th>
                  <td>{{ $shipment->customer_phone }}</td>
                </tr>
                <tr>
                  <th scope="col">Destination City</th>
                  <td>{{ $shipment->destination_city }}</td>
                </tr>
                <tr>
                  <th scope="col">Service Type</th>
                  <td>{{ $shipment->service_type }}</td>
                </tr>
                <tr>
                  <th scope="col">Pickup Address</th>
                  <td>{{ $shipment->pickup_location }}</td>
                </tr>
                <tr>
                  <th scope="col">Product Name</th>
                  <td>{{ $shipment->product_name }}</td>
                </tr>
                <tr>
                  <th scope="col">Quantity</th>
                  <td>{{ $shipment->quantity }}</td>
                </tr>
                <tr>
                  <th scope="col">Weight</th>
                  <td>{{ $shipment->weights->weight }}</td>     
                </tr>
                <tr>
                  <th scope="col">Product Value</th>
                  <td>{{ $shipment->product_value }}</td>
                </tr>
                <tr>
                  <th scope="col">Product Reference</th>
                  <td>{{ $shipment->product_reference }}</td>
                </tr>
                <tr>
                  <th scope="col">Remarks</th>
                  <td>{{ $shipment->remarks }}</td>
                </tr>
                <tr>
                  <th scope="col">Status</th>
                  <td>{{ $shipment->status }}</td>
                </tr>
                <tr>
                  <th scope="col">Comment</th>
                  <td style="color: red;">{{ $shipment->comment }}</td>
                </tr>
                <tr>
                  <th scope="col">Return Advice</th>
                  <td>
                    <form action="{{route('advice.store', $shipment->id)}}" method="POST">
                      @csrf
                      <textarea name="return_advice" class="form-control" rows="4" placeholder="Enter return advice ...">{{$shipment->return_advice}}</textarea>
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
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>  
@endsection