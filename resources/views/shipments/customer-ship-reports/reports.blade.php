@extends('layouts.simple.master')
@section('title', 'Reports')

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

      .card .reports-header {
        border-radius: 10px;
        border-bottom: none;
      }
   </style>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Reoports</h3>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
           <h5>Shipment Reports</h5>
          </div>
          @include('layouts.messages')
            <div class="card-body">
             <div class="row">
              <div class="col-sm-12 col-xl-6">
                <div class="card border">
                  <div class="card-header reports-header">
                    <h5>Booked Shipments</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="111"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-12 col-xl-6">
                <div class="card border">
                  <div class="card-header reports-header">
                    <h5>Arrived Shipments</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="222"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border">
                  <div class="card-header reports-header">
                    <h5>In-Transit Shipment</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="333"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border">
                  <div class="card-header reports-header">
                    <h5>Delivered Shipments</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="444"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border">
                  <div class="card-header reports-header">
                    <h5>Returned Shipments</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="555"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border">
                  <div class="card-header reports-header">
                    <h5>Cancelled Shipments</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="666"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border reports-header">
                  <div class="card-header reports-header">
                    <h5>All Shipments</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="000"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border reports-header">
                  <div class="card-header reports-header">
                    <h5>Payment Reports</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="888"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border reports-header">
                  <div class="card-header reports-header">
                    <h5>Manifest</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="888"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border reports-header">
                  <div class="card-header reports-header">
                    <h5>UserWise booking Report</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="888"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border reports-header">
                  <div class="card-header reports-header">
                    <h5>Daily/Monthly Sale Report</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="888"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card border reports-header">
                  <div class="card-header reports-header">
                    <h5>UserWise Sale Report</h5>
                    <div class="card-header-right p-0">
                      <a data-toggle="modal" href="#generateReport" class="btn btn-primary generate" report-key="888"><i class="fa fa-print btn-action" style="color: #fff"></i></a>
                    </div>
                  </div>
                </div>
              </div>

             </div>
            </div>

            {{-- Reports modal --}}
           <div class="modal fade" id="generateReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Report for shipments</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                </div>
                <form class="theme-form" id="generateForm" method="POST" action="">
                  <div class="modal-body">
                    @csrf
                    <div class="form-group">
                      <label class="col-form-label pt-0">From Date</label>
                      <input type="date" class="form-control" name="from_date" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">To Date</label>
                        <input type="date" class="form-control" name="to_date" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label pt-0">To City</label>
                        <select name="to_city" class="form-control" required>
                          <option value="Islamabad">Islamabad</option>
                          <option value="Rawalpindi">Rawalpindi</option>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Generate</button>
                  </div>
                </form>
               </div>
              </div>
            </div>
            {{-- reports modals end --}}

          </div>
        </div>
     </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>
$(document).ready(function () {
    $('.generate').click(function () {
      var key_val = $(this).attr('report-key');
      var url = "cust-pdf/"+key_val;
      $("#generateForm").attr("action", url);
    });
});
</script>
@endsection