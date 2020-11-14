<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><?php echo e(link_to_route('team.index', __('fleet.team'))); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.editMember'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.editMember'); ?></h3>
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

        <?php echo Form::open(['route' => ['team.update',$data->id],'method'=>'PATCH','files'=>true]); ?>

        <?php echo Form::hidden('id',$data->id); ?>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('name', __('fleet.name'), ['class' => 'form-label']); ?>

              <?php echo Form::text('name', $data->name,['class' => 'form-control','required']); ?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('designation', __('fleet.designation'), ['class' => 'form-label']); ?>

              <?php echo Form::text('designation', $data->designation,['class' => 'form-control','required']); ?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('image', __('fleet.picture'), ['class' => 'form-label']); ?> <?php if($data->image != null): ?> (<a href="<?php echo e(asset('uploads/'.$data->image)); ?>" target="blank"><?php echo app('translator')->getFromJson('fleet.view'); ?></a>) <?php endif; ?>
              <br>
              <?php echo Form::file('image',null,['class' => 'form-control']); ?>

            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <?php echo Form::label('details', __('fleet.description'), ['class' => 'form-label']); ?>

              <?php echo Form::textarea('details', $data->details,['class' => 'form-control','required','size'=>'30x3']); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="form-group col-md-4">
            <?php echo Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']); ?>

          </div>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $(document).ready(function() {
  //Flat green color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\car\framework\resources\views/team/edit.blade.php ENDPATH**/ ?>