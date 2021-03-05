@extends('layouts.simple.master')
@section('title', 'Settings')

@section('css')
<style>
  form {
    width: 50%;
  }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/tree.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Settings</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Settings</h5>
           </div>
           @include('layouts.messages')
           <div class="card-body">
              <form class="theme-form" method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-form-label pt-0">Main Logo</label><br>
                    <input type="file" name="main_logo">
                    <input type="text" name="main_logo_old" value="{{$main_logo}}" hidden>
                </div>

                <div class="form-group">
                    <label class="col-form-label pt-0">Website Icon</label><br>
                    <input type="file" name="icon">
                    <input type="text" name="icon_old" value="{{$icon}}" hidden>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Login Logo</label><br>
                  <input type="file" name="login_logo">
                  <input type="text" name="login_logo_old" value="{{$login_logo}}" hidden>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Footer Left</label>
                  <input type="text" class="form-control" name="footer_left" value="{{$footer_left}}">
                </div>

                <div class="form-group">
                  <label class="col-form-label">Footer Right</label>
                  <input type="text" class="form-control" name="footer_right" value="{{$footer_right}}">
                </div>

                <div class="form-group form-row mt-3 mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Change Settings</button>
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