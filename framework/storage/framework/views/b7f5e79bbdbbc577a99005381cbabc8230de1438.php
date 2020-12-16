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
<li class="breadcrumb-item"><a href="<?php echo e(route("councillor")); ?>"><?php echo app('translator')->getFromJson('Councillor'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('Add Councillor'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header with-border">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('Add Councillor'); ?></h3>
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

        <?php echo Form::open(['route' => 'councillor.store','files'=>true,'method'=>'post']); ?>

        <?php echo Form::hidden('is_active',0); ?>

        <?php echo Form::hidden('is_available',0); ?>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('first_name', __('fleet.firstname'), ['class' => 'form-label required','autofocus']); ?>

              <?php echo Form::text('first_name', null,['class' => 'form-control','required','autofocus']); ?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('last_name', __('fleet.lastname'), ['class' => 'form-label required']); ?>

              <?php echo Form::text('last_name', null,['class' => 'form-control','required']); ?>

            </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('address', __('fleet.address'), ['class' => 'form-label required']); ?>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-address-book-o"></i></span>
                  </div>
                  <?php echo Form::text('address', null,['class' => 'form-control','required']); ?>

                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('email', __('fleet.email'), ['class' => 'form-label required']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <?php echo Form::email('email', null,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('contract_number', __('fleet.contract'), ['class' => 'form-label']); ?>

              <?php echo Form::text('contract_number', null,['class' => 'form-control','required']); ?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('password', __('fleet.password'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                <?php echo Form::password('password', ['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">


            <div class="form-group">
            <?php echo Form::label('Ward Number', __('Ward Number') , ['class' => 'form-label']); ?><br>

              <select class="form-control" name="ward" required>
                <option value="">Select Ward</option>
                <?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <?php echo Form::label('gender', __('fleet.gender') , ['class' => 'form-label']); ?><br>
              <input type="radio" name="gender" class="flat-red gender" value="1" checked> <?php echo app('translator')->getFromJson('fleet.male'); ?><br>

              <input type="radio" name="gender" class="flat-red gender" value="0"> <?php echo app('translator')->getFromJson('fleet.female'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('econtact', __('fleet.emergency_details'), ['class' => 'form-label']); ?>

              <?php echo Form::textarea('econtact',null,['class' => 'form-control']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-12">
          <?php echo Form::submit(__('Save'), ['class' => 'btn btn-success']); ?>

        </div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.code').select2();
  $('#vehicle_id').select2();
  $("#first_name").focus();
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

});

  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/councillors/create.blade.php ENDPATH**/ ?>