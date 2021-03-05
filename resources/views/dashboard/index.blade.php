@extends('layouts.simple.master')
@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('breadcrumb-title')
<h3>Home</h3>
@endsection

@section('content')
@role('admin|operation')

<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12 xl-100 box-col-12">
         <div class="row total-sale-col">
            <div class="col-xl-5 box-col-12 xl-100">
               
               @hasrole('admin')
               <div class="">
                  <div class="project-overview" style="margin-top: 8%;">
                     <div class="row">
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-info">{{$total_customers}}</h2>
                           <p class="mb-0">Total customers</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-danger">{{$total_riders}}</h2>
                           <p class="mb-0">Total Riders</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-secondary">{{$total_admins}}</h2>
                           <p class="mb-0">Total Admins</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-success">{{$total_operations}}</h2>
                           <p class="mb-0">Total Operations</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-success">{{$total_accounts}}</h2>
                           <p class="mb-0">Total Accounts</p>
                        </div>
                     </div>
                  </div>
               </div>
               @endhasrole

               <div class="">
                  <div class="project-overview">
                     <div class="row">
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-primary">{{$total_booked_shipments}}</h2>
                           <p class="mb-0">Booked Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-secondary">{{$total_arrived_shipments}}</h2>
                           <p class="mb-0">Arrived Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-success">{{$total_in_transit_shipments}}</h2>
                           <p class="mb-0">In-Transit Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-info">{{$total_delivered_shipments}}</h2>
                           <p class="mb-0">Delivered Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-danger">{{$total_returned_shipments}}</h2>
                           <p class="mb-0">Returned Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-warning">{{$total_cancelled_shipments}}</h2>
                           <p class="mb-0">Cancelled Shipments</p>
                        </div>
                     </div>
                  </div>
               </div>

               @hasrole('admin')
               <div class="row">
                  <div class="col-sm-12 col-xl-12 box-col-6">
                     <div class="card card-with-border">
                       <div class="card-header">
                         <h5>Users Registration Statistics</h5>
                       </div>
                       <div class="card-body">
                         <div id="area-spaline-123"></div>
                       </div>
                     </div>
                   </div>
                  {{-- <div class="col-12 xl-50">
                     <div class="card card-with-border welcome-card o-hidden">
                        <img class="main" src="{{asset('assets/images/dashboard/welcome.png')}}" alt=""><img class="decore1" src="{{asset('assets/images/dashboard/d1.png')}}" alt=""><img class="decore3" src="{{asset('assets/images/dashboard/d1.png')}}" alt=""><img class="decore4" src="{{asset('assets/images/dashboard/d1.png')}}" alt=""><img class="decore2" src="{{asset('assets/images/dashboard/d2.png')}}" alt="">
                        <div class="card-header card-no-border o-hidden total-sale-widget">
                           <div class="media">
                              <div class="media-body">
                                 <h3 class="f-w-600">Hello Johan Deo !</h3>
                                 <p>  Welcome back to xolo dashboard</p>
                              </div>
                           </div>
                           <div class="media mt-5">
                              <div class="media-body">
                                 <h5 class="f-w-400">Wednesday, 20</h5>
                                 <p class="mb-0">Today's Sale<span class="font-success">3.56%<i class="fa fa-caret-up"></i></span></p>
                                 <div class="sales-widgets d-flex mt-1">
                                    <h3 class="mt-1 mb-0 f-w-600"><i class="mr-1 txt-primary" data-feather="dollar-sign"></i><span class="counter txt-primary">405,</span><span class="ml-2 f-12 f-w-400">Earrning</span></h3>
                                 </div>
                                 <p class="mb-0">your sales & earning over the last 24 hours</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 xl-50">
                     <div class="card card-with-border o-hidden total-sale-widget">
                        <div class="media align-items-center">
                           <div class="media-left">
                              <div class="card-no-border p-20">
                                 <div class="media">
                                    <div class="media-body">
                                       <p class="mb-0">Total Sale<span class="font-warning">3.56%<i class="fa fa-caret-up"></i></span></p>
                                       <div class="sales-widgets d-flex">
                                          <h3 class="mt-1 mb-0 f-w-600"><i class="mr-1" data-feather="dollar-sign"></i><span class="counter">12,461</span></h3>
                                          <p class="mb-0">Last Year</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="media-right">
                              <div class="card-body p-0">
                                 <div class="apex-chart-container">
                                    <div id="timeline-chart1"> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card card-with-border o-hidden total-sale-widget">
                        <div class="media align-items-center">
                           <div class="media-left">
                              <div class="card-no-border p-20">
                                 <div class="media">
                                    <div class="media-body">
                                       <p class="mb-0">Active Customer<span class="font-success">01.56<i class="fa fa-caret-up"></i></span></p>
                                       <div class="sales-widgets d-flex">
                                          <h3 class="mt-1 mb-0 f-w-600"><span class="counter">10,14,12</span></h3>
                                          <p class="mb-0">Last Day</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="media-right">
                              <div class="card-body p-0">
                                 <div class="apex-chart-container">
                                    <div id="timeline-chart2"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> --}}
               </div>
               @endhasrole
            </div>
            {{-- <div class="col-xl-7 xl-100 box-col-12">
               <div class="card card-with-border monthly-growth o-hidden">
                  <div class="card-header card-no-border">
                     <h5>Monthly Revenue Growth</h5>
                     <span>Number of This Monthly Revenue Growth</span>
                  </div>
                  <div class="card-body pt-0 px-0">
                     <div class="chart-value-box pull-right chart-data-set">
                        <div class="value-square-box-primary"></div>
                        <span>Purchase</span>
                        <div class="value-square-box-light ml-3"></div>
                        <span>Sale</span>
                     </div>
                     <div class="dashboard-rounded-chart flot-chart-container">
                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><line x1="54.6533203125" x2="54.6533203125" y1="260" y2="160" class="ct-bar" ct:value="4" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="198.9599609375" x2="198.9599609375" y1="260" y2="135" class="ct-bar" ct:value="5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="343.2666015625" x2="343.2666015625" y1="260" y2="127.5" class="ct-bar" ct:value="5.3" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="487.5732421875" x2="487.5732421875" y1="260" y2="135" class="ct-bar" ct:value="5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="631.8798828125" x2="631.8798828125" y1="260" y2="115" class="ct-bar" ct:value="5.8" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="776.1865234375" x2="776.1865234375" y1="260" y2="135" class="ct-bar" ct:value="5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="920.4931640625" x2="920.4931640625" y1="260" y2="110" class="ct-bar" ct:value="6" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="1064.7998046875" x2="1064.7998046875" y1="260" y2="122.5" class="ct-bar" ct:value="5.5" style="stroke-width: 12px ; stroke-linecap: round"></line></g><g class="ct-series ct-series-b"><line x1="69.6533203125" x2="69.6533203125" y1="260" y2="100" class="ct-bar" ct:value="6.4" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="213.9599609375" x2="213.9599609375" y1="260" y2="85" class="ct-bar" ct:value="7" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="358.2666015625" x2="358.2666015625" y1="260" y2="60" class="ct-bar" ct:value="8" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="502.5732421875" x2="502.5732421875" y1="260" y2="72.5" class="ct-bar" ct:value="7.5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="646.8798828125" x2="646.8798828125" y1="260" y2="47.5" class="ct-bar" ct:value="8.5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="791.1865234375" x2="791.1865234375" y1="260" y2="65" class="ct-bar" ct:value="7.8" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="935.4931640625" x2="935.4931640625" y1="260" y2="10" class="ct-bar" ct:value="10" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="1079.7998046875" x2="1079.7998046875" y1="260" y2="35" class="ct-bar" ct:value="9" style="stroke-width: 12px ; stroke-linecap: round"></line></g><g class="ct-series ct-series-c"><line x1="84.6533203125" x2="84.6533203125" y1="260" y2="185" class="ct-bar" ct:value="3" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="228.9599609375" x2="228.9599609375" y1="260" y2="172.5" class="ct-bar" ct:value="3.5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="373.2666015625" x2="373.2666015625" y1="260" y2="180" class="ct-bar" ct:value="3.2" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="517.5732421875" x2="517.5732421875" y1="260" y2="210" class="ct-bar" ct:value="2" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="661.8798828125" x2="661.8798828125" y1="260" y2="165" class="ct-bar" ct:value="3.8" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="806.1865234375" x2="806.1865234375" y1="260" y2="160" class="ct-bar" ct:value="4" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="950.4931640625" x2="950.4931640625" y1="260" y2="135" class="ct-bar" ct:value="5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="1094.7998046875" x2="1094.7998046875" y1="260" y2="172.5" class="ct-bar" ct:value="3.5" style="stroke-width: 12px ; stroke-linecap: round"></line></g><g class="ct-series ct-series-d"><line x1="99.6533203125" x2="99.6533203125" y1="260" y2="222.5" class="ct-bar" ct:value="1.5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="243.9599609375" x2="243.9599609375" y1="260" y2="210" class="ct-bar" ct:value="2" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="388.2666015625" x2="388.2666015625" y1="260" y2="230" class="ct-bar" ct:value="1.2" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="532.5732421875" x2="532.5732421875" y1="260" y2="247.5" class="ct-bar" ct:value="0.5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="676.8798828125" x2="676.8798828125" y1="260" y2="215" class="ct-bar" ct:value="1.8" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="821.1865234375" x2="821.1865234375" y1="260" y2="160" class="ct-bar" ct:value="4" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="965.4931640625" x2="965.4931640625" y1="260" y2="135" class="ct-bar" ct:value="5" style="stroke-width: 12px ; stroke-linecap: round"></line><line x1="1109.7998046875" x2="1109.7998046875" y1="260" y2="247.5" class="ct-bar" ct:value="0.5" style="stroke-width: 12px ; stroke-linecap: round"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="5" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">0</span></foreignObject><foreignObject style="overflow: visible;" x="149.306640625" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">10</span></foreignObject><foreignObject style="overflow: visible;" x="293.61328125" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">20</span></foreignObject><foreignObject style="overflow: visible;" x="437.919921875" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">30</span></foreignObject><foreignObject style="overflow: visible;" x="582.2265625" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">40</span></foreignObject><foreignObject style="overflow: visible;" x="726.533203125" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">50</span></foreignObject><foreignObject style="overflow: visible;" x="870.83984375" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">60</span></foreignObject><foreignObject style="overflow: visible;" x="1015.146484375" y="265" width="144.306640625" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 144px; height: 0px;">70</span></foreignObject></g></svg>
                     </div>
                     <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                     </div>
                  </div>
                  <div class="card-footer p-0">
                     <div class="row growth-revenue-footer">
                        <div class="col-6">
                           <div class="card ecommerce-widget mb-0">
                              <div class="card-body support-ticket-font">
                                 <div class="d-flex">
                                    <div class="data-left-ticket">
                                       <span class="f-12">Total booked shipments</span>
                                       <h5 class="total-num"><span class="mr-1">$</span><span class="counter">{{$total_booked_shipments}}</span></h5>
                                    </div>
                                    <div class="data-right-ticket">
                                       <div class="text-md-right">
                                          <ul>
                                             <li><span class="f-12">85% goal reached</span></li>
                                             <li>
                                                <h6 class="mb-0">1,00,000</h6>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="progress-showcase">
                                    <div class="progress sm-progress-bar">
                                       <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="card ecommerce-widget mb-0">
                              <div class="card-body support-ticket-font">
                                 <div class="d-flex">
                                    <div class="data-left-ticket">
                                       <span class="f-12">Total Income</span>
                                       <h5 class="total-num"><span class="mr-1">$</span><span class="counter"> 4,685</span></h5>
                                    </div>
                                    <div class="data-right-ticket">
                                       <div class="text-md-right">
                                          <ul>
                                             <li><span class="f-12">45% goal reached</span></li>
                                             <li>
                                                <h6 class="mb-0">1,00,000</h6>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="progress-showcase">
                                    <div class="progress sm-progress-bar">
                                       <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="card ecommerce-widget mb-0">
                              <div class="card-body support-ticket-font pt-0">
                                 <div class="d-flex">
                                    <div class="data-left-ticket">
                                       <span class="f-12">Active User</span>
                                       <h5 class="total-num"><span class="mr-1">$</span><span class="counter"> 3,513</span></h5>
                                    </div>
                                    <div class="data-right-ticket">
                                       <div class="text-md-right">
                                          <ul>
                                             <li><span class="f-12">70% goal reached</span></li>
                                             <li>
                                                <h6 class="mb-0">1,00,000</h6>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="progress-showcase">
                                    <div class="progress sm-progress-bar">
                                       <div class="progress-bar bg-primary-light" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="card ecommerce-widget mb-0">
                              <div class="card-body support-ticket-font pt-0">
                                 <div class="d-flex">
                                    <div class="data-left-ticket">
                                       <span class="f-12">Total Tax</span>
                                       <h5 class="total-num"><span class="mr-1">$</span><span class="counter"> 2,749</span></h5>
                                    </div>
                                    <div class="data-right-ticket">
                                       <div class="text-md-right">
                                          <ul>
                                             <li><span class="f-12">52% goal reached</span></li>
                                             <li>
                                                <h6 class="mb-0">1,00,000</h6>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="progress-showcase">
                                    <div class="progress sm-progress-bar">
                                       <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div> --}}
         </div>
      </div>
      <div class="col-xl-6 xl-100 box-col-12">
         <div class="card card-with-border total-users-lists">
            <div class="card-header card-no-border">
               <h5>Total New Venders</h5>
               <span>Number of Totally Users</span>
            </div>
            <div class="card-body p-0">
               <div class="users-total table-responsive">
                  <table class="table table-bordernone">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Company</th>
                           <th>Phone</th>
                           <th>Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($vendors as $vendor)
                           <tr>
                              <td>
                                 <div class="d-inline-block align-middle">
                                    <div class="d-inline-block"><span>{{ $vendor->name }}</span></div>
                                 </div>
                              </td>
                              <td><span>{{$vendor->company->company_name}}</span></td>
                              <td><span>{{$vendor->company->phone}}</span></td>
                              <td><span class="f-12">{{ $vendor->created_at->format('d M Y')}}</span></td>
                           </tr> 
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="code-box-copy">
                  <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
               </div>
            </div>
         </div>
      </div>
      {{-- <div class="col-xl-6 xl-100 box-col-12">
         <div class="card card-with-border total-users-lists">
            <div class="card-header card-no-border">
               <h5>Today Transaction Details</h5>
               <span>Today's transaction</span>
            </div>
            <div class="card-body p-0">
               <div class="users-total table-responsive">
                  <table class="table table-bordernone">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Invoice No.</th>
                           <th>Date</th>
                           <th>Status</th>
                           <th>Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <div class="d-inline-block align-middle">
                                 <img class="img-40 align-top m-r-15 b-r-10" src="{{asset('assets/images/user/9.jpg')}}" alt="">
                                 <div class="d-inline-block"><span>Karen Leah</span></div>
                              </div>
                           </td>
                           <td>#PX0101</td>
                           <td><span class="f-12">9:01</span></td>
                           <td><span class="txt-success">Complete &#x2764;</span></td>
                           <td><span>8652.00 $</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-inline-block align-middle">
                                 <img class="img-40 align-top m-r-15 b-r-10" src="{{asset('assets/images/user/10.jpg')}}" alt="">
                                 <div class="d-inline-block"><span>Mary Esco</span></div>
                              </div>
                           </td>
                           <td>#PX0102</td>
                           <td><span class="f-12">9:10</span></td>
                           <td><span class="txt-warning">In progress &#8987;</span></td>
                           <td><span>102.00 $</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-inline-block align-middle">
                                 <img class="img-40 align-top m-r-15 b-r-10" src="{{asset('assets/images/user/11.jpg')}}" alt="">
                                 <div class="d-inline-block"><span>Wiltor Molly</span></div>
                              </div>
                           </td>
                           <td>#PX0103</td>
                           <td><span class="f-12">9:42</span></td>
                           <td><span class="txt-danger">Due &#8986;</span></td>
                           <td><span>2315.00 $</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-inline-block align-middle">
                                 <img class="img-40 align-top m-r-15 b-r-10" src="{{asset('assets/images/user/12.png')}}" alt="">
                                 <div class="d-inline-block"><span>Anna Colin</span></div>
                              </div>
                           </td>
                           <td>#PX0104</td>
                           <td><span class="f-12">10:01</span></td>
                           <td><span class="txt-danger">Due &#8986;</span></td>
                           <td><span>4513.00 $</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-inline-block align-middle">
                                 <img class="img-40 align-top m-r-15 b-r-10" src="{{asset('assets/images/user/14.png')}}" alt="">
                                 <div class="d-inline-block"><span>Josep Jus</span></div>
                              </div>
                           </td>
                           <td>#PX0105</td>
                           <td><span class="f-12">10:01</span></td>
                           <td><span class="txt-success">complete &#x2764;</span></td>
                           <td><span>4513.00 $</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-inline-block align-middle">
                                 <img class="img-40 align-top m-r-15 b-r-10" src="{{asset('assets/images/user/2.jpg')}}" alt="">
                                 <div class="d-inline-block"><span>Paul Owen</span></div>
                              </div>
                           </td>
                           <td>#PX0106</td>
                           <td><span class="f-12">10:50</span></td>
                           <td><span class="txt-warning">In progress &#8987;</span></td>
                           <td><span>4513.00 $</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-inline-block align-middle">
                                 <img class="img-40 align-top m-r-15 b-r-10" src="{{asset('assets/images/user/10.jpg')}}" alt="">
                                 <div class="d-inline-block"><span>Burgess Carr</span></div>
                              </div>
                           </td>
                           <td>#PX0107</td>
                           <td><span class="f-12">10:59</span></td>
                           <td><span class="txt-success">complete &#x2764;</span></td>
                           <td><span>4513.00 $</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="code-box-copy">
                  <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-5 xl-100 box-col-12">
         <div class="card investments card-with-border">
            <div class="card-header card-no-border">
               <h5>Total Investment</h5>
               <span>Number of  Revenue Growth</span>
            </div>
            <div class="card-body p-0">
               <div id="circlechart"></div>
               <div class="code-box-copy">
                  <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
               </div>
            </div>
            <div class="card-footer p-0">
               <ul>
                  <li class="text-center">
                     <span class="f-12">Total</span>
                     <h6 class="f-w-600 mb-0">$34,4562</h6>
                  </li>
                  <li class="text-center">
                     <span class="f-12">Monthly</span>
                     <h6 class="f-w-600 mb-0">$12,463</h6>
                  </li>
                  <li class="text-center">
                     <span class="f-12">Daily</span>
                     <h6 class="f-w-600 mb-0">$5000</h6>
                  </li>
               </ul>
            </div>
         </div>
      </div> --}}
   </div>
