<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="#"><?php echo app('translator')->getFromJson('Application'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('New Application'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
      <h4>
        <span class="logo-lg">
          <img src="<?php echo e(asset('assets/images/'. Hyvikk::get('icon_img') )); ?>" class="navbar-brand" style="height: 100px;margin-top: -15px">
          <?php echo e(Hyvikk::get('app_name')); ?>

        </span>
        <span><h5><?php if(Session::has('message')): ?>
              <div class="alert alert-success" role="alert">
                <?php echo session('message'); ?>

              </div>
              <?php endif; ?></h5>
        </span>
        <span><h5><?php if(Session::has('complete')): ?>
              <div class="alert alert-success" role="alert">
                <?php echo session('complete'); ?>

              </div>
              <?php endif; ?></h5>
        </span>
        <span><h5><?php if(Session::has('reject')): ?>
              <div class="alert alert-danger" role="alert">
                <?php echo session('reject'); ?>

              </div>
              <?php endif; ?></h5>
        </span>
      </h4>
    </div>
  </div>
  <form  id="form1" action="<?php echo e(route('update')); ?>" method="post" enctype="multipart/form-data">
     <?php echo e(csrf_field()); ?>

 <input type="hidden" name="applicant_id" value="<?php echo e($id); ?>">
 <input type="hidden" name="correction_id" value="<?php echo e($correction_id); ?>">
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">   </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Status : <span class="badge badge-secondary"><?php echo e($data->status); ?></span>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Payment Status : <span class="badge badge-secondary"><?php if($data->payment_status=='0'): ?> Unpaid <?php else: ?> Paid <?php endif; ?></span>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Division : <?php echo e($data->applican_name); ?>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Ward : <?php echo e($data->ward_name); ?>  </p>
      <select class="form-control" name="ward_name" style="width:50%">
        <?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
    <div class="col-sm-6 invoice-col">
      <?php if(!empty($data->image)): ?>
      <img src="<?php echo e(asset($data->image)); ?>" class="navbar-brand" style="height: 180px;margin-top: -15px">
      <?php else: ?>
      <img src="<?php echo e(asset('uploads/profile/user.png')); ?>" class="navbar-brand" style="height: 180px;margin-top: -15px">

      <?php endif; ?>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application ID : <?php echo e($data->applicant_id); ?>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Birth ID : <?php echo e($data->birth_id); ?>  </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Basic Infomation</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Bangla Name : <input class="form-control" type="text" name="bangla_name" value="<?php echo e($data->bangla_name); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  English Name : <input class="form-control" type="text" name="english_name" value="<?php echo e($data->english_name); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Number : <input class="form-control" type="text" name="number" value="<?php echo e($data->number); ?>"> </p>

    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm no-shadow"></p>
      <p style="margin-bottom:5px;" class="text-muted well well-sm no-shadow"></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Birth Day : <input class="form-control" type="text" name="birth_date" value="<?php echo e($data->birth_date); ?>"> </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Gender : <input class="form-control" type="text" name="gender" value="<?php echo e($data->gender); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Family Member Position : <input class="form-control" type="text" name="sons_position" value="<?php echo e($data->sons_position); ?>">  </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Father's Infomation</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Father Name Bangla: <input class="form-control" type="text" name="father_name_bn" value="<?php echo e($data->father_name_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Name English : <input class="form-control" type="text" name="father_name_en" value="<?php echo e($data->father_name_en); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Birth ID : <input class="form-control" type="text" name="father_birth_id" value="<?php echo e($data->father_birth_id); ?>"> </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father NID : <input class="form-control" type="text" name="father_nid_no" value="<?php echo e($data->father_nid_no); ?>"> </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Passport No : <input class="form-control" type="text" name="father_passport" value="<?php echo e($data->father_passport); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Nationality : <input class="form-control" type="text" name="father_nationality" value="<?php echo e($data->father_nationality); ?>"> </p>
    </div>
    <div class="col-sm-6 invoice-col">
      <strong>Mother's Infomation</strong>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Mother Name Bangla: <input class="form-control" type="text" name="mother_name_bn" value="<?php echo e($data->mother_name_bn); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Name English : <input class="form-control" type="text" name="mother_name_en" value="<?php echo e($data->mother_name_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Birth ID : <input class="form-control" type="text" name="mother_birth_id" value="<?php echo e($data->mother_birth_id); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother NID : <input class="form-control" type="text" name="mother_nid_no" value="<?php echo e($data->mother_nid_no); ?>"> </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Passport No : <input class="form-control" type="text" name="mother_passport" value="<?php echo e($data->mother_passport); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Nationality : <input class="form-control" type="text" name="mother_nationality" value="<?php echo e($data->mother_nationality); ?>"> </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Present Address Bangla</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <input class="form-control" type="text" name="p_house_no_bn" value="<?php echo e($data->p_house_no_bn); ?>"> </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <input class="form-control" type="text" name="p_village_bn" value="<?php echo e($data->p_village_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <input class="form-control" type="text" name="p_union_bn" value="<?php echo e($data->p_union_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <input class="form-control" type="text" name="p_post_office_bn" value="<?php echo e($data->p_post_office_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <input class="form-control" type="text" name="p_post_code_bn" value="<?php echo e($data->p_post_code_bn); ?>"></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <input class="form-control" type="text" name="p_police_station_bn" value="<?php echo e($data->p_police_station_bn); ?>"></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <input class="form-control" type="text" name="p_district_bn" value="<?php echo e($data->p_district_bn); ?>"></p>
    </div>
    <div class="col-sm-6 invoice-col">
        <strong>Present Address English</strong>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <input class="form-control" type="text" name="p_house_no_en" value="<?php echo e($data->p_house_no_en); ?>"> </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <input class="form-control" type="text" name="p_village_en" value="<?php echo e($data->p_village_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <input class="form-control" type="text" name="p_union_en" value="<?php echo e($data->p_union_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <input class="form-control" type="text" name="p_post_office_en" value="<?php echo e($data->p_post_office_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <input class="form-control" type="text" name="p_post_code_en" value="<?php echo e($data->p_post_code_en); ?>"></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <input class="form-control" type="text" name="p_police_station_en" value="<?php echo e($data->p_police_station_en); ?>"></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <input class="form-control" type="text" name="p_district_en" value="<?php echo e($data->p_district_en); ?>"></p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Birth Address Bangla</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <input class="form-control" type="text" name="b_house_no_bn" value="<?php echo e($data->b_house_no_bn); ?>"> </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <input class="form-control" type="text" name="b_village_bn" value="<?php echo e($data->b_village_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <input class="form-control" type="text" name="b_union_bn" value="<?php echo e($data->b_union_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <input class="form-control" type="text" name="b_post_office_bn" value="<?php echo e($data->b_post_office_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <input class="form-control" type="text" name="b_post_code_bn" value="<?php echo e($data->b_post_code_bn); ?>"></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <input class="form-control" type="text" name="b_police_station_bn" value="<?php echo e($data->b_police_station_bn); ?>"></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <input class="form-control" type="text" name="b_district_bn" value="<?php echo e($data->b_district_bn); ?>"></p>
    </div>
    <div class="col-sm-6 invoice-col">
        <strong>Birth Address English</strong>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <input class="form-control" type="text" name="b_house_no_en" value="<?php echo e($data->p_house_no_en); ?>"> </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <input class="form-control" type="text" name="b_village_en" value="<?php echo e($data->p_village_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <input class="form-control" type="text" name="b_union_en" value="<?php echo e($data->p_union_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <input class="form-control" type="text" name="b_post_office_en" value="<?php echo e($data->p_post_office_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <input class="form-control" type="text" name="b_post_code_en" value="<?php echo e($data->p_post_code_en); ?>"></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <input class="form-control" type="text" name="b_police_station_en" value="<?php echo e($data->p_police_station_en); ?>"></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <input class="form-control" type="text" name="b_district_en" value="<?php echo e($data->p_district_en); ?>"></p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Permanent Address Bangla</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <input class="form-control" type="text" name="per_house_no_bn" value="<?php echo e($data->per_house_no_bn); ?>"> </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <input class="form-control" type="text" name="per_village_bn" value="<?php echo e($data->per_village_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <input class="form-control" type="text" name="per_union_bn" value="<?php echo e($data->per_union_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <input class="form-control" type="text" name="per_post_office_bn" value="<?php echo e($data->per_post_office_bn); ?>">  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <input class="form-control" type="text" name="per_post_code_bn" value="<?php echo e($data->per_post_code_bn); ?>"></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <input class="form-control" type="text" name="per_police_station_bn" value="<?php echo e($data->per_police_station_bn); ?>"></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <input class="form-control" type="text" name="per_district_bn" value="<?php echo e($data->per_district_bn); ?>"></p>
    </div>
    <div class="col-sm-6 invoice-col">
        <strong>Permanent Address English</strong>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <input class="form-control" type="text" name="per_house_no_en" value="<?php echo e($data->p_house_no_en); ?>"> </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <input class="form-control" type="text" name="per_village_en" value="<?php echo e($data->p_village_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <input class="form-control" type="text" name="per_union_en" value="<?php echo e($data->p_union_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <input class="form-control" type="text" name="per_post_office_en" value="<?php echo e($data->p_post_office_en); ?>">  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <input class="form-control" type="text" name="per_post_code_en" value="<?php echo e($data->p_post_code_en); ?>"></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <input class="form-control" type="text" name="per_police_station_en" value="<?php echo e($data->p_police_station_en); ?>"></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <input class="form-control" type="text" name="per_district_en" value="<?php echo e($data->p_district_en); ?>"></p>
    </div>
  </div>


  <div class="row">
    <div class="col-xs-12">
    <?php if(Auth::user()->user_type == "OP"): ?>
        <button style="float:right;" class="btn btn-success"><i class="fa fa-edit"></i> Update</button>
      <?php endif; ?>

  </div>
  </div>

</form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/correction/update.blade.php ENDPATH**/ ?>