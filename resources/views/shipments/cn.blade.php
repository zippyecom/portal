<?php 
   $settings = App\Settings::find(1);
   $home_add = App\Settings::find(7)->value;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<link rel="icon" href="/storage/logos/{{$settings->icon}}" type="image/x-icon">
<link rel="shortcut icon"  href="/storage/logos/{{$settings->icon}}" type="image/x-icon">
<title>Zippy Consignment Note</title>

</head>

<body>
<style>
.tab {
  border-color: gray;
  border-width: 1px 1px 0px 0px;
  border-style: solid;
}

.tdl {
  border-color: gray;
  border-width: 0px 0px 1px 1px;
  border-style: solid;
  margin: 0;
  padding: 4px;
}

.tdl1 {
  border-color: gray;
  border-width: 0px 0px 0px 1px;
  border-style: solid;
  margin: 0;
  padding: 4px;
}

</style>

<table style="width:660px">
  <tr>
    <td>
      <table class="tab" cellpadding="0" cellspacing="0" style="font-size:10px;font-family:arial;">
        <tr>
        <td rowspan="3" class="tdl" width="100">&nbsp;<img src="{{asset('assets/images/zippy/logo.svg')}}" height=33 width=90><br><span style="font-size:10px; ">&nbsp;&nbsp;A ZIPPY (Pvt) Ltd{{$shipment->consignment_no}}</span>
          </td>
          <td rowspan="3" colspan="2" valign="bottom" width="85" class="tdl" align="center"><div id="barcodec" style="font-weight: 100;">
            {!! DNS1D::getBarcodeHTML($shipment->consignment_no, 'C39E', 1,33,'black', true); !!}</div><span style="font-size:9px;">Accounts Copy</span></td>
          <td class="tdl" rowspan="3" colspan="4"><span style="font-weight: bold; font-size: 14px;">{{$shipment->user->company->company_name}}</span> <br>{{$shipment->user->company->address}}<br>{{$shipment->user->company->phone}}<br>{{$shipment->user->email}}</td>
          
          <td class="tdl" colspan="2" rowspan="6" valign="top" align="center"><div id="qrcode" valign="top">{!! DNS2D::getBarcodeHTML($home_add.'tracking/'.$shipment->consignment_no, 'QRCODE',2,2, '#ec6400') !!}</div><br><span style="font-size:8px;">Track & Comments</span></td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td class="tdl">&nbsp;Consignee</td>
          <td colspan="2" class="tdl1">&nbsp;{{$shipment->customer_name}}</td>
          <td class="tdl">&nbsp;Date</td>
          <td class="tdl">&nbsp;{{$shipment->created_at->format('d/m/Y')}}</td>
          <td class="tdl">&nbsp;Time</td>
          <td class="tdl">&nbsp;{{$shipment->created_at->format('H:m')}}</td>
        </tr>
        <tr>
          <td colspan="3" class="tdl" valign="top" width=290>{{$shipment->customer_address}}<BR>{{$shipment->customer_phone}}<BR>{{$shipment->customer_email}}</td>
          <td class="tdl" rowspan="1">Origin City</td>
          <td class="tdl" rowspan="1"></td>
          <td class="tdl" rowspan="1">Destination</td>
          <td class="tdl" rowspan="1">{{$shipment->destination_city}}</td>
        </tr>
        <tr>
          <td class="tdl">&nbsp;Pieces &nbsp;&nbsp;&nbsp;<span class="tdl1">&nbsp;&nbsp;{{$shipment->quantity}}</span></td>
          <td class="tdl">&nbsp;Weight &nbsp;&nbsp;<span class="tdl1">&nbsp;&nbsp;{{$shipment->weights->weight}}</span></td><td class="tdl">&nbsp;Cash Collect </td><td class="tdl">&nbsp; Rs.{{$shipment->product_value}}/-</td>
          <td class="tdl">&nbsp;Service</td>
          <td class="tdl" colspan="2">&nbsp;{{$shipment->service_type}}</td>
        </tr>
        {{-- <tr>
          <td class="tdl">&nbsp;Product Detail</td><td class="tdl" colspan="5">hhhhhhh</td>
          <td class="tdl" align="center" colspan="3" rowspan="2"><b></b></td>
        </tr> --}}
        <tr>
          <td class="tdl">&nbsp;Remarks: </td>
          <td class="tdl" colspan="3">{{$shipment->remarks}} </td>
          <td class="tdl"> Ref:</td>
          <td class="tdl" colspan="3" style="font-size:12px;">{{$shipment->product_reference}}</td>
        </tr>
        {{-- <tr>
          <td class="tdl">&nbsp;Note</td><td class="tdl" colspan="7">Please only pay Rs.{{$shipment->product_value}}/- to the courier when you recieve your shipment. No additional fees or deposit should be paid.</td>
        </tr> --}}
      </table>
    </td>
  </tr>


  <tr>
    <td align="center">--------------------------------------------------------------------------------------</td>
  </tr>


  <tr>
    <td>
      <table class="tab" cellpadding="0" cellspacing="0" style="font-size:10px;font-family:arial;">
        <tr>
        <td rowspan="3" class="tdl" width="100">&nbsp;<img src="{{asset('assets/images/zippy/logo.svg')}}" height=33 width=90><br><span style="font-size:10px; ">&nbsp;&nbsp;A ZIPPY (Pvt) Ltd{{$shipment->consignment_no}}</span>
          </td>
          <td rowspan="3" colspan="2" valign="bottom" width="85" class="tdl" align="center"><div id="barcodec" style="font-weight: 100;">
            {!! DNS1D::getBarcodeHTML($shipment->consignment_no, 'C39E', 1,33,'black', true); !!}</div><span style="font-size:9px;">Customer Copy</span></td>
          <td class="tdl" rowspan="3" colspan="4"><span style="font-weight: bold; font-size: 14px;">{{$shipment->user->company->company_name}}</span> <br>{{$shipment->user->company->address}}<br>{{$shipment->user->company->phone}}<br>{{$shipment->user->email}}</td>
          
          <td class="tdl" colspan="2" rowspan="6" valign="top" align="center"><div id="qrcode" valign="top">{!! DNS2D::getBarcodeHTML($home_add.'tracking/'.$shipment->consignment_no, 'QRCODE',2,2, '#ec6400') !!}</div><br><span style="font-size:8px;">Track & Comments</span></td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td class="tdl">&nbsp;Consignee</td>
          <td colspan="2" class="tdl1">&nbsp;{{$shipment->customer_name}}</td>
          <td class="tdl">&nbsp;Date</td>
          <td class="tdl">&nbsp;{{$shipment->created_at->format('d/m/Y')}}</td>
          <td class="tdl">&nbsp;Time</td>
          <td class="tdl">&nbsp;{{$shipment->created_at->format('H:m')}}</td>
        </tr>
        <tr>
          <td colspan="3" class="tdl" valign="top" width=290>{{$shipment->customer_address}}<BR>{{$shipment->customer_phone}}<BR>{{$shipment->customer_email}}</td>
          <td class="tdl" rowspan="1">Origin City</td>
          <td class="tdl" rowspan="1"></td>
          <td class="tdl" rowspan="1">Destination</td>
          <td class="tdl" rowspan="1">{{$shipment->destination_city}}</td>
        </tr>
        <tr>
          <td class="tdl">&nbsp;Pieces &nbsp;&nbsp;&nbsp;<span class="tdl1">&nbsp;&nbsp;{{$shipment->quantity}}</span></td>
          <td class="tdl">&nbsp;Weight &nbsp;&nbsp;<span class="tdl1">&nbsp;&nbsp;{{$shipment->weights->weight}}</span></td><td class="tdl">&nbsp;Cash Collect </td><td class="tdl">&nbsp; Rs.{{$shipment->product_value}}/-</td>
          <td class="tdl">&nbsp;Service</td>
          <td class="tdl" colspan="2">&nbsp;{{$shipment->service_type}}</td>
        </tr>
        {{-- <tr>
          <td class="tdl">&nbsp;Product Detail</td><td class="tdl" colspan="5">hhhhhhh</td>
          <td class="tdl" align="center" colspan="3" rowspan="2"><b></b></td>
        </tr> --}}
        <tr>
          <td class="tdl">&nbsp;Remarks: </td>
          <td class="tdl" colspan="3">{{$shipment->remarks}} </td>
          <td class="tdl"> Ref:</td>
          <td class="tdl" colspan="3" style="font-size:12px;">{{$shipment->product_reference}}</td>
        </tr>
        <tr>
          <td class="tdl">&nbsp;Note</td><td class="tdl" colspan="7">Please only pay Rs.{{$shipment->product_value}}/- to the courier when you recieve your shipment. No additional fees or deposit should be paid.</td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td align="center">--------------------------------------------------------------------------------------</td>
  </tr>

  <tr>
    <td>
      <table class="tab" cellpadding="0" cellspacing="0" style="font-size:10px;font-family:arial;">
        <tr>
        <td rowspan="3" class="tdl" width="100">&nbsp;<img src="{{asset('assets/images/zippy/logo.svg')}}" height=33 width=90><br><span style="font-size:10px; ">&nbsp;&nbsp;A ZIPPY (Pvt) Ltd{{$shipment->consignment_no}}</span>
          </td>
          <td rowspan="3" colspan="2" valign="bottom" width="85" class="tdl" align="center"><div id="barcodec" style="font-weight: 100;">
            {!! DNS1D::getBarcodeHTML($shipment->consignment_no, 'C39E', 1,33,'black', true); !!}</div><span style="font-size:9px;">Vendor Copy</span></td>
          <td class="tdl" rowspan="3" colspan="4"><span style="font-weight: bold; font-size: 14px;">{{$shipment->user->company->company_name}}</span> <br>{{$shipment->user->company->address}}<br>{{$shipment->user->company->phone}}<br>{{$shipment->user->email}}</td>
          
          <td class="tdl" colspan="2" rowspan="6" valign="top" align="center"><div id="qrcode" valign="top">{!! DNS2D::getBarcodeHTML($home_add.'tracking/'.$shipment->consignment_no, 'QRCODE',2,2, '#ec6400') !!}</div><br><span style="font-size:8px;">Track & Comments</span></td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td class="tdl">&nbsp;Consignee</td>
          <td colspan="2" class="tdl1">&nbsp;{{$shipment->customer_name}}</td>
          <td class="tdl">&nbsp;Date</td>
          <td class="tdl">&nbsp;{{$shipment->created_at->format('d/m/Y')}}</td>
          <td class="tdl">&nbsp;Time</td>
          <td class="tdl">&nbsp;{{$shipment->created_at->format('H:m')}}</td>
        </tr>
        <tr>
          <td colspan="3" class="tdl" valign="top" width=290>{{$shipment->customer_address}}<BR>{{$shipment->customer_phone}}<BR>{{$shipment->customer_email}}</td>
          <td class="tdl" rowspan="1">Origin City</td>
          <td class="tdl" rowspan="1"></td>
          <td class="tdl" rowspan="1">Destination</td>
          <td class="tdl" rowspan="1">{{$shipment->destination_city}}</td>
        </tr>
        <tr>
          <td class="tdl">&nbsp;Pieces &nbsp;&nbsp;&nbsp;<span class="tdl1">&nbsp;&nbsp;{{$shipment->quantity}}</span></td>
          <td class="tdl">&nbsp;Weight &nbsp;&nbsp;<span class="tdl1">&nbsp;&nbsp;{{$shipment->weights->weight}}</span></td><td class="tdl">&nbsp;Cash Collect </td><td class="tdl">&nbsp; Rs.{{$shipment->product_value}}/-</td>
          <td class="tdl">&nbsp;Service</td>
          <td class="tdl" colspan="2">&nbsp;{{$shipment->service_type}}</td>
        </tr>
        {{-- <tr>
          <td class="tdl">&nbsp;Product Detail</td><td class="tdl" colspan="5">hhhhhhh</td>
          <td class="tdl" align="center" colspan="3" rowspan="2"><b></b></td>
        </tr> --}}
        <tr>
          <td class="tdl">&nbsp;Remarks: </td>
          <td class="tdl" colspan="3">{{$shipment->remarks}} </td>
          <td class="tdl"> Ref:</td>
          <td class="tdl" colspan="3" style="font-size:12px;">{{$shipment->product_reference}}</td>
        </tr>
        {{-- <tr>
          <td class="tdl">&nbsp;Note</td><td class="tdl" colspan="7">Please only pay Rs.{{$shipment->product_value}}/- to the courier when you recieve your shipment. No additional fees or deposit should be paid.</td>
        </tr> --}}
      </table>
    </td>
  </tr>

  <tr>
    <td>
      <table>
        <tr>
          <td>
            <div style="border:thin solid gray; font-size:10px;font-family:arial; padding: 2px 4px;">
            <b>TERMS AND CONDITIONS OF CARRIAGE</b><br>
            1. When ordering Zippy's services you, as "Shipper", are agreeing, on your behalf and on behalf of anyone else with an interest in the Shipment that the Terms and Conditions shall apply from the time that Zippy accepts the Shipment unless otherwise agreed in writing by an authorized officer of Zippy. A "waybill" shall include any label produced by Zippy's automated systems, air waybill, or consignment note and shall incorporate these Every Shipment is transported on a limited liability basis as provided herein "Zippy" means any member of the UNS Network. This is the ephemeral version of "Standard Terms & Conditions of Carriage".<br>
            2. Unacceptable Shipments: Shipper agrees that its Shipment is acceptable for transportation and is deemed unacceptable if:  • It is classified as hazardous material, dangerous goods, prohibited or restricted articles by IATA (International Air Transport Association), ICAO (International Civil Aviation Organization), any applicable government department or other relevant organization; • No customs declaration is made when required by applicable customs regulations; or • Zippy decides it cannot transport an item safely or legally (such items include but are not limited to: animals, bullion, currency, bearer form negotiable instruments, precious metals and stones, firearms, parts thereof and ammunition, human remains, pornography and illegal narcotics/drugs).<br>
            3. Deliveries & Un-deliverables: Shipments cannot be delivered to PO boxes or postal codes. Shipments are delivered to the Receiver's address given by Shipper (which in the case of mail services shall be deemed to be the first receiving postal service) but not necessarily to the named Receiver personally. <br>
            4. Inspection & Liability: Zippy has the right to open and inspect a Shipment without prior notice to Shipper. The liability of the Zippy is limited to the Terms & Conditions of Carriage as mentioned in standard terms & conditions of carriage as published on our website.
            </div>
          </td>
        </tr>
      </table>
      
      {{-- <table>
        <tr>
          <td>
            
          </td>
        </tr>
      </table> --}}
    </td>
  </tr>
</table>
</body>
</html>