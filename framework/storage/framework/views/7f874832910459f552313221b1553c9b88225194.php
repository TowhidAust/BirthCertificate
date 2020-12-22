<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="mainContents">

  <?php echo $__env->make('frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="sidebarAndContents container mt-3">
    <h5><?php if(Session::has('message')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo session('message'); ?>

      </div>
      <?php endif; ?></h5>


    <form action="<?php echo e(route('correction_submit')); ?>" method="post" enctype="multipart/form-data">
       <?php echo e(csrf_field()); ?>

      <div class="mt-3">
        <h3>জন্ম/মৃত্যু সনদ বাতিল/ সংশোধনের আবেদন</h3>
        <!-- <p>Enter the birth registration number and the date of birth of the person.</p> -->

        <div class="row">
          <div class="col-md-6 dashed">
            <label for=""> জন্ম/মৃত্যু নিবন্ধন নম্বরঃ </label><span class="red">*</span>
            <input class="form-control" name="birth_id" type="text" required>

            <label class="mt-3" for=""> নিবন্ধিত ব্যক্তির নামঃ </label><span class="red">*</span>

            <input class="form-control" type="text" name="name" required>

              <label class="mt-3">নিবন্ধন ওয়ার্ডের নামঃ </label><span class="red">*</span>
              <select class="form-control" name="ward_id" required>
                <option value="">ওয়ার্ড নির্বাচন করুন  </option>
                <?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>

          </div>
          <div class="col-md-6 dashed">
            <label for=""> জন্ম/মৃত্যু নিবন্ধনের তারিখঃ   </label><span class="red">*</span>
            <input class="form-control" type="date" name="birth_app_date" required>

            <label class="mt-3" for=""> জন্ম/মৃত্যু তারিখঃ  </label><span class="red">*</span>
            <input class="form-control" type="date" name="birth_date" required>
          </div>
          <!-- <div class="col-md-6 dashed">
              <label class="mt-3" for=""> জন্ম/মৃত্যু নিবন্ধনের তারিখঃ </label>
              <input class="form-control" type="date">

              <label class="mt-3" for=""> জন্ম/মৃত্যু তারিখঃ </label>
              <input class="form-control" type="date">
            </div> -->


          <div class="col-md-12 dashed">
            <h3>ভুল তথ্যের বিবরনীয়ঃ </h3>
            <div class="form-group float-lb">
                                       <div class="table-responsive">
                                            <table class="table table-bordered" id="dynamic_field">
                                               <tr>
                                                 <td>বিদ্যমান তথ্য<span class="red">*</span></td>
                                                 <td>সংশোধনীয় তথ্য<span class="red">*</span></td>
                                                 <td>সংশোধনের কারন<span class="red">*</span></td>
                                                 <td>যুক্ত করুন</td>
                                               </tr>
                                                 <tr>
                                                      <td><input type="text" name="present[]"  class="form-control name_list" required/></td>
                                                      <td><input type="text" name="correction[]"  class="form-control name_list" required/></td>
                                                      <td><input type="text" name="reason[]"  class="form-control name_list" required/></td>

                                                      <td><button type="button" name="add" id="add" class="btn btn-success">যুক্ত করুন</button></td>
                                                 </tr>
                                            </table>
                                       </div>
                                     </div>
          </div>
          <div class="col-md-6 dashed">

সংযুক্তি (প্রমাণিক কাগজপত্র)<span class="red">*</span>
          </div>
          <div class="col-md-6 dashed">
            <input type="file" name="file[]" placeholder="Enter New Tag" class="form-control name_list" required multiple />
          </div>
          <div class="col-md-6 dashed">
            <h3>ফি প্রদানের তথ্য </h3>
            <label class="mt-3" for=""> ব্যাংকের নাম </label>
            <input class="form-control" type="text" name="bank_name">

            <label class="mt-3" for="">শাখা </label>
            <input class="form-control" type="text" name="branch">

            <label class="mt-3" for=""> ক্রমিক সংখ্যা </label>
            <input class="form-control" type="text" name="transaction_id">

            <label class="mt-3" for=""> ফি প্রদানের নথি </label>
            <input class="form-control" type="file" name="payment_file">
          </div>
          <div class="col-md-6 dashed">
            <h3>আবেদনকারীর  তথ্য</h3>

            <label class="mt-3" for=""> নাম ও নিবন্ধিত  </label><span class="red">*</span>
            <input class="form-control" name="applicant_name" type="test" required>

            <label class="mt-3" for="">  ব্যক্তির সাথে সম্পর্ক</label><span class="red">*</span>
            <input class="form-control" name="relation" type="test" required>

            <label class="mt-3" for=""> আবেদনকারীর সাক্ষর </label><span class="red">*</span>
            <input class="form-control" name="sign" type="file" required>
          </div>




        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="d-flex justify-content-start align-items-center mt-3"> <input type="checkbox" required> &nbsp; <div>  আমি সজ্ঞানে ঘোষণা করিতেছি যে উপরিউক্ত সকল তথ্য সত্য</div></div>

          </div>
          <div class="col-md-6">
            <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button class="btn btn-success notika-btn-success">Submit</button>
             </div>
          </div>
        </div>

      </div>
    </form>
  </div>

  <div class="submit d-flex justify-content-end p-3">
    <a class="btn btn-primary" href="#">Next</a>
  </div>
</section>

<footer class="copyrightFooter">
  <span> &copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
</footer>
<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/correction.blade.php ENDPATH**/ ?>