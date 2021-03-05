@extends('layouts.simple.master')
@section('title', 'Advices not done shipments')

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
<h3>Advices not done Shipments</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
           <h5>Advices not done Shipments list</h5>
          </div>
          @include('layouts.messages')
            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                        <th scope="col">Consignment No.</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Destination City</th>
                        <th scope="col">Service Type</th>
                        <th scope="col">Return Advice</th>
                        <th scope="col">Actions</th>                      
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($shipments as $shipment)
                      <tr>
                        <th scope="row">{{ $shipment->consignment_no }}</th>
                        <td>{{ $shipment->user->name }}</td>
                        <td>{{ $shipment->user->company->company_name}}</td>
                        <td>{{ $shipment->destination_city}}</td>
                        <td><span class="badge badge-primary">{{ $shipment->service_type}}</span></td>
                        <td>{{ $shipment->return_advice}}</td>
                        <td>
                          <a data-toggle="modal" href="#viewModal{{$shipment->id}}" title="View"><button class="btn btn-primary btn-xs"><i class="fa fa-eye btn-action"></i></button></a>

                          {{-- View Modal --}}
                          <div class="modal fade" id="viewModal{{$shipment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Shipment Details</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
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
                                      <th scope="col">Timebound Date</th>
                                      <td>{{ $shipment->tb_date }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Timebound Time</th>
                                      <td>{{ $shipment->tb_time }}</td>
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
                                      <th scope="col">Returned due to:</th>
                                      <td>{{ $shipment->comment }}</td>
                                    </tr>
                                  </table>

                                  <h5 class="mt-3">Tracking For: {{ $shipment->consignment_no }}</h5>
                                  @foreach ($shipment->tracking as $tracking)
                                    <p>{{$tracking->created_at}} - {{$tracking->description}}</p>
                                  @endforeach
                                  
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- View modal end-->

                          <a href="{{route('advice.status.update', $shipment->id)}}" title="Done"><button class="btn btn-success btn-xs"><i class="fa fa-check btn-action"></i></button></a>

                       </td>
                      </tr>
                    @endforeach
                      
                   </tbody>
                </table>
             </div>
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