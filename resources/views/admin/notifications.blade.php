@extends('layouts.simple.master')
@section('title', 'Notifications')

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
<h3>Notifications</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Notifications</h5>
              <button class="btn btn-primary ml-auto" data-toggle="modal" href="#addPickup">Add New Notification</button> 
           </div>
           @include('layouts.messages')

           {{-- Add notification modal --}}
           <div class="modal fade" id="addPickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Notification</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="theme-form" method="POST" action="{{ route('notifications.create') }}">
                  <div class="modal-body">
                    @csrf
                    <div class="form-group">
                      <label class="col-form-label pt-0">Text</label>
                      <input type="text" class="form-control" name="text" required placeholder="Enter Notification Text">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Start Date</label>
                        <input type="date" class="form-control" name="start_date" required autofocus>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Pickup Person Email</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Color</label>
                        <select name="color" class="form-control">
                          <option value="alert-primary">Primary</option>
                          <option value="alert-success">Success</option>
                          <option value="alert-danger">Danger</option>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add Notification</button>
                  </div>
                </form>
               </div>
              </div>
            </div>
            {{-- notification modals end --}}

            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                         <th scope="col">Id</th>
                         <th scope="col">Text</th>
                         <th scope="col">Start Date</th>
                         <th scope="col">End Date</th>
                         <th scope="col">Color</th>
                         <th scope="col">Actions</th>                      
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($notifications as $notification)
                      <tr>
                        <td>{{ $notification->id }}</td>
                        <td>{{ $notification->text }}</td>
                        <td>{{ $notification->start_date }}</td>
                        <td>{{ $notification->end_date }}</td>
                        <td>{{ $notification->color }}</td>
                        <td>
                          <a data-toggle="modal" href="#deleteModal{{$notification->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                          {{-- Delete Modal --}}
                          <div class="modal fade" id="deleteModal{{$notification->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Notification</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   </div>
                                   <div class="modal-body">Are you sure you want to delete this Notification?</div>
                                   <div class="modal-footer">
                                      <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                      <a href="{{ route('notifications.delete',$notification->id) }}">
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