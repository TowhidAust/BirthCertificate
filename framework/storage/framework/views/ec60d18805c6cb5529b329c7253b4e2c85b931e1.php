<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="#"><?php echo app('translator')->getFromJson('Correction'); ?></a></li>
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


  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Basic Infomation</strong>
          <p class="text-muted well well-sm " style="margin-top: 10px;">  Birth ID : <?php echo e($data->birth_id); ?>  </p>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Bangla Name : <?php echo e($data->name); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Birth Day : <?php echo e($data->birth_date); ?>  </p>
    </div>
    <div class="col-sm-6 invoice-col">
        <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Application ID : <?php echo e($data->id); ?>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Status : <span class="badge badge-secondary"><?php echo e($data->status); ?></span>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Payment Status : <span class="badge badge-secondary"><?php if($data->payment_status=='0'): ?> Unpaid <?php else: ?> Paid <?php endif; ?></span>  </p>


    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Payment Information</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Bank Name : <?php echo e($data->bank_name); ?>  </p>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Branch Name : <?php echo e($data->branch); ?>  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Transaction ID : <?php echo e($data->transaction_id); ?>  </p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
       <?php if(!empty($data->file)): ?>
      <?php  $extension=substr($data->file,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="<?php echo e(asset($data->file)); ?>"></iframe>
     <?php }else{ ?>

       <img style="height: 90%;width:100%" src="<?php echo e(asset($data->file)); ?>" alt="">

     <?php } ?>
        <?php endif; ?>
    </div>
  </div>
    <h3>Correction Information</h3>
    <div class="row">
      <div class="col-sm-12 invoice-col">
        <table class="table table-bordered" id="dynamic_field">
           <tr>
             <td>Present infomation</td>
             <td>Correction Infomation</td>
           </tr>
           <?php $__currentLoopData = $corrections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
                  <td><?php echo e($row->present); ?></td>
                    <td><?php echo e($row->correction); ?></td>
             </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div></br>
  <h3>Supported Documents</h3>
   <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="row">
     <div class="col-sm-10 invoice-col" style="padding:5%;">
       <?php  $extension=substr($data->file,-3);
       if($extension=='pdf'){
        ?>
        <iframe width="100%" height="500px" src="<?php echo e(asset($data->file)); ?>"></iframe>
      <?php }else{ ?>

        <img style="height: 90%;width:100%" src="<?php echo e(asset($data->file)); ?>" alt="">

      <?php } ?>
     </div>
   </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  <div class="row">
    <div class="col-xs-12">
      <?php if(Auth::user()->user_type == "D" && $approve->councillor!='1'): ?>
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> <?php echo app('translator')->getFromJson('Reject'); ?></button>
      <a href="<?php echo e(url('admin/correction/'.$id.'/approve')); ?>" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
      <?php elseif(Auth::user()->user_type == "A"&&$approve->accountant!='1'): ?>
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> <?php echo app('translator')->getFromJson('Reject'); ?></button>
      <a href="<?php echo e(url('admin/application/'.$id.'/approve')); ?>" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
      <?php elseif(Auth::user()->user_type == "O"&&$approve->officer!='1'): ?>
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> <?php echo app('translator')->getFromJson('Reject'); ?></button>
      <a href="<?php echo e(url('admin/application/'.$id.'/approve')); ?>" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
      <?php elseif(Auth::user()->user_type == "OP"&&$approve->operator!='1'): ?>
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> <?php echo app('translator')->getFromJson('Reject'); ?></button>
      <button data-toggle="modal" data-target="#complete" class="btn btn-success"><i class="fa fa-send"></i> Approve</button>
      <?php endif; ?>

  </div>
  </div>
</div>
<!-- Modal -->
<div id="import" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Reject Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo Form::open(['route'=>'reject_correction','method'=>'POST','files'=>true]); ?>

        <div class="form-group">
          <?php echo Form::label('excel',__('Write Reason below'),['class'=>"form-label"]); ?>

        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo e($id); ?>">
          <textarea name="reason" rows="8" cols="65"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="submit"><?php echo app('translator')->getFromJson('Submit'); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
        <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div id="complete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Complete Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo Form::open(['route'=>'complete','method'=>'POST','files'=>true]); ?>

        <div class="form-group">
          <?php echo Form::label('excel',__('Enter Birth ID *'),['class'=>"form-label"]); ?>

        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
          <input class="form-control" type="text" name="birth_id" value="" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit"><?php echo app('translator')->getFromJson('Submit'); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
        <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- Modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/correction/view.blade.php ENDPATH**/ ?>