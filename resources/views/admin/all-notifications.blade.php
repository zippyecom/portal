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
          </div>
          @include('layouts.messages')

          <div class="card-body">

            @hasrole('admin|operation')
              @foreach ($admin_notifications as $notification)
                <div class="alert alert-light dark" role="alert">
                  <a href="{{$notification->link}}">{{$notification->notification_text}}</a>
                  @if ($notification->isRead == 1)
                  <div class="badge badge-success">Read</div>
                  @endif
                  <span class="pull-right">{{$notification->created_at->diffForHumans()}}</span>
                </div>
              @endforeach
            @endhasrole

            @hasrole('customer')
              @foreach ($customer_notifications as $notification)
                <div class="alert alert-light dark" role="alert">
                  <a href="{{$notification->link}}">{{$notification->notification_text}}</a>
                  @if ($notification->isRead == 1)
                  <div class="badge badge-success">Read</div>
                  @endif
                  <span class="pull-right">{{$notification->created_at->diffForHumans()}}</span>
                </div>
              @endforeach
            @endhasrole
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