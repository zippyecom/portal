@extends('layouts.simple.master')
@section('title', 'Create Rider')

@section('css')
<style>
  form {
    width: 50%;
  }
</style>
@endsection

@section('style')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Create Rider</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Create Rider</h5>
           </div>
           @include('layouts.messages')
           <div class="card-body">
              <form class="theme-form" method="POST" action="{{ route('rider.store') }}">
                @csrf
                <div class="form-group">
                    <label class="col-form-label pt-0">Name</label>
                    <input id="name" type="text" class="form-control" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label pt-0">Email Address</label>
                    <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="col-form-label">CNIC</label>
                  <input type="text" class="form-control" name="cnic">
                </div>

                <div class="form-group">
                  <label class="col-form-label">City</label>
                  <input type="text" class="form-control" @error('city') is-invalid @enderror" name="city">

                  @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group form-row mt-3 mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Create Rider</button>
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