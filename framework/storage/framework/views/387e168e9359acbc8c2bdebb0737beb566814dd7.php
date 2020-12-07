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

        </span>
      </h4>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 invoice-col">
      <h6><?php    echo '<pre>';
         print_r($data);
         exit; ?></h6>
    </div>
    <div class="col-sm-6 invoice-col">
      <strong><?php echo app('translator')->getFromJson('fleet.dropoff_addr'); ?>:</strong>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        <?php echo e(Hyvikk::get('invoice_text')); ?>

      </p>
    </div>
  </div>
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="<?php echo e(url('admin/print/'.$id)); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson('fleet.print'); ?></a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/application/view.blade.php ENDPATH**/ ?>