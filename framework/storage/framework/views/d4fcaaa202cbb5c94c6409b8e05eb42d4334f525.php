<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>

<?php $__env->startSection('extra_css'); ?>
<style type="text/css">
.nav-tabs-custom>.nav-tabs>li.active{border-top-color:#3c8dbc !important;}
.custom_color.active
{
  color: #fff;
  background-color: #02bcd1 !important;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(url('admin/')); ?>"><?php echo app('translator')->getFromJson('fleet.home'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.myProfile'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-3">
  <!-- Profile Image -->
    <div class="card card-info card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <?php if($data->getMeta('driver_image') != null): ?>
            <?php if(starts_with($data->getMeta('driver_image'),'http')): ?>
              <?php ($src = $data->getMeta('driver_image')); ?>
            <?php else: ?>
              <?php ($src=asset('uploads/'.$data->getMeta('driver_image'))); ?>
            <?php endif; ?>
            <img src="<?php echo e($src); ?>" class="profile-user-img img-responsive img-circle"  alt="User profile picture">
          <?php else: ?>
            <img src="<?php echo e(asset("assets/images/no-user.jpg")); ?>" alt="User profile picture" class="profile-user-img img-responsive img-circle">
          <?php endif; ?>
        </div>
        <h3 class="profile-username text-center">  <?php echo e(Auth::user()->name); ?></h3>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>
             Ward No</b> <a class="pull-right"> <?php echo e($data->ward_name); ?> </a>
          </li>
          <li class="list-group-item">
            <b>
            <?php echo app('translator')->getFromJson('fleet.total'); ?>
            Application</b> <a class="pull-right"> <?php echo e($total); ?> </a>
          </li>
          <li class="list-group-item">
            <b>
            <?php echo app('translator')->getFromJson('fleet.total'); ?>
            Correction</b> <a class="pull-right"> <?php echo e($total_correction); ?> </a>
          </li>
        </ul>
        <a href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="btn btn-info btn-block"><b><?php echo app('translator')->getFromJson('fleet.editProfile'); ?></b></a>
      </div>
    </div>
    <!-- About Me Box -->
    <div class="card card-info">
      <div class="card-header">
      <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.about_me'); ?></h3>
      </div>
      <!-- /.box-header -->
      <div class="card-body">
        <strong><i class="fa fa-user margin-r-5"></i> <?php echo app('translator')->getFromJson('fleet.personal_info'); ?></strong>
        <p class="text-muted">
          <?php echo e($data->getMeta('first_name')); ?> <?php echo e($data->getMeta('middle_name')); ?> <?php echo e($data->getMeta('last_name')); ?>

          <br>
          <?php echo e($data->getMeta('phone')); ?>

          <br>
          <?php echo e($data->email); ?>

          <br>
          <?php echo e($data->getMeta('address')); ?>

        </p>
        <hr>


      </div>
    </div>
    <!-- /.box -->
  </div>

  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link custom_color active" href="#activity" data-toggle="tab">Pending</a></li>
          <li class="nav-item"><a class="nav-link custom_color" href="#upcoming" data-toggle="tab">Approved</a></li>
          <li class="nav-item"><a class="nav-link custom_color " style="color:red;" href="#rejected" data-toggle="tab">Rejected</a></li>

        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <h4>Pending Applications</h4>
            <div class="table-responsive">
              <table class="table driver_table">
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Name Bangla</th>
                    <th>Name English</th>
                    <th>Number</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pending_applican_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($row->applicant_id); ?></td>
                      <td><?php echo e($row->bangla_name); ?></td>
                      <td><?php echo e($row->english_name); ?></td>
                      <td><?php echo e($row->number); ?></td>
                      <td><?php echo e($row->birth_date); ?></td>
                      <td><?php echo e($row->gender); ?></td>
                      <td><span class="badge badge-secondary"><?php echo e($row->status); ?></span></td>
                      <td> <a href="<?php echo e(url("admin/application/".$row->applicant_id."/view")); ?>"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th> Application ID</th>
                    <th> Name Bangla</th>
                    <th>Name English</th>
                    <th>Number</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="tab-pane" id="upcoming">
            <h4>Approved Applican</h4>
            <div class="table-responsive">
              <table class="table driver_table">
                <thead class="thead-inverse">
                  <tr>
                    <tr>
                      <th> Application ID</th>
                      <th> Name Bangla</th>
                      <th>Name English</th>
                      <th>Number</th>
                      <th>Birth Date</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $approved_applican_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($row->applicant_id); ?></td>
                      <td><?php echo e($row->bangla_name); ?></td>
                      <td><?php echo e($row->english_name); ?></td>
                      <td><?php echo e($row->number); ?></td>
                      <td><?php echo e($row->birth_date); ?></td>
                      <td><?php echo e($row->gender); ?></td>
                      <td><span class="badge badge-secondary"><?php echo e($row->status); ?></span></td>
                      <td> <a href="<?php echo e(url("admin/application/".$row->applicant_id."/view")); ?>"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>  <tfoot>
                    <tr>
                      <th> Application ID</th>
                      <th> Name Bangla</th>
                      <th>Name English</th>
                      <th>Number</th>
                      <th>Birth Date</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="rejected">
            <h4>Approved Applican</h4>
            <div class="table-responsive">
              <table class="table driver_table">
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Name Bangla</th>
                    <th>Name English</th>
                    <th>Number</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $rejected_applican_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                      <td><?php echo e($row->applicant_id); ?></td>
                      <td><?php echo e($row->bangla_name); ?></td>
                      <td><?php echo e($row->english_name); ?></td>
                      <td><?php echo e($row->number); ?></td>
                      <td><?php echo e($row->birth_date); ?></td>
                      <td><?php echo e($row->gender); ?></td>
                      <td><?php echo e($row->reason); ?></td>
                      <td><span class="badge badge-secondary"><?php echo e($row->status); ?></span></td>
                      <td> <a href="<?php echo e(url("admin/application/".$row->applicant_id."/view")); ?>"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                 <tfoot>
                   <tr>
                     <th> Application ID</th>
                     <th> Name Bangla</th>
                     <th>Name English</th>
                     <th>Number</th>
                     <th>Birth Date</th>
                     <th>Gender</th>
                     <th>Reason</th>
                     <th>Status</th>
                     <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                   </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$('.driver_table').DataTable({
  "language": {
      "url": '<?php echo e(__("fleet.datatable_lang")); ?>',
   }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/councillors/profile.blade.php ENDPATH**/ ?>