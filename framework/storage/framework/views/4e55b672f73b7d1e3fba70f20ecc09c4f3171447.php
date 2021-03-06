<div class="navBar sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark position-sticky">
    <a class="navbar-brand" href="../index.html">জন্ম ও মৃত্যু নিবন্ধন</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navLinksDiv" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto">
        <a class="nav-item nav-link" id="home" href="<?php echo e(url('/')); ?>">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link correction" id="correction" href="<?php echo e(route('correction_form')); ?>">Correction</a>
        <a class="nav-item nav-link checkStatus" id="checkStatus" href="<?php echo e(route('check_status')); ?>">Check Status</a>
        <a class="nav-item nav-link contact" id="contact" href="<?php echo e(route('contact')); ?>">Contact US</a>
        <a class="nav-item nav-link" href="<?php echo e(route('check_status')); ?>">FAQ</a>
      </div>
    </div>
  </nav>
</div>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/navbar.blade.php ENDPATH**/ ?>