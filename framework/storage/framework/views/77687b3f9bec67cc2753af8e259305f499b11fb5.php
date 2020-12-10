
  <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="mainContents">
        <?php echo $__env->make('frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="sidebarAndContents container mt-3">
            <div class="row">
               
                <div class="col-md-12">
                   
                    <div class="contactInfo">
                        <h3>CONTACT US</h3>
                        <hr>


                        <div class="logo">
                            <h4>RioLeaf IT</h4>
                            <span><i class="fab fa-facebook"></i></span>
                            <span><i class="fab fa-twitter"></i></span>
                            <span><i class="fab fa-linkedin"></i></span>
                        </div>
                        <div class="contactInner">
                            <div class="location">
                                <i class="fas fa-location-arrow"></i>
                                <span>7/35B,70 Bir Uttam C.R Dutta Road</span>
                                <span>Estern Plaza, HatirPool, Dhaka-1205, Bangladesh</span>
                            </div>

                            <div class="email">
                                
                                <i class="fas fa-envelope"></i>
                                <span>info@rioleafit.com</span>
                            </div>
                            <div class="phone">
                                <i class="fas fa-phone"></i>
                                <span>+880-9678467317</span>
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