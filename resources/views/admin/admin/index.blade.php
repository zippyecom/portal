@extends('layouts.simple.master')
@section('title', 'All admins')

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
<h3>All Admins</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Admins</h5>
           </div>
           @include('layouts.messages')
            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                         <th scope="col">Id</th>
                         <th scope="col">Name</th>
                         <th scope="col">Email</th>
                         <th scope="col">City</th>
                         <th scope="col">CNIC</th>
                         <th scope="col">Actions</th>
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($admins as $admin)
                      <tr>
                        <th scope="row">{{ $admin->id }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email}}</td>
                        <td>{{ $admin->city}}</td>
                        <td>{{ $admin->cnic}}</td>
                        <td>
                           <a data-toggle="modal" href="#editModal{{$admin->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil btn-action"></i></button></a>

                           {{-- Edit modal --}}
                           <div class="modal fade" id="editModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">Edit Admin</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form class="theme-form" method="POST" action="{{ route('admin.update', $admin->id) }}">
                                       <div class="modal-body">
                                          @csrf
                                          <div class="form-group">
                                             <label class="col-form-label">Name</label>
                                             <input class="form-control" type="text" name="name" value="{{ $admin->name }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Email</label>
                                             <input class="form-control" type="email" name="email" value="{{ $admin->email }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">CNIC</label>
                                             <input class="form-control" type="text" name="cnic" value="{{ $admin->cnic }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">City</label>
                                             <input class="form-control" type="text" name="city" value="{{ $admin->city }}">
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


                           <a data-toggle="modal" href="#deleteModal{{$admin->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                           {{-- Delete Modal --}}
                           <div class="modal fade" id="deleteModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Delete Admin</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">Are you sure you want to delete this admin?</div>
                                    <div class="modal-footer">
                                       <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                       <a href="{{ url('admin/delete/'.$admin->id) }}">
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