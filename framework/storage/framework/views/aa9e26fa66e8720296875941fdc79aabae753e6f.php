<?php $__env->startSection('extra_css'); ?>
  <!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">

<style type="text/css">
  .select2-selection{
    height: 38px !important;
  }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("drivers.index")); ?>">Councillor Edit</a></li>
<li class="breadcrumb-item active">Councillor Edit</li>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Councillor Edit</h3>
      </div>

      <div class="card-body">
        <?php if(count($errors) > 0): ?>
          <div class="alert alert-danger">
            <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php echo Form::open(['route' => ['drivers.update',$driver->id],'files'=>true,'method'=>'PATCH']); ?>

        <?php echo Form::hidden('id',$driver->id); ?>

        <?php echo Form::hidden('edit',"1"); ?>

        <?php echo Form::hidden('detail_id',$driver->getMeta('id')); ?>

        <?php echo Form::hidden('user_id',Auth::user()->id); ?>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('first_name', __('fleet.firstname'), ['class' => 'form-label required']); ?>

              <?php echo Form::text('first_name', $driver->getMeta('first_name'),['class' => 'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('last_name', __('fleet.lastname'), ['class' => 'form-label required']); ?>

              <?php echo Form::text('last_name', $driver->getMeta('last_name'),['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('address', __('fleet.address'), ['class' => 'form-label required']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book-o"></i></span>
                </div>
                <?php echo Form::text('address', $driver->getMeta('address'),['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('email', __('fleet.email'), ['class' => 'form-label required']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                <?php echo Form::email('email', $driver->email,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('contract_number', __('fleet.contract'), ['class' => 'form-label']); ?>

              <?php echo Form::text('contract_number', $driver->getMeta('contract_number'),['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('gender', __('fleet.gender') , ['class' => 'form-label']); ?><br>
              <input type="radio" name="gender" class="flat-red gender" value="1" <?php if($driver->getMeta('gender')== 1): ?> checked <?php endif; ?>> <?php echo app('translator')->getFromJson('fleet.male'); ?><br>
              <input type="radio" name="gender" class="flat-red gender" value="0" <?php if($driver->getMeta('gender')== 0): ?> checked <?php endif; ?>> <?php echo app('translator')->getFromJson('fleet.female'); ?>
            </div>
            <div class="form-group">
              <?php echo Form::label('driver_image', __('Proofile Image'), ['class' => 'form-label']); ?>

              <?php if($driver->getMeta('driver_image') != null): ?>
              <a href="<?php echo e(asset('uploads/'.$driver->getMeta('driver_image'))); ?>" target="_blank">View</a>
              <?php endif; ?>
              <?php echo Form::file('driver_image',null,['class' => 'form-control','required']); ?>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('econtact', __('fleet.emergency_details'), ['class' => 'form-label']); ?>

              <?php echo Form::textarea('econtact',$driver->getMeta('econtact'),['class' => 'form-control']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-12">
          <?php echo Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']); ?>

          <a href="<?php echo e(route("drivers.index")); ?>" class="btn btn-danger" ><?php echo app('translator')->getFromJson('fleet.back'); ?></a>
        </div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.code').select2();
  $('#vehicle_id').select2();
  $('#end_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#exp_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#issue_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#start_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

  //Flat green color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  });

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/councillors/edit.blade.php ENDPATH**/ ?>