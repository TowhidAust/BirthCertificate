<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><?php echo app('translator')->getFromJson('menu.settings'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.frontend_settings'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_css'); ?>
<style type="text/css">
  .nav-link {
    padding: .5rem !important;
  }

  .custom .nav-link.active {

      background-color: #21bc6c !important;
  }

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
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.frontend_settings'); ?>
        </h3>
      </div>
      <?php echo Form::open(['url' => 'admin/frontend-settings','method'=>'post']); ?>

      <div class="card-body">
        <div class="row">
          <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
              <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <h4>  <?php echo app('translator')->getFromJson('fleet.frontend_settings'); ?><span id="change" class="text-muted">
              <?php if(Hyvikk::frontend('enable')==1): ?>
                (<?php echo app('translator')->getFromJson('fleet.enable'); ?>)
              <?php else: ?>
                (<?php echo app('translator')->getFromJson('fleet.disable'); ?>)
              <?php endif; ?>
            </span></h4>
          </div>
          <div class="col-md-3 col-sm-12">
            <label class="switch">
              <input type="checkbox" name="enable" value="1" id="enable" <?php if(Hyvikk::frontend('enable')==1): ?> checked <?php endif; ?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <?php echo Form::label('about', __('fleet.about_us'), ['class' => 'form-label']); ?>

              <textarea name="about" class="form-control" rows="3" required><?php echo e(Hyvikk::frontend('about_us')); ?></textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('customer_support',__('fleet.customer_support'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <?php echo Form::number('customer_support', Hyvikk::frontend('customer_support') ,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('phone',__('fleet.contact_number'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <?php echo Form::number('phone', Hyvikk::frontend('contact_phone') ,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('email', __('fleet.contact_email'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <?php echo Form::email('email',  Hyvikk::frontend('contact_email') ,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <?php echo Form::label('about_description', __('Description'), ['class' => 'form-label']); ?>

              <textarea name="about_description" class="form-control" rows="3" required><?php echo e(Hyvikk::frontend('about_description')); ?></textarea>
            </div>
          </div>
            <div class="col-md-6">
              <div class="form-group">
              <?php echo Form::label('about_title',__('Title'), ['class' => 'form-label']); ?>

              <?php echo Form::text('about_title', Hyvikk::frontend('about_title') ,['class' => 'form-control','required']); ?>

            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
            <?php echo Form::label('language',__('fleet.language'),['class'=>"form-label"]); ?>

            <select id='language' name='language' class="form-control" required>
              <option value="en" <?php if(Hyvikk::frontend('language')=="en"): ?> selected <?php endif; ?>> English</option>
              <option value="es" <?php if(Hyvikk::frontend('language')=="es"): ?> selected <?php endif; ?>> Spanish </option>
              <option value="ar" <?php if(Hyvikk::frontend('language')=="ar"): ?> selected <?php endif; ?>> Arabic </option>
            </select>
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('faq_link',__('fleet.faq_link'), ['class' => 'form-label']); ?>

              <?php echo Form::text('faq_link', Hyvikk::frontend('faq_link') ,['class' => 'form-control']); ?>

            </div>
          </div>

          <input type="hidden" name="vehicles" value="23">
          <input type="hidden" name="cities" value="23">
          <input type="hidden" name="cancellation" value="dasdsad">
          <input type="hidden" name="terms" value="dadsad">


          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('privacy_policy',__('fleet.privacy_policy'), ['class' => 'form-label']); ?>

              <?php echo Form::text('privacy_policy', Hyvikk::frontend('privacy_policy') ,['class' => 'form-control']); ?>

            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12 text-center"><h4><?php echo app('translator')->getFromJson('fleet.social_links'); ?></h4></div>
          <div class="col-md-3">
            <div class="form-group">
              <?php echo Form::label('facebook',__('fleet.facebook'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                </div>
                <?php echo Form::text('facebook', Hyvikk::frontend('facebook') ,['class' => 'form-control']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <?php echo Form::label('twitter',__('fleet.twitter'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                </div>
                <?php echo Form::text('twitter', Hyvikk::frontend('twitter') ,['class' => 'form-control']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <?php echo Form::label('instagram',__('fleet.instagram'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                </div>
                <?php echo Form::text('instagram', Hyvikk::frontend('instagram') ,['class' => 'form-control']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <?php echo Form::label('linkedin',__('fleet.linkedin'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-linkedin"></i></span>
                </div>
                <?php echo Form::text('linkedin', Hyvikk::frontend('linkedin') ,['class' => 'form-control']); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="<?php echo app('translator')->getFromJson('fleet.save'); ?>"/>
          </div>
        </div>
      </div>
      <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  //Flat green color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });

    $('#enable').change(function () {
      if($('#enable').is(":checked")){
        // alert("checked");
        $("#change").empty();
        $("#change").append(" (<?php echo app('translator')->getFromJson('fleet.enable'); ?>)");

      }
      else{
        // alert("unchecked");
        $("#change").empty();
        $("#change").append(" (<?php echo app('translator')->getFromJson('fleet.disable'); ?>)");
      }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/utilities/frontend.blade.php ENDPATH**/ ?>