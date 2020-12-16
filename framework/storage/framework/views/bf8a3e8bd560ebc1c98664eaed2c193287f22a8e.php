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
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('menu.bookings'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header with-border">
        <h3 class="card-title"> <?php echo app('translator')->getFromJson('Manage Application'); ?> &nbsp;
          <a href="<?php echo e(route("bookings.create")); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('New Application'); ?></a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-responsive display" id="data_table1" style="padding-bottom: 35px; width: 100%">
            <thead class="thead-inverse">
              <tr>
                <th>
                  <input type="checkbox" id="chk_all">

                </th>
                <th> Application ID</th>
                <th> Birth ID</th>
                <th>Applican Name</th>
                <th> Name Bangla</th>
                <th>Name English</th>
                <th>Birth Date</th>
                <th>Gender</th>
                <th>Status</th>
                <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $applican_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <input type="checkbox" id="chk_all">

                  <td><?php echo e($row->id); ?></td>
                  <td><?php echo e($row->birth_id); ?></td>
                  <td><?php echo e($row->applican_name); ?></td>
                  <td><?php echo e($row->bangla_name); ?></td>
                  <td><?php echo e($row->english_name); ?></td>
                  <td><?php echo e($row->birth_date); ?></td>
                  <td><?php echo e($row->gender); ?></td>
                  <td><span class="badge badge-secondary"><?php echo e($row->status); ?></span></td>
                  <td> <a href="<?php echo e(url("admin/application/".$row->id."/view")); ?>"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>

              <tr>
                <th>
              
                  <button class="btn btn-danger" id="bulk_delete" data-toggle="modal" data-target="#bulkModal" disabled><?php echo app('translator')->getFromJson('fleet.delete'); ?></button>

                </th>
                <th> Application ID</th>
                <th>Birth ID</th>
                <th>Applican Name</th>
                <th> Name Bangla</th>
                <th>Name English</th>
                <th>Birth Date</th>
                <th>Gender</th>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/application/pending_application.blade.php ENDPATH**/ ?>