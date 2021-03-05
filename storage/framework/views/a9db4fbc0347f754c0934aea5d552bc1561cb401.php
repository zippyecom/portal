<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
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
    <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($shipment->consignment_no); ?></td>
        <td><?php echo e($shipment->customer_name); ?></td>
        <td><?php echo e($shipment->customer_address); ?></td>
        <td><?php echo e($shipment->customer_email); ?></td>
        <td><?php echo e($shipment->customer_phone); ?></td>
        <td><?php echo e($shipment->destination_city); ?></td>
        <td><?php echo e($shipment->service_type); ?></td>
        <td><?php echo e($shipment->product_name); ?></td>
        <td><?php echo e($shipment->quantity); ?></td>
        <td><?php echo e($shipment->weights->weight); ?></td>
        <td><?php echo e($shipment->product_value); ?></td>
        <td><?php echo e($shipment->product_reference); ?></td>
        <td><?php echo e($shipment->remarks); ?></td>
        <td><?php echo e($shipment->status); ?></td>
        <td><?php echo e($shipment->comment); ?></td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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
      <?php $__currentLoopData = $weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $weight = App\Weights::find($key);
          $total_price = App\Shipment::where('weights_id', $key)->get();
          $total += $weight->price * $value;
        ?>

        <tr>
          <th style="text-align: left"><?php echo e($weight->weight); ?></th>
          <td><?php echo e($weight->price); ?></td>
          <td><?php echo e($value); ?></td>
          <td><?php echo e($weight->price * $value); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th colspan="3" style="text-align: left">Total</th>
        <th style="text-align: left"><?php echo e($total); ?></th>
      </tr>
    </tbody>
  </table>
</body>
</html><?php /**PATH D:\Zippy\resources\views/shipments/payment-report-page.blade.php ENDPATH**/ ?>