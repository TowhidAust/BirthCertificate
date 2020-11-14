<?php $__env->startSection('extra_css'); ?>
<style type="text/css">
.height{
  height: 200px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('heading'); ?>
<h1> <?php echo app('translator')->getFromJson('fleet.yourAddress'); ?>
  <small class="text-muted"><?php echo e(Auth::user()->name); ?></small>
</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>

<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.addresses'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
      <div class="card card-info card-outline">
        <div class="card-body height">
          <?php echo nl2br(e($booking->address)); ?>

        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/customers/address.blade.php ENDPATH**/ ?>