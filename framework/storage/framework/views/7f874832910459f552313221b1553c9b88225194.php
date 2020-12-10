<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mainContents">

      <?php echo $__env->make('frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="sidebarAndContents container mt-3">

            <form action="POST">
                <div class="mt-3 birthInfoCheck">
                  <h3>জন্ম তথ্য যাচাই</h3>
                   <p>Enter the birth registration number and the date of birth of the person.</p>

                   <div class="row">
                   <div class="col-md-6">
                   <label for=""> Birth Registration Number </label>
                    <input class="form-control" type="text">

                    <label class="mt-3" for=""> Date of Birth </label>
                    <input class="form-control" type="date">
                   </div>
                   <div class="col-md-6">
                      <h3>Output</h3>
                   </div>
                   </div>
                    
                </div>
            </form>
        </div>
    </section>

    <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/correction.blade.php ENDPATH**/ ?>