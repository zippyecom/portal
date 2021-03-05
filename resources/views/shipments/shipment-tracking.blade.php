<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      {{-- <link rel="icon" href="/storage/logos/{{$settings->icon}}" type="image/x-icon">
      <link rel="shortcut icon"  href="/storage/logos/{{$settings->icon}}" type="image/x-icon"> --}}
      @include('layouts.simple.css')
      @yield('style')
      <title>Consignment tracking</title>
</head>
<body>
  <div>
    <!-- u-step with icon-->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header align-center">
          <img class="mx-auto d-block" src="{{asset('assets/images/zippy/logo.svg')}}" height=99 width=270>
        </div>

        
        <div class="card-body">
          <h6 class="mb-4">Consignment Note # {{$shipment->consignment_no}}</h6>
          <h5>Delivery Status</h5>
          <div class="u-steps row">
            <div class="u-step col-sm-3 @if($shipment->status == 'Booked')current @endif"><span class="u-step-number">1</span>
              <div class="u-step-desc"><span class="u-step-title">Booked</span>
                <p>Shipment ready for pickup</p>
              </div>
            </div>
            <div class="u-step col-sm-3 @if($shipment->status == 'Arrived')current @endif"><span class="u-step-number">2</span>
              <div class="u-step-desc"><span class="u-step-title">Arrived</span>
                <p>Shipment arrived at ZIPPY office</p>
              </div>
            </div>
            <div class="u-step col-sm-3 @if($shipment->status == 'In-transit')current @endif"><span class="u-step-number">3</span>
              <div class="u-step-desc"><span class="u-step-title">In Transit</span>
                <p>Will be delivered in a while</p>
              </div>
            </div>
            <div class="u-step col-sm-3 @if($shipment->status == 'Delivered')current @endif"><span class="u-step-number">4</span>
              <div class="u-step-desc"><span class="u-step-title">Delivered</span>
                <p>Delivered to customer</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>