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
    td {
      text-align: center;
    }
  </style>
</head>
<body>
  
  <table style="margin-bottom: 25px;">
    <tr>
      <th style="border: none; text-align: right; padding-right: 10px;">From Date</th>
      <td style="border: none; text-align: left;">{{$from_date}}</td>
      <th style="border: none; text-align: right; padding-right: 10px;">To Date</th>
      <td style="border: none; text-align: left;">{{$to_date}}</td>
    </tr>
  </table>

  <table class="table" width="100%">
    <thead>
      <tr>
        <th>Rider name</th>
        <th>Date</th>
        <th>No. of Deliveries</th>
      </tr>
    </thead>
    @foreach ($sheets as $sheet)
      <tr>
        <td>{{$rider}}</td>
        <td>{{$sheet->delivery_date}}</td>
        <td>{{$sheet->deliveries}}</td>
      </tr>
    @endforeach 
  </table>
</body>
</html>