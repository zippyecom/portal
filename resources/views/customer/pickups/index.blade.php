@extends('layouts.simple.master')
@section('title', 'Pickup Locations')

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
<h3>Pickup Locations</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Pickup Locations List</h5>
              <button class="btn btn-primary ml-auto" data-toggle="modal" href="#addPickup">Add Pickup Location</button> 
           </div>
           @include('layouts.messages')

           {{-- Add pickup modal --}}
           <div class="modal fade" id="addPickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Pickup Location</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="theme-form" method="POST" action="{{ route('location') }}">
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add Pickup</button>
                  </div>
                </form>
               </div>
              </div>
            </div>
            {{-- Edit modals end --}}

            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                         <th scope="col">Id</th>
                         <th scope="col">Name</th>
                         <th scope="col">Contact No.</th>
                         <th scope="col">Email</th>
                         <th scope="col">Origin</th>
                         <th scope="col">Pickup Address</th> 
                         <th scope="col">Actions</th>                      
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($pickups as $pickup)
                      <tr>
                        <td>{{ $pickup->id }}</td>
                        <td>{{ $pickup->name }}</td>
                        <td>{{ $pickup->contact }}</td>
                        <td>{{ $pickup->email }}</td>
                        <td>{{ $pickup->origin_city }}</td>
                        <td>{{ $pickup->pickup_address }}</td>
                        <td>
                          <a data-toggle="modal" href="#editModal{{$pickup->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil btn-action"></i></button></a>

                          {{-- Edit modal --}}
                          <div class="modal fade" id="editModal{{$pickup->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title">Edit Pickup Location</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <form class="theme-form" method="POST" action="{{ route('pickups.update', $pickup->id) }}">
                                      <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                          <label class="col-form-label pt-0">Pickup Person Name</label>
                                          <input type="text" class="form-control" name="name" value="{{ $pickup->name }}" required autofocus placeholder="Enter Pickup Person Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Pickup Person Contact No.</label>
                                            <input type="number" class="form-control" name="contact" value="{{ $pickup->contact }}" required autofocus placeholder="Enter Pickup Person Contact No.">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Pickup Person Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $pickup->email }}" required autofocus placeholder="Enter Pickup Person Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Address</label>
                                            <input id="newAddress" type="text" class="form-control" name="pickup_address" value="{{ $pickup->pickup_address }}" required autofocus placeholder="Enter Pickup Address">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                         <button class="btn btn-primary" type="submit">Update</button>
                                      </div>
                                   </form>
                                </div>
                             </div>
                          </div>
                          {{-- Edit modals end --}}


                          <a data-toggle="modal" href="#deleteModal{{$pickup->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                          {{-- Delete Modal --}}
                          <div class="modal fade" id="deleteModal{{$pickup->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Pickup Location</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <div class="modal-body">Are you sure you want to delete this Pickup Location?</div>
                                   <div class="modal-footer">
                                      <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                      <a href="{{ route('pickups.delete',$pickup->id) }}">
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