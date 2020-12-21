<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>
<?php $__env->startSection('extra_css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
  <style type="text/css">
    .checkbox, #chk_all{
      width: 20px;
      height: 20px;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('Application'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
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
              <table class="table table-responsive display" id="data_table" >
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pending_applican_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($row->id); ?></td>
                      <td><?php echo e($row->ward_name); ?></td>
                      <td><?php echo e($row->birth_id); ?></td>
                      <td><?php echo e($row->name); ?></td>
                      <td><?php echo e($row->birth_date); ?></td>
                      <td><span class="badge badge-secondary"><?php echo e($row->status); ?></span></td>
                      <td> <a href="<?php echo e(url("admin/correction/".$row->id."/view")); ?>"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane" id="upcoming">
            <h4>Approved Applications</h4>
            <div class="table-responsive">
              <table class="table driver_table" id="data_table1" >
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $approved_applican_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($row->id); ?></td>
                      <td><?php echo e($row->ward_name); ?></td>
                      <td><?php echo e($row->birth_id); ?></td>
                      <td><?php echo e($row->name); ?></td>
                      <td><?php echo e($row->birth_date); ?></td>
                      <td><span class="badge badge-secondary"><?php echo e($row->status); ?></span></td>
                      <td> <a href="<?php echo e(url("admin/correction/".$row->id."/view")); ?>"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="rejected">
            <h4>Approved Applications</h4>
            <div class="table-responsive">
              <table class="table driver_table" id="data_table2">
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $rejected_applican_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($row->id); ?></td>
                      <td><?php echo e($row->ward_name); ?></td>
                      <td><?php echo e($row->birth_id); ?></td>
                      <td><?php echo e($row->name); ?></td>
                      <td><?php echo e($row->birth_date); ?></td>
                      <td><span class="badge badge-secondary"><?php echo e($row->status); ?></span></td>
                      <td> <a href="<?php echo e(url("admin/correction/".$row->id."/view")); ?>"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/correction/today_application.blade.php ENDPATH**/ ?>