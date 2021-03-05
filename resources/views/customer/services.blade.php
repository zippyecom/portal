@extends('layouts.simple.master')
@section('title', 'Services')

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
<h3>Services</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex align-itmes-center">
              <h5 class="mr-auto">Cash On Delivery (COD)</h5>
              <label class="switch">
                <input type="checkbox" checked name="collect_cash"><span class="switch-state"></span>
              </label>
           </div>
           @include('layouts.messages')
            <div class="card-body">
             <div class="table-responsive">
                <table class="display" id="basic-1">
                   <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Price</th>                  
                        <th scope="col">Timebound Price</th>                  
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($weights as $weight)
                      <tr>
                        <td>{{ $weight->id }}</td>
                        <td>{{ $weight->weight }}</td>
                        <td>{{ $weight->price }}</td>
                        <td>{{ $weight->tb_price}}</td>
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