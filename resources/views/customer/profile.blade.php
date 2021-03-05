@extends('layouts.simple.master')
@section('title', 'Profile')

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

      .grey-bg {
        background-color: rgb(228, 228, 228) !important;
      }

   </style>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Profile</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
              <h5>Profile</h5>
          </div>
          @include('layouts.messages')

          <div class="card-body">
            <form class="theme-form col-6" method="POST" action="{{ route('change-password', Auth::user()->id) }}">
              <div class="modal-body">
                @csrf
                <div class="form-group">
                  <label class="col-form-label pt-0">Name</label>
                <input type="text" class="form-control grey-bg" name="name" required autofocus placeholder="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Email</label>
                    <input type="email" class="form-control grey-bg" name="contact" required autofocus placeholder="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">CNIC</label>
                    <input type="text" class="form-control grey-bg" name="email" required autofocus placeholder="{{ Auth::user()->cnic }}" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">City</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="{{ Auth::user()->city }}" disabled>
                </div>
                
                @hasrole('customer')
                <div class="form-group">
                    <label class="col-form-label pt-0">Company Name</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="{{ Auth::user()->company->company_name }}" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Phone</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="{{ Auth::user()->company->phone }}" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Company NTN</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="{{ Auth::user()->company->company_ntn }}" disabled>
                </div>
                <div class="form-group">
                    <label class="col-form-label pt-0">Address</label>
                    <input type="text" class="form-control grey-bg" name="pickup_address" required autofocus placeholder="{{ Auth::user()->company->address }}" disabled>
                </div>
                @endhasrole
                <div class="form-group">
                  <label class="col-form-label pt-0">Change Password</label>
                  <input type="password" class="form-control" name="password" required placeholder="Enter new password">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@endsection