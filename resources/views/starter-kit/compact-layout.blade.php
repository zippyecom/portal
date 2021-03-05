@extends('layouts.compact.master')
@section('title', '- Compact Layout')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Starter Kit</li>
<li class="breadcrumb-item">Page Layout</li>
<li class="breadcrumb-item active">Compact Layout</li>
@endsection

@section('breadcrumb-title')
<h3>Compact Layout</h3>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>Sample Card</h5>
               <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
            </div>
            <div class="card-body">
               <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection