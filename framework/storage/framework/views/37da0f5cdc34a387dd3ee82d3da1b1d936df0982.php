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
<li class="breadcrumb-item"><?php echo e(link_to_route('vehicle-types.index', __('fleet.vehicle_types'))); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.add_vehicle_type'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('Add time slot rent'); ?></h3>
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
        <!-- Booking form-->
        <form class="card-section form-primary flex-container flex-dir-column align-justify" action="<?php echo e(route('search_car')); ?>">
          <fieldset>

                <div class="block-header border" style="margin: 5px 0px 5px 0px;">
                  <h5 class="h5 headline" style="font-size:12px;">Pick Up</h5>
                  <hr style="border-bottom-color: #7b666699;" class="dotted">
              </div>
            <div class="row small-up-2 js-datepicker-group">
              <div class="column">
                <div class="input-group">
                  <span class="input-group">
                    <span class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                    <select class="input-group-field placeholder" id="js-form-select-1" name="pickup-loc" required>
                      <option disabled selected hidden value="">District </option>
                      <option value="1">Location #1</option>
                      <option value="2">Location #2</option>
                      <option value="3">Location #3</option>
                    </select>
                  </span>
                </div>
              </div>
              <div class="column">
                <div class="input-group">
                  <span class="input-group">
                    <span class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                    <select class="input-group-field placeholder" id="js-form-select-1" name="pickup-loc" required style="padding-left: 2.0rem;">
                      <option disabled selected hidden value="">Choose Upozila</option>
                      <option value="1">Location #1</option>
                      <option value="2">Location #2</option>
                      <option value="3">Location #3</option>
                    </select>
                  </span>
                </div>
              </div>
            </div>

            <div class="row small-up-2 js-datepicker-group">
              <div class="column">
                <div class="input-group">
                  <span class="input-group-label zmdi zmdi-calendar-check"></span>
                  <input class="input-group-field js-datepicker-date" type="text" placeholder="Pick up date">
                </div>
              </div>
              <div class="column">
                <div class="input-group">
                  <span class="input-group-label zmdi zmdi-alarm-check"></span>
                  <input class="input-group-field js-datepicker-time" type="text" placeholder="Pick up time">
                </div>
              </div>
            </div>
          </fieldset>
          <fieldset class="pt0">
            <label>
              <span class="input-group">
                <span class="input-group-label zmdi zmdi-pin-off fa fa-map-marker"></span>
                <select class="input-group-field placeholder" id="js-form-select-2" name="pickup-loc" required>
                  <option disabled selected hidden value="">Choose pickup point</option>
                  <option value="1">Location #1</option>
                  <option value="2">Location #2</option>
                  <option value="3">Location #3</option>
                </select>
              </span>
            </label>
            <div class="block-header border" style="margin: 0px 0px 14px 0px;">
                <h5 class="h5 headline" style="font-size:12px;">Drop</h5>
                <hr style="border-bottom-color: #7b666699;" class="dotted">
            </div>
            <div class="row small-up-2 js-datepicker-group">
              <div class="column">
                <div class="input-group">
                  <span class="input-group">
                    <span class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                    <select class="input-group-field placeholder" id="js-form-select-1" name="pickup-loc" required>
                      <option disabled selected hidden value="">District </option>
                      <option value="1">Location #1</option>
                      <option value="2">Location #2</option>
                      <option value="3">Location #3</option>
                    </select>
                  </span>
                </div>
              </div>
              <div class="column">
                <div class="input-group">
                  <span class="input-group">
                    <span class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                    <select class="input-group-field placeholder" id="js-form-select-1" name="pickup-loc" required style="padding-left: 2.0rem;">
                      <option disabled selected hidden value="">Choose Upozila</option>
                      <option value="1">Location #1</option>
                      <option value="2">Location #2</option>
                      <option value="3">Location #3</option>
                    </select>
                  </span>
                </div>
              </div>
            </div>
          </fieldset>
          <fieldset class="pt0" style="margin-bottom: -10px;">
            <div class="checkbox inline">
              <label>
                <input type="checkbox">
                <span class="custom-checkbox secondary"><i class="icon-check"></i>
                </span>I have a promo code
              </label>
            </div>
          </fieldset>
          <a class="button rh-button flip-y right-vb small mb0" href="<?php echo e(route('search_car')); ?>">
            <i class="zmdi zmdi-link fa fa-link"></i>
            <span>Book Now</span>
          </a>
        <button class="button rh-button secondary flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
            <span>Book Now</span>
          </button>
        </form><!-- /end booking form-->
      <?php echo Form::open(['route' => 'guest.fare.update','method'=>'post','files'=>true]); ?>

      <div class="row">
        <div class="form-group col-md-4">
          <?php echo Form::label('', __('Vehicale Type'), ['class' => 'col-xs-12 control-label']); ?>

            <select id="vtype" name="v_type_id" class="form-control vehicles" required style="width: 100%">
              <option value="<?php echo e($edit_data->type_id); ?>"><?php echo e($edit_data->displayname); ?><option>
              <?php $__currentLoopData = $vehicle_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($vah->id); ?>"><?php echo e($vah->displayname); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group col-md-4">
          <?php echo Form::label('', __('Time Slot'), ['class' => 'col-xs-12 control-label']); ?>

            <select id="vtype" name="t_slot_id" class="form-control vehicles" required style="width: 100%">
              <option value="<?php echo e($edit_data->slot_id); ?>"><?php echo e($edit_data->time); ?></option>
              <?php $__currentLoopData = $slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($slot->id); ?>"><?php echo e($slot->time); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-md-4">
          <?php echo Form::label('seats', __('Rent'), ['class' => 'form-label']); ?>

          <input type="number" value="<?php echo e($edit_data->rent); ?>" name="rent" class="form-control">
          <input type="hidden" value="<?php echo e($edit_data->main_id); ?>" name="id" class="form-control">
        </div>

      </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="form-group col-md-4">
            <?php echo Form::submit(__('Update'), ['class' => 'btn btn-success']); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\car\framework\resources\views/guest_fare/edit.blade.php ENDPATH**/ ?>