</div>
@endrole
@php
   $notifications = App\Notification::all();
@endphp

@hasrole('customer')
<div class="container-fluid">
   @foreach($notifications as $notification)
      <div class="alert {{$notification->color}} dark alert-dismissible fade show" role="alert">{{$notification->text}}
      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
   @endforeach
   <div class="row">
      <div class="col-xl-9 xl-100 box-col-12">
         <div class="row">
            <div class="col-12">
               <div class="project-overview">
                  <div class="row">
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-primary">{{$booked_shipments}}</h2>
                        <p class="mb-0">Booked Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-secondary">{{$arrived_shipments}}</h2>
                        <p class="mb-0">Arrived Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-success">{{$in_transit_shipments}}</h2>
                        <p class="mb-0">In-Transit Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-info">{{$delivered_shipments}}</h2>
                        <p class="mb-0">Delivered Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-danger">{{$returned_shipments}}</h2>
                        <p class="mb-0">Returned Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-warning">{{$cancelled_shipments}}</h2>
                        <p class="mb-0">Cancelled Shipments</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-7 box-col-6">
               <div class="card card-with-border monthly-growth">
                  <div class="card-header card-no-border">
                     <h5>Shipments Statistics</h5>
                     <div class="chart-value-box pull-right chart-data-set">
                        {{-- <div class="value-square-box-info"></div> --}}
                        {{-- <span>Tasks</span> --}}
                     </div>
                  </div>
                  <div class="card-body pt-0 o-hidden">
                     <div class="spaline-container">
                        <div id="area-spaline-cust"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-5 box-col-6">
               <div class="card card-with-border">
                  <div class="card-header card-no-border">
                     <h5>Shipments</h5>
                  </div>
                  <div class="card-body chart-block chart-vertical-center">
                     <canvas id="myDoughnutGraph" style="height: 333px"></canvas>
                  </div>
                  {{-- <div class="card-body pt-0 o-hidden">
                     <div class="apex-circle">
                        <div id="circlechart"></div>
                     </div>
                  </div> --}}
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 xl-100 box-col-6">
         <div class="card card-with-border connection firm-activity">
            <div class="card-header">
               <h5 class="d-inline-block">Today's Activity</h5>
               <span class="pull-right mt-0">{{count($activities)}}</span>
            </div>
            <div class="card-body p-0">
               <ul>
                  @foreach ($activities as $activity)
                     <li>
                        <div class="media">
                           <span style="background-color: #ec6400; font-weight: 800; color: white; padding: 4px 5px; border-radius: 3px;">{{$activity->shipment->consignment_no}}</span>
                           <div class="media-body ml-3">
                              <span class="f-w-600">{{$activity->description}}</span>
                              <p>{{$activity->created_at->diffForHumans()}}</p>
                           </div>
                        </div>
                     </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
      <div class="col-xl-6 xl-100 box-col-12">
         <div class="row">
            <div class="col-xl-12 col-md-6 box-col-6">
               <div class="card card-with-border">
                  <div class="card-body revenue-project">
                     <h6>Monthly Sale</h6>
                     <ul>
                        <li>
                           <p>Growth</p>
                           <h4>Rs. <span class="counter">{{$total_monthly_revenue}}</span></h4>
                        </li>
                        <li>
                           <div class="apex-spark">
                              <div id="spark33"></div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            {{-- <div class="col-xl-12 col-md-6 box-col-6">
               <div class="card card-with-border">
                  <div class="card-body revenue-project inovice-ul">
                     <h6>Invoices</h6>
                     <ul>
                        <li>
                           <p>Due</p>
                           <h4>$<span class="counter">54612</span></h4>
                        </li>
                        <li>
                           <p>Overdue</p>
                           <h4>$<span class="counter">61271</span></h4>
                        </li>
                     </ul>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
</div>
@endhasrole

{{-- <div class="container-fluid">
   <div class="row">
      <div class="col-md-6 col-xl-3 xl-50 col-lg-6 box-col-6">
         <div class="card social-widget-card">
            <div class="p-25">
               <div class="media b-b-light">
                  <div class="media-left mr-4">
                     <div class="redial-social-widget radial-bar-70" data-label="20%"><i class="icofont icofont-tasks-alt txt-primary"></i></div>
                  </div>
                  <div class="media-right">
                     <h5>Unresolve</h5>
                     <p>Lorem Ipsum is simply dummy  text of the Loren dummy text.</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col text-center b-r-light">
                     <span>Today</span>
                     <h6 class="counter mb-0">05</h6>
                  </div>
                  <div class="col text-center b-r-light">
                     <span>last Month</span>
                     <h6 class="counter mb-0">56</h6>
                  </div>
                  <div class="col text-center">
                     <span>Total</span>
                     <h6 class="counter mb-0">61</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-xl-3 xl-50 col-lg-6 box-col-6">
         <div class="card social-widget-card">
            <div class="p-25">
               <div class="media b-b-light">
                  <div class="media-left mr-4">
                     <div class="redial-social-widget radial-bar-20 bar-sucess" data-label="20%"><i class="icofont icofont-clock-time txt-success"></i></div>
                  </div>
                  <div class="media-right">
                     <h5>Open</h5>
                     <p>Lorem Ipsum is simply dummy  text of the Loren dummy text.</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col text-center b-r-light">
                     <span>Today</span>
                     <h6 class="counter mb-0">100</h6>
                  </div>
                  <div class="col text-center b-r-light">
                     <span>last Month</span>
                     <h6 class="counter mb-0">901</h6>
                  </div>
                  <div class="col text-center">
                     <span>Total</span>
                     <h6 class="counter mb-0">1001</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-xl-3 xl-50 col-lg-6 box-col-6">
         <div class="card social-widget-card">
            <div class="p-25">
               <div class="media b-b-light">
                  <div class="media-left mr-4">
                     <div class="redial-social-widget radial-bar-70 bar-warrning" data-label="50%"><i class="icofont icofont-sand-clock txt-warning"></i></div>
                  </div>
                  <div class="media-right">
                     <h5>On Hold</h5>
                     <p>Lorem Ipsum is simply dummy  text of the Loren dummy text.</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col text-center b-r-light">
                     <span>Today</span>
                     <h6 class="counter mb-0">100</h6>
                  </div>
                  <div class="col text-center b-r-light">
                     <span>last Month</span>
                     <h6 class="counter mb-0">901</h6>
                  </div>
                  <div class="col text-center">
                     <span>Total</span>
                     <h6 class="counter mb-0">1001</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-xl-3 xl-50 col-lg-6 box-col-6">
         <div class="card social-widget-card">
            <div class="p-25">
               <div class="media b-b-light">
                  <div class="media-left mr-4">
                     <div class="redial-social-widget radial-bar-70 bar-danger" data-label="50%"><i class="icofont icofont-ui-edit txt-danger"></i></div>
                  </div>
                  <div class="media-right">
                     <h5>Unassigned</h5>
                     <p>Lorem Ipsum is simply dummy  text of the Loren dummy text.</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col text-center b-r-light">
                     <span>Today</span>
                     <h6 class="counter mb-0">100</h6>
                  </div>
                  <div class="col text-center b-r-light">
                     <span>last Month</span>
                     <h6 class="counter mb-0">901</h6>
                  </div>
                  <div class="col text-center">
                     <span>Total</span>
                     <h6 class="counter mb-0">1001</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 xl-100 box-col-12">
         <div class="card card-with-border tickets o-hidden">
            <div class="card-header card-no-border">
               <div class="d-flex">
                  <h5>Ticket By Request Type</h5>
                  <button class="btn btn-outline-light" type="button">Last Week <i class="fa fa-caret-down"></i></button>
               </div>
               <p class="f-12">Lorem Ipsum is simply dummy text of the Loren dummy text of the Loren dummy printing......</p>
               <h4 class="mb-0">198</h4>
               <div class="chart-value-box pull-right ticket-legend">
                  <div class="value-square-box-primary"></div>
                  <span>Approval</span>
                  <div class="value-square-box-danger ml-3"></div>
                  <span>Cancel</span>
                  <div class="value-square-box-light ml-3"></div>
                  <span>Other</span>
               </div>
               <small class="f-w-600"> This Week <span class="font-primary">3.56% <i class="fa fa-caret-up"></i></span></small>
            </div>
            <div class="card-body p-0">
               <div class="apex-complain">
                  <div id="mix1"></div>
               </div>
               <div class="small-mix"></div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 xl-50 box-col-6">
         <div class="card card-with-border customer-satisfied">
            <div class="card-header card-no-border resolve-complain">
               <h5>Customer Satisfaction</h5>
               <p>Lorem Ipsum is simply dummy text of the Loren dummy text of the Loren dummy printing......</p>
               <div class="customers-details d-flex">
                  <div class="complain-details pl-0 d-inline-block">
                     <h4>6.8<span class="font-primary">8.74% <i class="fa fa-caret-up"></i></span></h4>
                     <span class="d-block">performance  score</span>
                  </div>
                  <div class="legend-radial d-inline-block">
                     <ul>
                        <li>
                           <div class="value-square-box-success"></div>
                           <span class="f-w-600">Excellent score</span>
                        </li>
                        <li>
                           <div class="value-square-box-secondary"></div>
                           <span class="f-w-600">Good score</span>
                        </li>
                        <li>
                           <div class="value-square-box-warning"></div>
                           <span class="f-w-600">Fair score</span>
                        </li>
                        <li>
                           <div class="value-square-box-warning"></div>
                           <span class="f-w-600">Poor score</span>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="card-body p-0">
               <div class="satisfaction-table table-responsive">
                  <table class="table table-bordernone">
                     <tbody>
                        <tr>
                           <td>
                              <p class="f-w-600">Excellent Score</p>
                              <span class="d-block"><span class="font-success">Elisse Joson San </span><span>Francisco, CA</span></span>
                           </td>
                           <td>
                              <p class="f-w-600 light-font mb-0">3,005</p>
                           </td>
                           <td><span>90%</span></td>
                           <td>
                              <div class="number-radial">
                                 <div class="radial-bar radial-bar-90 radial-bar-success" data-label="90%"></div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p class="f-w-600">Good Score</p>
                              <span class="d-block"><span class="font-secondary">Elisse Joson San </span><span>Francisco, CA</span></span>
                           </td>
                           <td>
                              <p class="f-w-600 light-font mb-0">3,005</p>
                           </td>
                           <td><span>75%</span></td>
                           <td>
                              <div class="number-radial">
                                 <div class="radial-bar radial-bar-75 radial-bar-secondary" data-label="75%"></div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p class="f-w-600">Fair Score</p>
                              <span class="d-block"><span class="font-warning">Elisse Joson San </span><span>Francisco, CA</span></span>
                           </td>
                           <td>
                              <p class="f-w-600 light-font mb-0">3,005</p>
                           </td>
                           <td><span>60%</span></td>
                           <td>
                              <div class="number-radial">
                                 <div class="radial-bar radial-bar-60 radial-bar-warning" data-label="60%"></div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p class="f-w-600">Fair Score</p>
                              <span class="d-block"><span class="font-danger">Elisse Joson San </span><span>Francisco, CA</span></span>
                           </td>
                           <td>
                              <p class="f-w-600 light-font mb-0">3,005</p>
                           </td>
                           <td><span>20%</span></td>
                           <td>
                              <div class="number-radial">
                                 <div class="radial-bar radial-bar-20 radial-bar-danger" data-label="20%"></div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 xl-50 box-col-6">
         <div class="row">
            <div class="col-sm-12">
               <div class="card card-with-border resolve-complain">
                  <div class="card-header card-no-border chart-block">
                     <div class="media">
                        <div class="small-bar">
                           <div class="small-chart flot-chart-container"></div>
                        </div>
                        <div class="media-body">
                           <h5>Resolved Complaint</h5>
                           <p class="f-12"> Lorem Ipsum is simply dummy text of the Loren dummy printing......</p>
                           <h4 class="mb-0">5m:65s<span class="f-14 light-font"> / Goal : 8m : 0s</span></h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12">
               <div class="card card-with-border complaints o-hidden">
                  <div class="card-header card-no-border d-flex">
                     <h5>Complaints Received</h5>
                     <button class="btn btn-outline-light" type="button">Last Week <i class="fa fa-caret-down"></i></button>
                  </div>
                  <div class="card-body p-0">
                     <div class="complain-details">
                        <h4> <span> This Week </span><span class="font-primary">3.56% <i class="fa fa-caret-up"></i></span>198    </h4>
                        <p class="f-12">The total number of complaints that have been received.</p>
                     </div>
                     <div class="apex-complain">
                        <div id="complain"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 xl-100 box-col-12">
         <div class="card card-with-border overall-rating">
            <div class="card-header resolve-complain card-no-border">
               <h5 class="d-inline-block">Recent Activities</h5>
               <span class="setting-round pull-right d-inline-block mt-0"><i class="fa fa-spin fa-cog"></i></span>
               <p class="f-12 mb-0">Lorem Ipsum is simply dummy text of the Loren dummy text of the Loren dummy printing......</p>
            </div>
            <div class="card-body pt-0">
               <div class="timeline-recent">
                  <div class="media">
                     <div class="timeline-line"></div>
                     <div class="timeline-dot-danger"></div>
                     <div class="media-body">
                        <span class="d-block f-w-600">Natalie reassigned ticket<span class="pull-right light-font f-w-400">2 hour ago</span></span>
                        <p> <span class="font-danger">Elisse Joson San </span>Francisco, CA</p>
                     </div>
                  </div>
                  <div class="media">
                     <div class="timeline-dot-secondary"></div>
                     <div class="media-body">
                        <span class="d-block f-w-600">Katherine submitted new ticket<span class="pull-right light-font f-w-400">5 hour ago</span></span>
                        <p> <span class="font-secondary">Elisse Joson San </span>Francisco, CA</p>
                        <p class="f-12 mb-0">Lorem Ipsum is simply dummy text of the text of the Loren dummy printing......</p>
                     </div>
                  </div>
                  <div class="media">
                     <div class="timeline-dot-success"></div>
                     <div class="media-body">
                        <span class="d-block f-w-600">Natalie reassigned ticket<span class="pull-right light-font f-w-400">8 hour ago</span></span>
                        <p> <span class="font-success">Elisse Joson San </span>Francisco, CA</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card card-with-border">
            <div class="card-header card-no-border tickets">
               <div class="d-flex">
                  <h5>Transaction History</h5>
                  <button class="btn btn-outline-light" type="button">Last Week <i class="fa fa-caret-down"></i></button>
               </div>
               <p class="f-12 mb-0">Lorem Ipsum is simply dummy text of the Loren dummy text of the Loren dummy printing......</p>
            </div>
            <div class="card-body p-0">
               <div class="transaction-table table-responsive agent-performance-table">
                  <table class="table table-bordernone">
                     <tbody>
                        <tr>
                           <td>
                              <div class="media">
                                 <div class="round-light-icon-primary"><i class="icon-money"></i></div>
                                 <div class="media-body"><span class="f-12 f-w-600">Process refund to 51451</span></div>
                              </div>
                           </td>
                           <td>
                              <p class="f-w-600">Mar 14,2019</p>
                           </td>
                           <td>
                              <div class="badge badge-primary">Completed</div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="media">
                                 <div class="round-light-icon-warning"><i class="icon-wallet"></i></div>
                                 <div class="media-body"><span class="f-12 f-w-600">Payment from 95362</span></div>
                              </div>
                           </td>
                           <td>
                              <p class="f-w-600">Apr 20,2019</p>
                           </td>
                           <td>
                              <div class="badge badge-warning">For Pickup</div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="media">
                                 <div class="round-light-icon-secondary"><i class="icon-money"></i></div>
                                 <div class="media-body"><span class="f-12 f-w-600">Process refund to 20135</span></div>
                              </div>
                           </td>
                           <td>
                              <p class="f-w-600">Apr 20,2019</p>
                           </td>
                           <td>
                              <div class="badge badge-secondary">Completed</div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="media">
                                 <div class="round-light-icon-danger"><i class="icon-wallet"></i></div>
                                 <div class="media-body"><span class="f-12 f-w-600">Payment from 15485</span></div>
                              </div>
                           </td>
                           <td>
                              <p class="f-w-600">Jan 05,2019</p>
                           </td>
                           <td>
                              <div class="badge badge-danger">10,125 Point</div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="media">
                                 <div class="round-light-icon-success"><i class="icon-money"></i></div>
                                 <div class="media-body"><span class="f-12 f-w-600">Process refund to 95685</span></div>
                              </div>
                           </td>
                           <td>
                              <p class="f-w-600">Mar 21,219</p>
                           </td>
                           <td>
                              <div class="badge badge-success">Declined</div>
                           </td>
                        </tr>
                        <tr>
                           <td class="text-center" colspan="3">
                              <button class="btn btn-light" type="button">View All Transactions</button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-8 xl-100 box-col-12">
         <div class="row">
            <div class="col-xl-6">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-with-border resolve-complain average-radial">
                        <div class="card-header card-no-border chart-block">
                           <div class="media">
                              <div class="radial-bar radial-bar-20 radial-bar-danger" data-label="20%"></div>
                              <div class="media-body">
                                 <h5>Average Speed Of Ans.</h5>
                                 <p class="f-12"> Lorem Ipsum is simply dummy text of the Loren dummy printing......</p>
                                 <h4 class="mb-0">0m:65s<span class="f-14 light-font"> / Goal : 0m : 45s</span></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="card card-with-border overall-rating">
                        <div class="card-header resolve-complain">
                           <h5 class="d-inline-block">Over All Rating</h5>
                           <span class="setting-round pull-right d-inline-block mt-0"><i class="fa fa-spin fa-cog"></i></span>
                           <p class="f-12 mb-0">Lorem Ipsum is simply dummy text of the Loren dummy text of the Loren dummy printing......</p>
                        </div>
                        <div class="card-body rating-box p-0">
                           <div class="row m-0">
                              <div class="col-sm-6 p-0 main-rating">
                                 <div class="rating-box">
                                    <h3>4.6</h3>
                                    <div class="rating-container">
                                       <div class="star-ratings">
                                          <div class="stars stars-example-fontawesome-o">
                                             <select id="u-rating-fontawesome-o" name="rating" data-current-rating="4.6" autocomplete="off">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <p>Measures the quality or your support team’s efforts.</p>
                                 </div>
                              </div>
                              <div class="col-sm-6 p-0">
                                 <ul class="small-rating">
                                    <li>
                                       <h6>4.6<span class="stars-small pl-2"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></span><span class="f-12 pull-right">95%</span></h6>
                                    </li>
                                    <li>
                                       <h6>4.1<span class="stars-small pl-2"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></span><span class="f-12 pull-right">89%</span></h6>
                                    </li>
                                    <li>
                                       <h6>3.0<span class="stars-small pl-2"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span><span class="f-12 pull-right">64%</span></h6>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-6">
               <div class="card card-with-border overall-rating">
                  <div class="card-header resolve-complain card-no-border">
                     <h5 class="d-inline-block">Agent Performance Points</h5>
                     <span class="setting-round pull-right d-inline-block mt-0"><i class="fa fa-spin fa-cog"></i></span>
                     <p class="f-12 mb-0">Lorem Ipsum is simply dummy text of the Loren dummy text of the Loren dummy printing......</p>
                  </div>
                  <div class="card-body p-0">
                     <div class="table-responsive agent-performance-table">
                        <table class="table table-bordernone">
                           <tbody>
                              <tr>
                                 <td>
                                    <div class="d-inline-block align-middle">
                                       <img class="img-radius img-40 align-top m-r-15 rounded-circle" src="{{asset('assets/images/user/2.png')}}" alt="">
                                       <div class="d-inline-block"><span class="f-12 f-w-600">Nick Stone</span><span class="d-block">Technical Support</span></div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress-showcase">
                                       <div class="progress sm-progress-bar">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="f-w-600">Elite Level</p>
                                    </div>
                                 </td>
                                 <td>
                                    <p class="f-w-600">12,325 Point</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="d-inline-block align-middle">
                                       <img class="img-radius img-40 align-top m-r-15 rounded-circle" src="{{asset('assets/images/user/11.png')}}" alt="">
                                       <div class="d-inline-block"><span class="f-12 f-w-600">Milano esco</span><span class="d-block">Technical Support</span></div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress-showcase">
                                       <div class="progress sm-progress-bar">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="f-w-600">Exclusive Level</p>
                                    </div>
                                 </td>
                                 <td>
                                    <p class="f-w-600">18,485 Point</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="d-inline-block align-middle">
                                       <img class="img-radius img-40 align-top m-r-15 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="">
                                       <div class="d-inline-block"><span class="f-12 f-w-600">Wiltor Noice</span><span class="d-block">Technical Support</span></div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress-showcase">
                                       <div class="progress sm-progress-bar">
                                          <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="f-w-600">Exclusive Level</p>
                                    </div>
                                 </td>
                                 <td>
                                    <p class="f-w-600">26,125 Point</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="d-inline-block align-middle">
                                       <img class="img-radius img-40 align-top m-r-15 rounded-circle" src="{{asset('assets/images/user/4.jpg')}}" alt="">
                                       <div class="d-inline-block"><span class="f-12 f-w-600">Anna strong</span><span class="d-block">Technical Support</span></div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress-showcase">
                                       <div class="progress sm-progress-bar">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="f-w-600">Elite Level</p>
                                    </div>
                                 </td>
                                 <td>
                                    <p class="f-w-600">10,125 Point</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="d-inline-block align-middle">
                                       <img class="img-radius img-40 align-top m-r-15 rounded-circle" src="{{asset('assets/images/user/12.png')}}" alt="">
                                       <div class="d-inline-block"><span class="f-12 f-w-600">Anna strong</span><span class="d-block">Technical Support</span></div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="progress-showcase">
                                       <div class="progress sm-progress-bar">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="f-w-600">Exclusive Level</p>
                                    </div>
                                 </td>
                                 <td>
                                    <p class="f-w-600">22,114 Point</p>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12">
               <div class="card card-with-border current-tickets tickets">
                  <div class="card-header card-no-border">
                     <div class="d-flex">
                        <h5>Current Ticket Status</h5>
                        <button class="btn btn-outline-light" type="button">Last Week <i class="fa fa-caret-down"></i></button>
                     </div>
                     <p class="f-12 mb-0">Lorem Ipsum is simply dummy text of the Loren dummy text of......</p>
                     <div class="chart-value-box pull-right current-legend">
                        <div class="value-square-box-primary"></div>
                        <span>Open Tickets</span>
                        <div class="value-square-box-light ml-3"></div>
                        <span>Solved Ticket</span>
                     </div>
                  </div>
                  <div class="card-body pt-0">
                     <h4 class="mb-0">198</h4>
                     <small class="f-w-600"> This Week <span class="font-primary">3.56% <i class="fa fa-caret-up"></i></span></small>
                     <div class="tickets-bar">
                        <div class="ct-chartbar flot-chart-container"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> --}}

@endsection

@section('script')
<script src="{{asset('assets/js/chart/chartjs/chart.min.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script>

<script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/js/notify/index.js')}}"></script>
<script src="{{asset('assets/js/dashboard/dashboard_4.js')}}"></script>

<script>

// area spaline chart for user registration statistics
var options1 = {
    chart: {
      height: 350,
      type: 'area',
      toolbar:{
         show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    series: [{
      name: 'Users',
      data: <?php echo $count_array; ?>
    }],

    xaxis: {
      type: 'date',
      categories: <?php echo $date_array; ?>,
   // categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00"],
   },
   tooltip: {
   x: {
      format: 'dd/MM/y'
   },
   },
   colors:['#ec6400']
}

var chart1 = new ApexCharts(
   document.querySelector("#area-spaline-123"),
   options1
);

chart1.render();


// area spaline chart
var options1 = {
    chart: {
        height: 350,
        type: 'area',
        toolbar:{
          show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    series: [{
        name: 'Shipments',
        data: <?php echo $ships_array; ?>
    }],

    xaxis: {
        type: 'date',
        categories: <?php echo $ship_date_array; ?>,
      //   categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00"],
    },
    tooltip: {
        x: {
            format: 'dd/MM/y'
        },
    },
    colors:['#ec6400']
}

var chart2 = new ApexCharts(
    document.querySelector("#area-spaline-cust"),
    options1
);

chart2.render();

// Doughnot chart for shipments on customer dashboard
var doughnutData = [
    {
        value: {{$booked_shipments}},
        color: "#655af3",
        highlight: "#655af3",
        label: "Booked"
    },
    {
        value: {{$arrived_shipments}},
        color: "#148df6",
        highlight: "#148df6",
        label: "Arrived"
    },
    {
        value: {{$in_transit_shipments}},
        color: "#51bb25",
        highlight: "#51bb25",
        label: "In-Transit"
    },
    {
        value: {{$delivered_shipments}},
        color: "#7a15f7",
        highlight: "#7a15f7",
        label: "Delivered"
    },
    {
        value: {{$returned_shipments}},
        color: "#fd2e64",
        highlight: "#fd2e64",
        label: "Returned"
    },
    {
        value: {{$cancelled_shipments}},
        color: "#ff5f24",
        highlight: "#ff5f24",
        label: "Cancelled"
    }
];
var doughnutOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    maintainAspectRatio : false,
    legend: {
      display: true,
      labels: {
         fontColor: 'rgb(255, 99, 132)'
         }
      },
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
};
var doughnutCtx = document.getElementById("myDoughnutGraph").getContext("2d");
var myDoughnutChart = new Chart(doughnutCtx).Doughnut(doughnutData, doughnutOptions);

// monthly revenue chart
// sparkline
window.Apex = {
      stroke: {
        width: 2
      },
      markers: {
        size: 0
      },
      tooltip: {
        fixed: {
          enabled: true,
        }
      }
    };
    
   //  var randomizeArray = function (arg) {
   //    var array = arg.slice();
   //    var currentIndex = array.length,
   //      temporaryValue, randomIndex;

   //    while (0 !== currentIndex) {

   //      randomIndex = Math.floor(Math.random() * currentIndex);
   //      currentIndex -= 1;

   //      temporaryValue = array[currentIndex];
   //      array[currentIndex] = array[randomIndex];
   //      array[randomIndex] = temporaryValue;
   //    }

   //    return array;
   //  }

var sparklineData = <?php echo $monthly_revenue_array; ?>;

var spark = {
      chart: {
        type: 'area',
        height: 80,
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'straight'
      },
      colors: ['#ec6400'],
      fill: {
        opacity: 0.3
      },
      series: [{
        data: sparklineData
      }],
      xaxis: {
        crosshairs: {
          width: 1
        },
      },
      yaxis: {
        min: 0
      }
    }

    var spark = new ApexCharts(document.querySelector("#spark33"), spark);
    spark.render();

</script>
@endsection