<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <section class="mainContents">

    <?php echo $__env->make('frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="sidebarAndContents container-custom mt-3">





        <div class="row">
          <!-- First col -->
          <div class="col-md-6">
            <form action="<?php echo e(route('verify')); ?>" method="post" enctype="multipart/form-data">
               <?php echo e(csrf_field()); ?>

            <div class="mt-3">
                <label class="text-black" for="">জন্ম রেকর্ডটি যাচাই করতে জন্ম নিবন্ধন নম্বর  এবং ব্যক্তির জন্মের তারিখ লিখুন</label>
            </div>
            <div class="mt-3">
              <label for="">জন্ম নিবন্ধন নম্বর</label>
              <input class="form-control"  name="application_id" type="text" required>
            </div>
            <div class="mt-3">
              <label for=""> জন্ম তারিখঃ খ্রিঃ </label>
              <input class="form-control" id="date" name="birth_date" type="date" required>
            </div>
            <div class="mt-3 verify">
             <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
               <button class="btn btn-success verify-botton">Verify</button>
            </div>
              </form>
          </div>


          <!-- 2nd col -->
          <div class="col-md-6">
            <div class="mt-3">
              <label for=""> <b>বিস্তারিত তথ্য </b> </label>
              <h5><?php if(Session::has('error')): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo session('error'); ?>

                </div>
                <?php endif; ?></h5>
              <h5><?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo session('message'); ?>

                </div>
                <?php endif; ?></h5>
            <?php if($data): ?>
            <?php if($data->status!="Completed"): ?>
            <div class="alert alert-info" role="alert">
            <?php echo e($data->application_status); ?>

            </div>
            <?php endif; ?>
            <p>Enrollment ID : <?php echo e($data->id); ?></p>
            <p>Birth Certificate ID : <?php echo e($data->birth_id); ?></p>
            <p>Bangla Name : <?php echo e($data->bangla_name); ?></p>
            <p>English Name : <?php echo e($data->english_name); ?></p>
            <p>Date of birth : <?php echo e($data->birth_date); ?></p>
            <p>Gender : <?php echo e($data->gender); ?></p>
            <?php endif; ?>
            </div>
          </div>
    </div>
  </section>
  <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/check_status.blade.php ENDPATH**/ ?>