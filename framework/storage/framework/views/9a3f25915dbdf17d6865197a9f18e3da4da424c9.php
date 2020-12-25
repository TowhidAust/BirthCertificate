<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>

<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="#"><?php echo app('translator')->getFromJson('menu.reports'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('Correction'); ?> <?php echo app('translator')->getFromJson('fleet.report'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
<style type="text/css">
  .checkbox, #chk_all{
    width: 20px;
    height: 20px;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Correction Report
        </h3>
      </div>

      <div class="card-body">
        <?php echo Form::open(['route' => 'correction_report_post','method'=>'post','class'=>'form-inline']); ?>

        <div class="row">
          <div class="form-group">
            <?php echo Form::label('date1','From'); ?>

            <div class="input-group date">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
              <?php echo Form::text('date1', $date1,['class' => 'form-control','placeholder'=>__('fleet.start_date'),'required']); ?>

            </div>
          </div>
          <div class="form-group" style="margin-right: 10px">
            <?php echo Form::label('date2','To'); ?>

            <div class="input-group date">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
              <?php echo Form::text('date2', $date2,['class' => 'form-control','placeholder'=>__('fleet.end_date'),'required']); ?>

            </div>
          </div>

          <div class="form-group" style="margin-right: 5px">
            <?php echo Form::label('ward_name', __('Ward NO'), ['class' => 'form-label']); ?>

            <select id="ward_name" name="ward_name" class="form-control vehicles" style="width: 150px">
              <option value="">Select Ward NO</option>
              <?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>

          <button type="submit" class="btn btn-info" style="margin-right: 1px"><?php echo app('translator')->getFromJson('fleet.generate_report'); ?></button>
          <!-- <button type="submit" formaction="<?php echo e(url('admin/print-booking-report')); ?>" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson('fleet.print'); ?></button> -->
        </div>
        <?php echo Form::close(); ?>


      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">
        <?php echo app('translator')->getFromJson('fleet.report'); ?>
        </h3>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover"  id="myTable">
            <thead>
              <tr>
                <th> Application ID</th>
                <th> Ward No</th>
                <th> Birth ID</th>
                <th> Application  Name</th>
                <th>Birth Date</th>
                <th>Status</th>
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
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tfoot>
            <tr>
              <th> Application ID</th>
              <th> Ward No</th>
              <th> Birth ID</th>
              <th> Application  Name</th>
              <th>Birth Date</th>
              <th>Status</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection("script"); ?>

<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/jszip.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/pdfmake.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/vfs_fonts.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#customer_id').select2();
    $('#vehicle_id').select2();
    $('#myTable tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="'+title+'" />' );
    });
    var myTable = $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [{
             extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                ]}
        ],

        "language": {
                 "url": '<?php echo e(__("fleet.datatable_lang")); ?>',
              },
        "initComplete": function() {
                myTable.columns().every(function () {
                  var that = this;
                  $('input', this.footer()).on('keyup change', function () {
                      that.search(this.value).draw();
                  });
                });
              }
    });
    $('#date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

    $('#date1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

    $('#date2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/reports/correction.blade.php ENDPATH**/ ?>