@extends('layouts.simple.master')
@section('title', 'Create Customer')

@section('css')
@endsection

@section('style')
<style>
  i.fa.fa-plus-circle {
    padding-top: 8px;
    color: green;
    font-size: 22px;
    margin-top: 0;
  }
  
  i.fa.fa-minus-circle {
    padding-top: 8px;
    color: red;
    font-size: 22px;
    margin-top: 0;
  }
</style>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Create Customer</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <h5>Create Customer</h5>
           </div>
           @include('layouts.messages')
           <div class="card-body">
              <form class="theme-form" method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="col-form-label pt-0">Contact Name</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="col-form-label pt-0">Company Email Address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                  <label class="col-form-label">CNIC</label>
                  <input type="text" class="form-control" name="cnic" value="{{ old('cnic') }}" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">City</label>
                  <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">

                  @error('city')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="col-form-label">Comapny Name</label>
                  <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Company NTN</label>
                  <input type="text" class="form-control" name="company_ntn" value="{{ old('company_ntn') }}">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Company Address</label>
                  <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Pickup Address</label>
                  <input type="text" class="form-control" name="pick_address" value="{{ old('pick_address') }}" required>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Logo</label><br>
                  <input type="file" name="logo">
                </div>

                <div class="weight-inputs">
                  <div class="form-row">
                    <div class="col-3">
                      <input type="text" class="form-control" name="weight[]" placeholder="Weight">
                    </div>
                    <div class="col-3">
                      <input type="number" class="form-control" name="price[]" placeholder="Price">
                    </div>
                    <div class="col-3">
                      <input type="number" class="form-control" name="tb_price[]" placeholder="Timebound Price">
                    </div>
                    <div class="col-1">
                      <a href="javascript:void(0)" id="add"><i class="fa fa-plus-circle"></i></a>
                    </div>
                  </div>
                </div>

                <input type="hidden" id="hiddenVal" name="input" value="0">

                <div class="form-group form-row mt-3 mb-0">
                  <button class="btn btn-primary btn-block" type="submit">Create Customer</button>
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
<script>
  $(document).ready(function(){
    var wrapper = $(".weight-inputs"); //Fields wrapper
      $("#add").click(function(e){
        var counter = parseInt($("#hiddenVal").val());
        counter++;
        $("#hiddenVal").val(counter);

        e.preventDefault();
        $(wrapper).append(`
          <div class="form-row mt-2">
            <div class="col-3">
              <input type="text" class="form-control" name="weight[]" placeholder="Weight">
            </div>
            <div class="col-3">
              <input type="number" class="form-control" name="price[]" placeholder="Price">
            </div>
            <div class="col-3">
              <input type="number" class="form-control" name="tb_price[]" placeholder="Timebound Price">
            </div>
            <div class="col-1">
              <a href="javascript:void(0)" id="sub"><i class="fa fa-minus-circle"></i></a>
            </div>
          </div>
        `);
      });
      $(wrapper).on("click", "a#sub" , function(e) {
        var counter = parseInt($("#hiddenVal").val());
        counter--;
        $("#hiddenVal").val(counter);
        e.preventDefault();  $(this).parent().parent().remove();
      }); 
  });
</script>
@endsection