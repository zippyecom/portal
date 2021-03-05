{{-- @foreach ($shipmentSheets as $ss)
  <p>{{ $ss->sheet->user->name }}</p>
  <p>{{ $ss->shipment->customer_name }}</p>
@endforeach --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delivery Sheet</title>
  @include('layouts.simple.css')

  <style>
    body {
      background-color: #fff;
    }
    table {
      width: 100%;
      /* table-layout: fixed; */
    }
    table {
      border: 2px solid black;
    }

    td {
      padding: 0 6px;
    }
    .align-right {
      text-align: right;
    }
    .details {
      width: 25%;
    }
  </style>
</head>
<body>
  <div class="container-fluid mt-5">
    <img src="{{asset('assets/images/zippy/kcs.png')}}" alt="" width="270" style="display: block; margin: 0 auto;">
    
    <table class="mt-3">
      <tr>
        <td class="w-25 align-right">SHEET #</td>
        <td class="details">{{$sheet->id}}</td>
        <td class="align-right">ROUTE</td>
        <td>{{$sheet->route}}</td>
      </tr>
      <tr>
        <td class="w-25 align-right">DELIVERY DATE</td>
        <td>{{$sheet->date}}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="w-25 align-right">STATION</td>
        <td>{{$sheet->station}}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="w-25 align-right">COURIER OFFICER</td>
        <td>{{ucfirst(Auth::user()->name)}}</td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <table class="mt-3">
      <tr style="border-bottom: 2px solid black; font: bold;">
        <td>SR #</td>
        <td>CN #</td>
        <td>CONSIGNEE NAME</td>
        <td>CONSIGNEE CONTACT</td>
        <td>CONSIGNEE ADDRESS</td>
        <td>COD AMOUNT</td>
        <td>WEIGHT</td>
        <td>Received By</td>
      </tr>

      @foreach ($shipmentSheets as $key => $ss)
      <tr style="border-bottom: 1px solid rgb(189, 189, 189);">
        <td>{{ $key+1 }}</td>
        <td>{{ $ss->shipment->consignment_no }}</td>
        <td>{{ $ss->shipment->customer_name }}</td>
        <td>{{ $ss->shipment->customer_phone }}</td>
        <td>{{ $ss->shipment->customer_address }}</td>
        <td>{{ $ss->shipment->product_value }}</td>
        <td>{{ $ss->shipment->weights->weight }}</td>
        <td></td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>