
  <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="mainContents">
        <?php echo $__env->make('frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="sidebarAndContents container mt-3">
            <div class="row">

                <div class="col-md-12">

                    <div class="contactInfo">
                        <h3>যোগাযোগ</</h3>
                        <hr>
<h4>বরিশাল সিটি কর্পোরেশন </h4>
<p>নগর ভবন</p>

                        <div class="contactInner">

                            <div class="email">

                                <i class="fas fa-envelope"></i>
                                <span>contact@barisalcity.gov.bd</span>
                            </div>
                            <div class="phone">
                                <i class="fas fa-phone"></i>
                                <span>+৮৮-০৪৩১-৬৩০৪১</span>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
    <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
    <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/contact.blade.php ENDPATH**/ ?>