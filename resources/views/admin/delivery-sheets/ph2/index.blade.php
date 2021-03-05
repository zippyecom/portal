@extends('layouts.simple.master')
@section('title', 'PH2 Delivery Sheets')

@section('css')
<style>
  form {
    width: 50%;
  }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">
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
<h3>PH2 Delivery Sheets</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">PH2 Delivery Sheets</h5>
           </div>
           @include('layouts.messages')

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
                     @hasrole('admin|operation')
                     @foreach ($delivery_sheets as $sheet)
                        <tr>
                           <td>{{ $sheet->id }}</td>
                           <td>{{ $sheet->date }}</td>
                           <td>{{ $sheet->user->name }}</td>
                           <td>{{ $sheet->route }}</td>        
                           <td>
                              <a @if ($sheet->ph2_created == 1) href="{{route('shipments.returned')}}" @else href="{{route('ph2-shipment-record', $sheet->id)}}" @endif><button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button></a>
                           </td>
                        </tr>
                     @endforeach
                     @endhasrole
                     @hasrole('rider')
                     @foreach ($rider_ds as $sheet)
                        <tr>
                           <td>{{ $sheet->id }}</td>
                           <td>{{ $sheet->date }}</td>
                           <td>{{ $sheet->user->name }}</td>
                           <td>{{ $sheet->route }}</td>
                           <td>
                              @if ($sheet->ph2_created == 0)
                              <a href="{{route('ph2-shipment-record', $sheet->id)}}">
                                 <button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button>
                              </a>
                              @endif
                           </td>
                        </tr>
                     @endforeach
                    @endhasrole
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
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
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
@endsection