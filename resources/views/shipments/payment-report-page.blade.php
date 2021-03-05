<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}"> --}}
  <title>Document</title>
  <style>
    table, th, td {
      border: 1px solid black;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
  </style>
</head>
<body>
  
  <table class="table" width="100%">
    <thead>
      <tr>
        <th>Consignment No</th>
        <th>Customer Name</th>
        <th>Customer Address</th>
        <th>Customer Email</th>
        <th>Customer Phone</th>
        <th>Destination City</th>
        <th>Service Type</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Weight</th>
        <th>Product Value</th>
        <th>Product Reference</th>
        <th>Remarks</th>
        <th>Status</th>
        <th>Comments</th>
      </tr>
    </thead>
    @foreach ($shipments as $shipment)
      <tr>
        <td>{{$shipment->consignment_no}}</td>
        <td>{{$shipment->customer_name}}</td>
        <td>{{$shipment->customer_address}}</td>
        <td>{{$shipment->customer_email}}</td>
        <td>{{$shipment->customer_phone}}</td>
        <td>{{$shipment->destination_city}}</td>
        <td>{{$shipment->service_type}}</td>
        <td>{{$shipment->product_name}}</td>
        <td>{{$shipment->quantity}}</td>
        <td>{{$shipment->weights->weight}}</td>
        <td>{{$shipment->product_value}}</td>
        <td>{{$shipment->product_reference}}</td>
        <td>{{$shipment->remarks}}</td>
        <td>{{$shipment->status}}</td>
        <td>{{$shipment->comment}}</td>
      </tr>
    @endforeach 
  </table>

  <table style="margin-top: 20px; width: 50%;">
    <thead>
      <tr>
        <th>Weight</th>
        <th>Weight Price</th>
        <th>Number of Shipments</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0; ?>
      @foreach ($weights as $key => $value)
        @php
          $weight = App\Weights::find($key);
          $total_price = App\Shipment::where('weights_id', $key)->get();
          $total += $weight->price * $value;
        @endphp

        <tr>
          <th style="text-align: left">{{$weight->weight}}</th>
          <td>{{$weight->price}}</td>
          <td>{{$value}}</td>
          <td>{{$weight->price * $value}}</td>
        </tr>
      @endforeach
      <tr>
        <th colspan="3" style="text-align: left">Total</th>
        <th style="text-align: left">{{$total}}</th>
      </tr>
    </tbody>
  </table>
</body>
</html>