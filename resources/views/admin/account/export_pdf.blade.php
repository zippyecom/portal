
<!DOCTYPE html>
<html>
<head>
	<title></title>
  
  
  
  <style>
  table{
    table-layout: auto;
     width: 105%;
     margin-left: -5px;
    
  }
  td,th
{
  
  
}
    
    table,td{
      border:1px solid black;
    }
    .tab { 
            display: inline-block; 
            margin-left: 50px; 
        } 
        img{
          height: 70px;
          width:60px;
          position: absolute;
          left: 10px;
          top: 15px;
          z-index: -1;
         
          
          
          
        }
  </style>
</head>
<body>

  @foreach ($keyvalue as $key )
  <div style="padding-bottom: 150px;">

  <table style=" background-color: #F8FEFF;">
    <tr >
      <td rowspan="3" colspan="2" valign="top" style="width:350px;">
    
    <h3 style="color: #27AE60; padding-left:80px;"><b> Kashmir Cargo & Courier Service</b></h3>
    <img src="KCSLogo.png" alt="" style="margin-top: 0px;">
        <p style="margin:0px; padding-left:90px;"> Koral Office helpline #.ph:051-2326176,</p><br>
         <p style="padding-left:150px; margin-top:-20px; padding-top:-10px;"> 0300-0338053,</p><br>
       <div style="margin-top:-50px; padding-left:50px;">
        <p> www.kcslogistics.com.pk email:csd@kcslogistics.com.pk</p>
        </div>
      </td>
      <td colspan="2" style="width:350px;">
        <div style="padding-left:55px;">
        {!! $key->barcode !!} 
        </div>
        <p style="margin-top:0px"><center> {{ $key->number }} </center></p>
                 
      
          
      </td>
    </tr>
    <tr rowspan="">
      <td rowspan="">
        <center> ORIGIN </center><br><br><br>
        
       
      </td>
      
      <td rowspan="">
        <center> DESTINATION </center>  <br><br><br>
        
      </td>

    </tr>
    
    <tr>
      <td >
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="padding-bottom: -20px;">
        <label for="vehicle1"> OVERNIGHT </label>
        
      </td>
      <td>

        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="padding-top: 20px; text-decoration-line: ">
           <label for="vehicle1" style="padding-bottom: 20px;"> SAME DAY</label>
      </td>
    </tr>
    <tr>
      <td rowspan="6" valign="top" style="border-bottom: none;">

        (SENDER)<br>
        
   
        
        
      
      </td>
      <td rowspan="6" valign="top" style="border-bottom: none;">
        (RECIVER)<br>
        
        
      </td>

      
    </tr>
    <tr style="margin-top:-50px;">
      <td>
        DTM 
        <br><br>
      </td>
      <td>
        overland 
        <br><br> 
      </td>
    </tr>
    <tr>
      <td>
        <center> PIECES</center><br><br>
      </td>
      <td>
        <center> WEIGHT</center><br><br>
      </td>
    </tr>
    <tr>
      <td>
        paris <br><br>
      </td>
      <td>
      <br><br>
      </td>
    </tr>
    <tr>
      <td>
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">CASH<br><br>
      </td>
      <td>
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1" style="margin-bottom: 20px;">ACCOUNT<br><br></label>
      </td>
    </tr>
    <tr>
      <td rowspan="1">
        SP VAN<br>CHARGES Rs.<br><br>
      </td>
      <td>
      <br><br>
      </td>
    </tr>
    

    
    
    
    <tr>
      <td>
      <p style="margin-top:-40px;"> Tel# _____________________</p> 
         ACTUAL RATE<br> CHARGES Rs.
      </td>
      <td>
      <p style="margin-top:-40px;"> Tel# _____________________</p> 
         OTHER<br> CHARGES Rs.
      </td>
      <td colspan="2">
        COD/<br>TO PAY Rs.
      </td>
      
    </tr>
    
    <tr>
      <td >
      <br><br>
      </td>
      <td>
        <br><br>
      </td>
      <td colspan="2">
        <br><br>
      </td>
    </tr>
    <tr>
      <td colspan="4">
       <p style="padding-left: 400px;">Vollum</p>
      </td>
      
    </tr>
    <tr>
      <td rowspan="4" colspan="2" valign="top">
        <U>THAT ALL ABOVE DETAIL GIVEN HERE IN ARE TRUE & CORRECT</U><br>
        <p><u>PAYMENT BY TX</u>_____________<u> DATE</u>__________<br></p><br>
        <p style="text-decoration: overline; padding-left:180px;">RECEIVER'S SIGNATURE</p>
        <p>TERM AND CONDITION</p>
      </td>
      
    </tr>
    <tr>
      <td style="background-color: #1E8449; color: white;">
        CASH
        <br><br>
      </td>
      <td>
      <br><br>
      </td>
    </tr>
    <tr>
      <td>
        GST.
        <br><br>
      </td>
      <td>
      <br><br>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        TOTAL<br><br>
      </td>
      
    </tr>
    
    
  </table>
  </div>
  
@endforeach







</body>
</html>