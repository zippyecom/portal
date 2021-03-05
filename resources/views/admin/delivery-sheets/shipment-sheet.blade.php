@extends('layouts.simple.master')
@section('title', 'Shipment Record')

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
         font-size: 15px;
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
<h3>Shipment Records</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Shipment Records list</h5>
              <a href="{{route('delivery-sheet-print', $sheet_id)}}"><button class="btn btn-primary btn-xs"><i class="fa fa-print btn-action"></i> Print</button></a>
           </div>
           @include('layouts.messages')

            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">CN #</th>
                        <th scope="col">Consignee Name</th>
                        <th scope="col">Consignee Contact</th>
                        <th scope="col">Consignee Address</th>
                        <th scope="col">COD Amount</th>
                        <th scope="col">Weight</th>
                        @hasrole('admin|operation')
                        <th scope="col">Actions</th>
                        @endhasrole                   
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($shipmentSheets as $ss)
                      <tr>
                        <td>{{ $ss->id }}</td>
                        <td>{{ $ss->shipment->consignment_no }}</td>
                        <td>{{ $ss->shipment->customer_name }}</td>
                        <td>{{ $ss->shipment->customer_phone }}</td>
                        <td>{{ $ss->shipment->customer_address }}</td>
                        <td>{{ $ss->shipment->product_value }}</td>
                        <td>{{ $ss->shipment->weights->weight }}</td>
                        @hasrole('admin|operation')
                        <td>
                          <a data-toggle="modal" href="#deleteModal{{$ss->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                          {{-- Delete Modal --}}
                          <div class="modal fade" id="deleteModal{{$ss->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Shipment Sheet</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <div class="modal-body">Are you sure you want to delete this Shipment Sheet?</div>
                                   <div class="modal-footer">
                                      <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                      <a href="{{ route('shipment-record-delete',$ss->id) }}">
                                      <button class="btn btn-secondary" type="button">Delete</button>
                                      </a>
                                   </div>
                                </div>
                             </div>
                          </div>
                         <!-- modal -->
                        </td>
                        @endhasrole
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