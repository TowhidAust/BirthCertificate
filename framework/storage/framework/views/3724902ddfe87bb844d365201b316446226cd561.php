
  <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="mainContents">
        <?php echo $__env->make('frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="sidebarAndContents container mt-3">
            <div class="row">
                <div class="col-md-4">
                    <?php echo $__env->make('frontend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-8">
                  <div class="header">
                      <h3>বরিশাল সিটি কর্পোরেশন এর জন্ম ও মৃত্যু নিবন্ধন কার্যালয়ের তালিকা</h3>
                      <p>বরিশাল সিটি কর্পোরেশন এর প্রধান কার্যালয় অথবা যেকোন স্থান থেকে ফরম সংগ্রহ করে প্রধান অফিসে জমা দিন।</p>
                  </div>
               </div>
        </div>
      </div>
    </section>

    <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
    <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/list_of_center.blade.php ENDPATH**/ ?>