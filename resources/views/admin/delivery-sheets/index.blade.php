@extends('layouts.simple.master')
@section('title', 'Delivery Sheets')

@section('css')
<style>
  form {
    width: 50%;
  }

  .status {
     background-color: black;
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
<h3>Delivery Sheets</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Delivery Sheets</h5>
               @hasrole('rider')

               @else
                  <button class="btn btn-primary ml-auto" data-toggle="modal" href="#addPickup">Generate</button>
               @endhasrole
           </div>
           @include('layouts.messages')

           {{-- Generate delivery sheet modal --}}
           <div class="modal fade" id="addPickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Delivery Sheet</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="theme-form" method="POST" action="{{ route('sheet.store') }}">
                  <div class="modal-body">
                    @csrf
                    <div class="form-group">
                      <label class="col-form-label pt-0">Route</label>
                      <input type="text" name="route" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label pt-0">Rider</label>
                      <select name="rider" class="form-control selectC" style="width: 100%; border: 1px solid grey;" >
                        @foreach ($riders as $rider)
                        <option value="{{$rider->id}}">{{$rider->name}}</option>
                        @endforeach
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
                           {{-- @foreach ($shipments as $shipment)
                             <option value="{{$shipment->id}}">{{$shipment->user->company->company_name}} - {{$shipment->customer_address}}</option>
                           @endforeach --}}
                           {{-- <option value=""><div class="badge badge-danger bg-dark">hello</div></option> --}}
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
            {{-- generate modals end --}}

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
                                 <a href="{{route('shipment-record', $sheet->id)}}"><button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button></a>

                                 <a data-toggle="modal" href="#deleteModal{{$sheet->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                              {{-- Delete Modal --}}
                              <div class="modal fade" id="deleteModal{{$sheet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete Delivery Sheet</h5>
                                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                       </div>
                                       <div class="modal-body">Are you sure you want to delete this Delivery Sheet?</div>
                                       <div class="modal-footer">
                                          <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                          <a href="{{ route('sheet.delete',$sheet->id) }}">
                                          <button class="btn btn-secondary" type="button">Delete</button>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- modal -->
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
                                 <a href="{{route('shipment-record', $sheet->id)}}"><button class="btn btn-primary btn-xs"><i class="fa fa-list-ul btn-action"></i></button></a>
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
{{-- <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script> --}}
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
@endsection