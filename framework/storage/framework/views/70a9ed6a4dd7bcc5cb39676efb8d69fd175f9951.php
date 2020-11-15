<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("bookings.index")); ?>"><?php echo app('translator')->getFromJson('menu.bookings'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.booking_receipt'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
      <h4>
        <span class="logo-lg">
          <img src="<?php echo e(asset('assets/images/'. Hyvikk::get('icon_img') )); ?>" class="navbar-brand" style="height: 100px;margin-top: -15px">
          <?php echo e(Hyvikk::get('app_name')); ?>

          <small class="float-right"> <b><?php echo app('translator')->getFromJson('fleet.date'); ?> : </b><?php echo e(date('Y-m-d')); ?></small>
          <address style="font-size:16px;    margin-left: 9px;">
            <?php echo e(Hyvikk::get('badd1')); ?>

            <br>
            <?php echo e(Hyvikk::get('badd2')); ?>

            <br>
            <?php echo e(Hyvikk::get('city')); ?>,

            <?php echo e(Hyvikk::get('state')); ?>

            <br>
            <?php echo e(Hyvikk::get('country')); ?>

          </address>
        </span>
      </h4>
    </div>
  </div>
  <?php if($booking->type!='Wedding'): ?>
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <b>From</b>
      <address>
        <?php echo nl2br(e($booking->customer->getMeta('address'))); ?>

      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      <b><?php if($booking->customer->getMeta('address') != null): ?> To <?php endif; ?></b>
      <address>
        <?php echo nl2br(e($booking->customer->getMeta('address'))); ?>

      </address>
    </div>
    <div class="col-sm-4 invoice-col" style="float: right;text-align: right;padding-right: 11px;">
      <b>Invoice#</b>
      232323
      <br>
      <b><?php echo e($booking->customer->name); ?></b>
    </div>
  </div>
  <?php else: ?>
  <div class="row invoice-info">
    <div class="col-sm-6 invoice-col" >
      <strong> <?php echo app('translator')->getFromJson('fleet.pickup_addr'); ?>:</strong>
      <address>
        <?php echo e($booking->pickup_addr); ?>

        <br>
        <?php echo app('translator')->getFromJson('fleet.pickup'); ?>:
        <b> <?php echo e(date($date_format_setting.' g:i A',strtotime($booking->pickup))); ?></b>
      </address>
    </div>
    <div class="col-sm-6 invoice-col" style="float: right;text-align: right;padding-right: 11px;">
      <b>Invoice#</b>
        <?php echo e($booking->id); ?>

      <br>
      <b><?php echo e($booking->customer->name); ?></b>
    </div>
  </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 pull-right">
      <p class="lead"></p>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:16.66%"> Image</th>
            <th style="width:16.66%"> Car Name </th>
            <th style="width:16.66%"> Time Slot </th>
            <th style="width:16.66%"> Trip Fare</th>
            <th style="width:16.66%"> Quantity </th>
            <th style="width:16.66%"> Sub Total </th>
          </tr>

          <?php
          $package_info= DB::table('package')
                      ->where('id',$booking->wedding_package_id)
                      ->select('*',)
                      ->first();
          $total=0;
          ?>
          <?php if(!empty($package_info)): ?>
          <tr>
            <td> <img src="<?php echo e(asset('uploads/'.$package_info->image)); ?>" height="80px" width="80px"></td>
            <td><?php echo e($package_info->package_name); ?></td>
            <td></td>
            <?php if($package_info->type=='0'): ?>
              <?php if($booking->decu_type=='real'): ?>
              <td><?php echo e($package_info->price); ?></td>
              <?php else: ?>
              <td><?php echo e($package_info->ar_price); ?></td>
              <?php endif; ?>
            <?php else: ?>
              <td><?php echo e($package_info->price); ?></td>
            <?php endif; ?>

            <td>1</td>
            <td><?php echo e(Hyvikk::get('currency')); ?><?php echo e(number_format($package_info->price,2)); ?></td>
          </tr>
          <?php $total=$total+$package_info->price;?>
          <?php endif; ?>
        <?php $__currentLoopData = $guest_car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $total=$total+($car->rent*$car->number_of_car);?>
          <tr>
            <td> <img src="<?php echo e(asset('uploads/'.$car->image)); ?>" height="80px" width="80px"></td>
            <td><?php echo e($car->car_name); ?></td>
            <td><?php echo e($car->time); ?></td>
            <td><?php echo e($car->rent); ?></td>
            <td><?php echo e($car->number_of_car); ?></td>
            <td><?php echo e(Hyvikk::get('currency')); ?> <?php echo e(number_format($car->rent*$car->number_of_car,2)); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th colspan="5">Total Amount :</th>
            <td><?php echo e(Hyvikk::get('currency')); ?><?php echo e(number_format($total,2)); ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        <?php echo e(Hyvikk::get('invoice_text')); ?>

      </p>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/bookings/booking_info.blade.php ENDPATH**/ ?>