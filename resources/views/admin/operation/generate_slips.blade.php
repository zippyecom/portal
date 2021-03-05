
@extends('layouts.simple.master')
@section('title', 'Create Operation')

@section('css')


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

  
  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  border: 2px solid black;

  
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
   /* Black w/ opacity */
}


.bbb{
  border: 2px solid black;
  padding-bottom: 100px;
  padding-top: 20px;
  padding-left:200px;
  height: 200px;
  width: 870px;
}
/* Modal Content */
.modal-content {
  
  margin: auto;
  padding: 0px;
  border: 1px solid #888;
  width: 80%;

}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
  
  .open {

    display: inline-block;
    width: 300px;
    height: 40px;
    vertical-align: middle;
    border-radius: 30px;
    margin: 0;

    
    font-size: 1rem;
    color: white;
    background: black;
    border: 1px solid #666666;
  }

  .open:hover {
    border: 1px solid #666666;
    background: #666666;
    color: #ffffff;
  }

  .card-body{
    text-align: center;
    height: 200px;
  }
  .open{
    border-radius: 30px;
  }
  .kk{
    background-color: #8689D4;

  } 
  .text_c{
    padding-left: 80px;
    padding-right: 80px;
  }
  table{
    border: 2px solid black;
    border-radius: 15px 50px 30px 5px;
    

  }
  

</style>
@endsection

@section('style')

@endsection
<div>
@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3> <font color="black">Generate slips</font> </h3>
@endsection

@section('content')
<div class="container-fluid ">
  <div class="row">
     <div class="col-sm-12">
           
           @include('layouts.messages')
           
              
                @csrf
                <div class="form-group " >
                  <form action="store" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <center>
                      <table>
                        <tr>
                          <th style="padding-bottom: 120px; padding-top: 30px;padding-left: 20px;padding-right: 20px;">
                            <h1>How many barcodes do you want to Generte</h1>
                          </th>
                        </tr>
                        <tr>
                          <td style="padding-bottom: 70px;">
                            <center>
                            <input type="text" name="number" placeholder="Enter number" id="text" style="width: 350px; height: 40px; border-radius: 10px; ">
                            </center>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding-bottom: 40px;">
                            <center>
                            <input type="submit" value="submit" name="btn" class="btn btn-primary" style="width: 200px;">
                            </center>
                          </td>
                        </tr>
                      </table>
                      <br><br><br>
                    
                    <br><br><br><br>
                   


                    
                  </center>
                  
                  </form>
                  
                  
                </div>
        </div>
     </div>
  </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/slips.js')}}"></script> 
<script src="jquery-2.1.4.js"></script>
<script src="jspdf.min.js"></script>


@endsection