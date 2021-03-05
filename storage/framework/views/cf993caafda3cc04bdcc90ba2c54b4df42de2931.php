
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delivery Sheet</title>
  <?php echo $__env->make('layouts.simple.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    <img src="<?php echo e(asset('assets/images/zippy/kcs.png')); ?>" alt="" width="270" style="display: block; margin: 0 auto;">
    
    <table class="mt-3">
      <tr>
        <td class="w-25 align-right">SHEET #</td>
        <td class="details"><?php echo e($sheet->id); ?></td>
        <td class="align-right">ROUTE</td>
        <td><?php echo e($sheet->route); ?></td>
      </tr>
      <tr>
        <td class="w-25 align-right">DELIVERY DATE</td>
        <td><?php echo e($sheet->date); ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="w-25 align-right">STATION</td>
        <td><?php echo e($sheet->station); ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="w-25 align-right">COURIER OFFICER</td>
        <td><?php echo e(ucfirst(Auth::user()->name)); ?></td>
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

      <?php $__currentLoopData = $shipmentSheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr style="border-bottom: 1px solid rgb(189, 189, 189);">
        <td><?php echo e($key+1); ?></td>
        <td><?php echo e($ss->shipment->consignment_no); ?></td>
        <td><?php echo e($ss->shipment->customer_name); ?></td>
        <td><?php echo e($ss->shipment->customer_phone); ?></td>
        <td><?php echo e($ss->shipment->customer_address); ?></td>
        <td><?php echo e($ss->shipment->product_value); ?></td>
        <td><?php echo e($ss->shipment->weights->weight); ?></td>
        <td></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>
</body>
</html><?php /**PATH D:\Zippy\resources\views/admin/delivery-sheets/print-sheet.blade.php ENDPATH**/ ?>