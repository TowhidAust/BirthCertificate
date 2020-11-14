<?php $__env->startSection('extra_css'); ?>
<style type="text/css">

/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("package.index")); ?>"> <?php echo app('translator')->getFromJson('fleet.users'); ?> </a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.addUser'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('Update Package'); ?></h3>
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


        <form class="" action="<?php echo e(route('package.update')); ?>" method="post" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('first_name', __('Package Name'), ['class' => 'form-label']); ?>

                <input type="text" class="form-control" name="package_name" value="<?php echo e($data->package_name); ?>" required>
                <input type="hidden" class="form-control" name="id" value="<?php echo e($data->id); ?>" required>
            </div>

            <div class="form-group">
              <?php echo Form::label('profile_image', __('Package Image'), ['class' => 'form-label']); ?>


              <input type="file" name="profile_image" value="<?php echo e($data->image); ?>">
              <img src="<?php echo e(asset('uploads/'.$data->image)); ?>" height="100px" width="100px">
            </div>

            <div class="form-group">
              <?php echo Form::label('last_name', __(' Real Price'), ['class' => 'form-label']); ?>

              <input type="number" class="form-control" name="price" value="<?php echo e($data->price); ?>" required>
            </div>
            <div class="form-group">
              <?php echo Form::label('last_name', __(' Artificial Price'), ['class' => 'form-label']); ?>

              <input type="number" class="form-control" name="ar_price" value="<?php echo e($data->ar_price); ?>">
            </div>
            <div class="form-group">
              <?php echo Form::label('group_id',__('fleet.selectGroup'), ['class' => 'form-label']); ?>

                <select id="group_id" name="type" class="form-control">
                <option value="<?php echo e($data->type); ?>">

                  <?php if($data->type==0): ?>
                  Wedding Package
                  <?php else: ?>
                  General Package
                  <?php endif; ?><option>
                <option value="0">Wedding Package</option>
                <option value="1" >Ganeral Package</option>

              </select>
            </div>
            <div class="form-group">
              <?php echo Form::label('profile_image', __('Description'), ['class' => 'form-label']); ?>


              <textarea class="form-control" rows="8" cols="80" name="description">
              <?php echo e($data->description); ?></textarea>
            </div>
          </div>
          <div class="col-md-6">

          </div>
        </div>

        <div class="col-md-12">
          <?php echo Form::submit(__('Update Package'), ['class' => 'btn btn-success']); ?>

        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/package/edit.blade.php ENDPATH**/ ?>