<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- <?php echo $__env->make('frontend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
<section class="mainContents">
    <?php echo $__env->make('frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
    	<div class="col-md-4">
    		<?php echo $__env->make('frontend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	</div>
    	<div class="col-md-8">
    		 <div class="sidebarAndContents container mt-3">
    <div class="header">
        <div class="birth_cert_fess_table">
            <h4>জন্ম ও মৃত্যু নিবন্ধন সম্পর্কিত বিভিন্ন সরকারী গেজেট/প্রজ্ঞাপন</h4>
        <table class="table table-bordered" style="width:100%">

  <tr>
    <td>জন্ম ও মৃত্যু নিবন্ধন বিধিমালা, ২০১৭</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Law-2017.pdf')); ?>" target="_blank"><span style="color:#ff0000;"> <button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>জন্ম ও মৃত্যু নিবন্ধন আইন, ২০০৪ (২০০৪ সনের ২৯ নং আইন)</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Law-2004.pdf')); ?>" target="_blank"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>ফিস সম্পর্কিত প্রজ্ঞাপন, ২০০৮</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Fee-2008.pdf')); ?>" target="_blank"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>ফিস সম্পর্কিত প্রজ্ঞাপন, ২০০৯</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Fee-2009.pdf')); ?>" target="_blank"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>ফিস সম্পর্কিত প্রজ্ঞাপন, ২০১০</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Fee-2010.pdf')); ?>" target="_blank"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>ফিস সম্পর্কিত প্রজ্ঞাপন, ২০১১</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Fee-2011.pdf')); ?>" target="_blank"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>ফিস সম্পর্কিত প্রজ্ঞাপন, ২০১২</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Fee-2012.pdf')); ?>"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>জন্ম ও মৃত্যু নিবন্ধন আইন, ২০০৪ এর সংশোধিত আইন (২০১৩ সনের ৩৪ নং আইন)</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/BRACT2013.pdf')); ?>"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>জন্ম ও মৃত্যু নিবন্ধন আইন, ২০০৪ কার্যকর সম্পর্কিত প্রজ্ঞাপন</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Gagate-2006.pdf')); ?>"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>
  <tr>
    <td>জন্ম ও মৃত্যু নিবন্ধন দিবস পালন সম্পর্কিত প্রজ্ঞাপন</td>
    <td><a download href="<?php echo e(asset('pdf/GAGET/Dibaspalaon.pdf')); ?>"><span style="color:#ff0000;"><button type="button" class="btn btn-primary" name="button">ডাউনলোড </button></a></td>
  </tr>

</table>
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
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/gaget.blade.php ENDPATH**/ ?>