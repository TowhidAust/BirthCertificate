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
              <?php endif; ?></h5></span>
      </h4>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Basic Infomation</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Bangla Name : <?php echo e($data->bangla_name); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  English Name : <?php echo e($data->english_name); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Number : <?php echo e($data->number); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Birth Day : <?php echo e($data->birth_date); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Gender : <?php echo e($data->gender); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Family Member Position : <?php echo e($data->sons_position); ?>  </p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">   </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Status : <span class="badge badge-secondary"><?php echo e($data->status); ?></span>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Division : <?php echo e($data->applican_name); ?>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Ward : <?php echo e($data->ward_name); ?>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application ID : <?php echo e($data->applicant_id); ?>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Birth ID : <?php echo e($data->birth_id); ?>  </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Parent's Infomation</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Father Name Bangla: <?php echo e($data->father_name_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Name English : <?php echo e($data->father_name_en); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Birth ID : <?php echo e($data->father_birth_id); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father NID : <?php echo e($data->father_nid_no); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Passport No : <?php echo e($data->father_passport); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Nationality : <?php echo e($data->father_nationality); ?>  </p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Mother Name Bangla: <?php echo e($data->mother_name_bn); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Name English : <?php echo e($data->mother_name_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Birth ID : <?php echo e($data->mother_birth_id); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother NID : <?php echo e($data->father_nid_no); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Passport No : <?php echo e($data->mother_passport); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Nationality : <?php echo e($data->mother_nationality); ?>  </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Present Address</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <?php echo e($data->p_house_no_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <?php echo e($data->p_village_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <?php echo e($data->p_union_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <?php echo e($data->p_post_office_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <?php echo e($data->p_post_code_bn); ?></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <?php echo e($data->p_police_station_bn); ?></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <?php echo e($data->p_district_bn); ?></p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <?php echo e($data->p_house_no_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <?php echo e($data->p_village_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <?php echo e($data->p_union_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <?php echo e($data->p_post_office_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <?php echo e($data->p_post_code_en); ?></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <?php echo e($data->p_police_station_en); ?></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <?php echo e($data->p_district_en); ?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Birth Address</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <?php echo e($data->b_house_no_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <?php echo e($data->b_village_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <?php echo e($data->b_union_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <?php echo e($data->b_post_office_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <?php echo e($data->b_post_code_bn); ?></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <?php echo e($data->b_police_station_bn); ?></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <?php echo e($data->b_district_bn); ?></p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <?php echo e($data->b_house_no_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <?php echo e($data->b_village_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <?php echo e($data->b_union_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <?php echo e($data->b_post_office_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <?php echo e($data->b_post_code_en); ?></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <?php echo e($data->b_police_station_en); ?></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <?php echo e($data->b_district_en); ?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Permanent Address</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <?php echo e($data->per_house_no_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <?php echo e($data->per_village_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <?php echo e($data->per_union_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <?php echo e($data->per_post_office_bn); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <?php echo e($data->per_post_code_bn); ?></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <?php echo e($data->per_police_station_bn); ?></p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <?php echo e($data->per_district_bn); ?></p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: <?php echo e($data->per_house_no_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : <?php echo e($data->per_village_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : <?php echo e($data->per_union_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : <?php echo e($data->per_post_office_en); ?>  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : <?php echo e($data->per_post_code_en); ?></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : <?php echo e($data->per_police_station_en); ?></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : <?php echo e($data->per_district_en); ?></p>
    </div>
  </div>
    <h3>Supported Documents</h3>
  <div class="row">
    <div class="col-sm-3 invoice-col">
      <strong>Father's NID</strong>
    </div>
    <div class="col-sm-9 invoice-col">
      <?php  $extension=substr($data->father_nid,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="<?php echo e(asset($data->father_nid)); ?>"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%" src="<?php echo e(asset($data->father_nid)); ?>" alt="">
     <?php } ?>
    </div>
    </div>
  <div class="row">
    <div class="col-sm-3 invoice-col">
      <strong>Mother's NID</strong>
    </div>
    <div class="col-sm-9 invoice-col">
      <?php  $extension=substr($data->mother_nid,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="<?php echo e(asset($data->mother_nid)); ?>"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%" src="<?php echo e(asset($data->mother_nid)); ?>" alt="">
     <?php } ?>
     </div>
    </div>

    <div class="row">
    <div class="col-sm-3 invoice-col">
      <strong>Medical Report / Tika Card</strong>
    </div>
    <div class="col-sm-9 invoice-col">
      <?php  $extension=substr($data->card,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="<?php echo e(asset($data->card)); ?>"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%;" src="<?php echo e(asset($data->card)); ?>" alt="">
     <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3 invoice-col">
      <strong>Others Documents</strong>
    </div>
    <div class="col-sm-9 invoice-col">
      <?php  $extension=substr($data->others,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="<?php echo e(asset($data->others)); ?>"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%;" src="<?php echo e(asset($data->others)); ?>" alt="">
     <?php } ?>
    </div>
    </div>
<?php
 $approve=DB::table('approvals')->where('applicant_id',$data->applicant_id)->first();
 ?>

  <div class="row">
    <div class="col-xs-12">
      <a href="<?php echo e(url('admin/print/'.$id)); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson('fleet.print'); ?></a>
   <?php if(Auth::user()->user_type == "S"): ?>
   <a href="<?php echo e(url('admin/print/'.$id)); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-undo"></i> Reject</a>
   <a href="<?php echo e(url('admin/application/'.$data->applicant_id.'/approve')); ?>" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
   <?php endif; ?>
   <?php if(Auth::user()->user_type == "D"&&$approve->councillor=='0'): ?>
   <a href="<?php echo e(url('admin/print/'.$id)); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-undo"></i> Reject</a>
   <a href="<?php echo e(url('admin/application/'.$data->applicant_id.'/approve')); ?>" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
   <?php endif; ?>

  </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/application/view.blade.php ENDPATH**/ ?>