@extends('layouts.simple.master')
@section('title', 'All Customers')

@section('css')
<style>
  
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
<h3>All Customer</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>customers</h5>
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
                         <th scope="col">Company</th>
                         <th scope="col">Actions</th>
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($customers as $customer)
                      <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email}}</td>
                        {{-- <td>{{ $customer->getRoleNames()->implode(' ') }}</td> --}}
                        <td>{{ $customer->company->company_name }}</td>
                        <td>
                           <a data-toggle="modal" href="#editModal{{$customer->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil btn-action"></i></button></a>

                           {{-- Edit modal --}}
                           <div class="modal fade" id="editModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">Edit Customer</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form class="theme-form" method="POST" action="{{ route('customer.update', $customer->id) }}">
                                       <div class="modal-body">
                                          @csrf
                                          <div class="form-group">
                                             <label class="col-form-label">Contact Name</label>
                                             <input class="form-control" type="text" name="name" value="{{ $customer->name }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Company Email Address</label>
                                             <input class="form-control" type="email" name="email" value="{{ $customer->email }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">CNIC</label>
                                             <input class="form-control" type="text" name="cnic" value="{{ $customer->cnic }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">City</label>
                                             <input class="form-control" type="text" name="city" value="{{ $customer->city }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Company Name</label>
                                             <input class="form-control" type="text" name="company_name" value="{{ $customer->company->company_name }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Phone</label>
                                             <input class="form-control" type="text" name="phone" value="{{ $customer->company->phone }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Company NTN</label>
                                             <input class="form-control" type="text" name="company_ntn" value="{{ $customer->company->company_ntn }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Address</label>
                                             <input class="form-control" type="text" name="address" value="{{ $customer->company->address }}">
                                          </div>
                                          <div class="form-group">
                                             <label class="col-form-label">Logo</label>
                                             <input class="form-control" type="file" name="logo">
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


                           <a data-toggle="modal" href="#deleteModal{{$customer->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o btn-action"></i></button></a>

                           {{-- Delete Modal --}}
                           <div class="modal fade" id="deleteModal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
                                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">Are you sure you want to delete this customer?</div>
                                    <div class="modal-footer">
                                       <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                       <a href="{{ url('customer/delete/'.$customer->id) }}">
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