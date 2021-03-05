@extends('layouts.simple.master')
@section('title', 'Barcode & QrCode')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/tree.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Barcode & QrCode</li>
@endsection

@section('breadcrumb-title')
<h3>Barcode & QrCode</h3>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               @foreach ($users_date as $item)
                  {{$item->reg_date}}
               @endforeach
               <h5>Barcode & QrCode</h5>
               <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
            <span>{!! DNS2D::getBarcodeHTML('16', 'QRCODE', 4, 4, '#a2f2f2') !!}</span>
            <span>{!! DNS2D::getBarcodeHTML('16', 'QRCODE', 4, 4) !!}</span>
            </div>
            <div class="card-body">
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('4', 'C39+',3,44,array(1,1,1), true)}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('13', 'C39E')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('14', 'C39E+')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('15', 'C93')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('19', 'S25')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('20', 'S25+')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('21', 'I25')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('22', 'MSI+')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('17', 'PDF417')}}" alt="barcode" />
               <hr>
               <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" />
               <hr>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection