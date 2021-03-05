<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/prism.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Home</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>

<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12 xl-100 box-col-12">
         <div class="row total-sale-col">
            <div class="col-xl-5 box-col-12 xl-100">
               
               <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
               <div class="">
                  <div class="project-overview" style="margin-top: 8%;">
                     <div class="row">
                        <div class="col-xl-3 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-info"><?php echo e($total_customers); ?></h2>
                           <p class="mb-0">Total customers</p>
                        </div>
                        <div class="col-xl-3 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-danger"><?php echo e($total_riders); ?></h2>
                           <p class="mb-0">Total Riders</p>
                        </div>
                        <div class="col-xl-3 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-secondary"><?php echo e($total_admins); ?></h2>
                           <p class="mb-0">Total Admins</p>
                        </div>
                        <div class="col-xl-3 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-success"><?php echo e($total_operations); ?></h2>
                           <p class="mb-0">Total Operations</p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endif; ?>

               <div class="">
                  <div class="project-overview">
                     <div class="row">
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-primary"><?php echo e($total_booked_shipments); ?></h2>
                           <p class="mb-0">Booked Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-secondary"><?php echo e($total_arrived_shipments); ?></h2>
                           <p class="mb-0">Arrived Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-success"><?php echo e($total_in_transit_shipments); ?></h2>
                           <p class="mb-0">In-Transit Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-info"><?php echo e($total_delivered_shipments); ?></h2>
                           <p class="mb-0">Delivered Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-danger"><?php echo e($total_returned_shipments); ?></h2>
                           <p class="mb-0">Returned Shipments</p>
                        </div>
                        <div class="col-xl-2 col-sm-4 col-6">
                           <h2 class="f-w-600 counter font-warning"><?php echo e($total_cancelled_shipments); ?></h2>
                           <p class="mb-0">Cancelled Shipments</p>
                        </div>
                     </div>
                  </div>
               </div>

               <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
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
                  
               </div>
               <?php endif; ?>
            </div>
            
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
                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td>
                                 <div class="d-inline-block align-middle">
                                    <div class="d-inline-block"><span><?php echo e($vendor->name); ?></span></div>
                                 </div>
                              </td>
                              <td><span><?php echo e($vendor->company->company_name); ?></span></td>
                              <td><span><?php echo e($vendor->company->phone); ?></span></td>
                              <td><span class="f-12"><?php echo e($vendor->created_at->format('d M Y')); ?></span></td>
                           </tr> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
               <div class="code-box-copy">
                  <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
               </div>
            </div>
         </div>
      </div>
      
   </div>
</div>
<?php endif; ?>
<?php
   $notifications = App\Notification::all();
?>

<?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
<div class="container-fluid">
   <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="alert <?php echo e($notification->color); ?> dark alert-dismissible fade show" role="alert"><?php echo e($notification->text); ?>

      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <div class="row">
      <div class="col-xl-9 xl-100 box-col-12">
         <div class="row">
            <div class="col-12">
               <div class="project-overview">
                  <div class="row">
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-primary"><?php echo e($booked_shipments); ?></h2>
                        <p class="mb-0">Booked Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-secondary"><?php echo e($arrived_shipments); ?></h2>
                        <p class="mb-0">Arrived Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-success"><?php echo e($in_transit_shipments); ?></h2>
                        <p class="mb-0">In-Transit Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-info"><?php echo e($delivered_shipments); ?></h2>
                        <p class="mb-0">Delivered Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-danger"><?php echo e($returned_shipments); ?></h2>
                        <p class="mb-0">Returned Shipments</p>
                     </div>
                     <div class="col-xl-2 col-sm-4 col-6">
                        <h2 class="f-w-600 counter font-warning"><?php echo e($cancelled_shipments); ?></h2>
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
                  
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-3 xl-100 box-col-6">
         <div class="card card-with-border connection firm-activity">
            <div class="card-header">
               <h5 class="d-inline-block">Today's Activity</h5>
               <span class="pull-right mt-0"><?php echo e(count($activities)); ?></span>
            </div>
            <div class="card-body p-0">
               <ul>
                  <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li>
                        <div class="media">
                           <span style="background-color: #ec6400; font-weight: 800; color: white; padding: 4px 5px; border-radius: 3px;"><?php echo e($activity->shipment->consignment_no); ?></span>
                           <div class="media-body ml-3">
                              <span class="f-w-600"><?php echo e($activity->description); ?></span>
                              <p><?php echo e($activity->created_at->diffForHumans()); ?></p>
                           </div>
                        </div>
                     </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                           <h4>Rs. <span class="counter"><?php echo e($total_monthly_revenue); ?></span></h4>
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
            
         </div>
      </div>
   </div>
</div>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/chart/chartjs/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/tooltip-init.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/prism/prism.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dashboard/dashboard_4.js')); ?>"></script>

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
        value: <?php echo e($booked_shipments); ?>,
        color: "#655af3",
        highlight: "#655af3",
        label: "Booked"
    },
    {
        value: <?php echo e($arrived_shipments); ?>,
        color: "#148df6",
        highlight: "#148df6",
        label: "Arrived"
    },
    {
        value: <?php echo e($in_transit_shipments); ?>,
        color: "#51bb25",
        highlight: "#51bb25",
        label: "In-Transit"
    },
    {
        value: <?php echo e($delivered_shipments); ?>,
        color: "#7a15f7",
        highlight: "#7a15f7",
        label: "Delivered"
    },
    {
        value: <?php echo e($returned_shipments); ?>,
        color: "#fd2e64",
        highlight: "#fd2e64",
        label: "Returned"
    },
    {
        value: <?php echo e($cancelled_shipments); ?>,
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Zippy\resources\views/dashboard/index.blade.php ENDPATH**/ ?>