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
        <h3 class="card-title"> <?php echo app('translator')->getFromJson('fleet.manage_bookings'); ?> &nbsp;
          <a href="<?php echo e(route("bookings.create")); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('fleet.new_booking'); ?></a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-responsive display" id="data_table1" style="padding-bottom: 35px; width: 100%">
            <thead class="thead-inverse">
              <tr>
                <th>
                  <?php if($data->count() > 0): ?>
                  <input type="checkbox" id="chk_all">
                  <?php endif; ?>
                </th>
                <th><?php echo app('translator')->getFromJson('fleet.customer'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.pickup_addr'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.pickup'); ?></th>
                <th>Number of Cars</th>
                <th><?php echo app('translator')->getFromJson('Booking Type'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.journey_status'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.booking_status'); ?></th>
                <th>Return Amount</th>
                <th><?php echo app('translator')->getFromJson('fleet.amount'); ?></th>
                <th>(%) </th>
                <th>Charge</th>
                <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                <td>
                  <input type="checkbox" name="ids[]" value="<?php echo e($row->id); ?>" class="checkbox" id="chk<?php echo e($row->id); ?>" onclick='checkcheckbox();'>
                </td>
                <td style="width: 10% !important">
                  <?php if(!empty($row->customer->name)): ?>
                  <?php echo e($row->customer->name); ?></br><?php echo e($row->customer->mobno); ?>

                  <?php else: ?>
                   <?php echo e('Customer ID Missing'); ?>

                   <?php endif; ?>
                </td>
                <td style="width: 10% !important">
                  <?php if($row->vehicle_id): ?>
                  <?php echo e($row->vehicle->make); ?> - <?php echo e($row->vehicle->model); ?> - <?php echo e($row->vehicle->license_plate); ?>

                  <?php endif; ?>
                </td>
                <td style="width:10% !important"><?php echo str_replace(",", ",<br>", $row->pickup_addr); ?></td>
                <td style="width: 10% !important">
                <?php if($row->pickup != null): ?>
                <?php echo e(date($date_format_setting.' g:i A',strtotime($row->pickup))); ?>

                <?php endif; ?>
                </td>
                <td style="width: 10% !important"><?php echo e($row->car); ?></td>
                <td style="width: 10% !important"><a target="_blank" href="<?php echo e(url('admin/bookings/info/'.$row->id)); ?>"><?php echo e($row->type); ?></a></td>
                <td style="width: 10% !important">
                <?php if($row->status == 1): ?>
                <span class="text-success">
                <?php echo app('translator')->getFromJson('fleet.completed'); ?>
                </span>
                <?php else: ?>
                <span class="text-warning">
                <?php echo app('translator')->getFromJson('fleet.not_completed'); ?>
                </span>
                <?php endif; ?>
                </td>
                <td><?php echo e($row->ride_status); ?></td>
                <td style="width: 10% !important">  <?php echo e(Hyvikk::get('currency')); ?> <?php echo e($row->return_amount); ?></td>
                <td style="width: 10% !important">
                <?php echo e(Hyvikk::get('currency')); ?> <?php echo e($row->trip_fare); ?>

                </td>
                <td style="width: 10% !important">
                  <?php $commission_rate=0;$total_commission=0;?>
                    <?php $__currentLoopData = $fare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->trip_fare>=$fa->start&&$row->trip_fare<=$fa->end): ?>
                  <?php
                    $commission_rate=$fa->commission;
                    $total_commission=($row->trip_fare*$commission_rate)/100;?>
                    <?php echo e($fa->commission); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td style="width: 10% !important">
                  <?php if($total_commission>0): ?>
                 <?php echo e($total_commission); ?>

                  <?php endif; ?>
                </td>
                <td style="width: 10% !important">
                <div class="btn-group">
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-gear"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu custom" role="menu">
                    <?php if($row->status==0 && $row->ride_status != "Cancelled"): ?>
                    <a class="dropdown-item" href="<?php echo e(url('admin/bookings/'.$row->id.'/edit')); ?>"> <span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> <?php echo app('translator')->getFromJson('fleet.edit'); ?></a>
                    <?php if($row->receipt != 1): ?>
                    <a class="dropdown-item vtype" data-id="<?php echo e($row->id); ?>" data-toggle="modal" data-target="#cancelBooking" > <span class="fa fa-times" aria-hidden="true" style="color: #dd4b39"></span> <?php echo app('translator')->getFromJson('fleet.cancel_booking'); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <a class="dropdown-item vtype" data-id="<?php echo e($row->id); ?>" data-toggle="modal" data-target="#myModal" > <span class="fa fa-trash" aria-hidden="true" style="color: #dd4b39"></span> <?php echo app('translator')->getFromJson('fleet.delete'); ?></a>
                    <?php if($row->vehicle_id != null): ?>
                    <?php if($row->status==0 && $row->receipt != 1): ?>
                    <?php if(Auth::user()->user_type != "C" && $row->ride_status != "Cancelled"): ?>
                    <a data-toggle="modal" data-target="#receiptModal" class="open-AddBookDialog dropdown-item" data-booking-id="<?php echo e($row->id); ?>" data-user-id="<?php echo e($row->user_id); ?>" data-customer-id="<?php echo e($row->customer_id); ?>" data-vehicle-id= "<?php echo e($row->vehicle_id); ?>" data-vehicle-type="<?php echo e(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype))); ?>" data-base-mileage="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_base_km')); ?>" data-base-fare="<?php echo e($row->trip_fare); ?>"
                    data-base_km_1="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_base_km')); ?>"
                    data-base_fare_1="<?php echo e($row->trip_fare); ?>"
                    data-wait_time_1="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_base_time')); ?>"
                    data-std_fare_1="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_std_fare')); ?>"

                    data-base_km_2="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_weekend_base_km')); ?>"
                    data-base_fare_2="<?php echo e($row->trip_fare); ?>"
                    data-wait_time_2="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_weekend_wait_time')); ?>"
                    data-std_fare_2="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_weekend_std_fare')); ?>"

                    data-base_km_3="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_night_base_km')); ?>"
                    data-base_fare_3="<?php echo e($row->trip_fare); ?>"
                    data-base_fare_4="<?php echo e($commission_rate); ?>"
                    data-base_fare_5="<?php echo e($total_commission); ?>"
                    data-wait_time_3="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_night_wait_time')); ?>"
                    data-std_fare_3="<?php echo e(Hyvikk::fare(strtolower(str_replace(' ','',$row->vehicle->types->vehicletype)).'_night_std_fare')); ?>"
                    ><span aria-hidden="true" class="fa fa-file" style="color: #5cb85c;">

                    </span> Make Charge
                    </a>
                    <?php endif; ?>
                    <?php elseif($row->receipt == 1): ?>
                    <a class="dropdown-item" href="<?php echo e(url('admin/bookings/receipt/'.$row->id)); ?>"><span aria-hidden="true" class="fa fa-list" style="color: #31b0d5;"></span> <?php echo app('translator')->getFromJson('fleet.receipt'); ?>
                    </a>
                    <?php if($row->receipt == 1 && $row->status == 0 && Auth::user()->user_type != "C"): ?>
                    <a class="dropdown-item" href="<?php echo e(url('admin/bookings/complete/'.$row->id)); ?>" data-id="<?php echo e($row->id); ?>" data-toggle="modal" data-target="#journeyModal"><span aria-hidden="true" class="fa fa-check" style="color: #5cb85c;"></span> <?php echo app('translator')->getFromJson('fleet.complete'); ?>
                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if($row->status==1): ?>
                    <?php if($row->payment==0 && Auth::user()->user_type !="C"): ?>
                    <a class="dropdown-item" href="<?php echo e(url('admin/bookings/payment/'.$row->id)); ?>"><span aria-hidden="true" class="fa fa-credit-card" style="color: #5cb85c;"></span> <?php echo app('translator')->getFromJson('fleet.make_payment'); ?>
                    </a>
                    <?php elseif($row->payment==1): ?>
                    <a class="dropdown-item text-muted" class="disabled"><span aria-hidden="true" class="fa fa-credit-card" style="color: #5cb85c;"></span> <?php echo app('translator')->getFromJson('fleet.paid'); ?>
                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </div>
                <?php echo Form::open(['url' => 'admin/bookings/'.$row->id,'method'=>'DELETE','class'=>'form-horizontal','id'=>'book_'.$row->id]); ?>

                <?php echo Form::hidden("id",$row->id); ?>

                <?php echo Form::close(); ?>

                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
              <tr>
                <th>
                <?php if($data->count() > 0): ?>
                  <button class="btn btn-danger" id="bulk_delete" data-toggle="modal" data-target="#bulkModal" disabled><?php echo app('translator')->getFromJson('fleet.delete'); ?></button>
                <?php endif; ?>
                </th>
                <th><?php echo app('translator')->getFromJson('fleet.customer'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.vehicle'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.pickup_addr'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.dropoff_addr'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.pickup'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.dropoff'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.passengers'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.journey_status'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.booking_status'); ?></th>
                <th><?php echo app('translator')->getFromJson('fleet.amount'); ?></th>
                <th>Charge %</th>
                <th>Charge</th>
                <th><?php echo app('translator')->getFromJson('fleet.action'); ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- cancel booking Modal -->
<div id="cancelBooking" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.cancel_booking'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><?php echo app('translator')->getFromJson('fleet.confirm_cancel'); ?></p>
        <?php echo Form::open(['url'=>url('admin/cancel-booking'),'id'=>'cancel_booking']); ?>

        <div class="form-group">
          <?php echo Form::hidden('cancel_id',null,['id'=>'cancel_id']); ?>

          <?php echo Form::label('reason',__('fleet.addReason'),['class'=>"form-label"]); ?>

          <?php echo Form::text('reason',null,['class'=>"form-control",'required']); ?>

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><?php echo app('translator')->getFromJson('fleet.submit'); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- cancel booking Modal -->

<!-- complete journey Modal -->
<div id="journeyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.complete'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><?php echo app('translator')->getFromJson('fleet.confirm_journey'); ?></p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" href="" id="journey_btn"><?php echo app('translator')->getFromJson('fleet.submit'); ?></a>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
    </div>
  </div>
</div>
<!-- complete journey Modal -->

<!-- bulk delete Modal -->
<div id="bulkModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.delete'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo Form::open(['url'=>'admin/delete-bookings','method'=>'POST','id'=>'form_delete']); ?>

        <div id="bulk_hidden"></div>
        <p><?php echo app('translator')->getFromJson('fleet.confirm_bulk_delete'); ?></p>
      </div>
      <div class="modal-footer">
        <button id="bulk_action" class="btn btn-danger" type="submit" data-submit=""><?php echo app('translator')->getFromJson('fleet.delete'); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
        <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- bulk delete Modal -->

<!-- single delete Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.delete'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><?php echo app('translator')->getFromJson('fleet.confirm_delete'); ?></p>
      </div>
      <div class="modal-footer">
        <button id="del_btn" class="btn btn-danger" type="button" data-submit=""><?php echo app('translator')->getFromJson('fleet.delete'); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('fleet.close'); ?></button>
      </div>
    </div>
  </div>
</div>
<!-- single delete Modal -->


<!-- generate invoic Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card card-info">
        <div class="modal-header">
          <h3 class="modal-title"><?php echo app('translator')->getFromJson('fleet.add_payment'); ?></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

        <div class="fleet card-body">
          <?php echo Form::open(['route' => 'bookings.complete','method'=>'post']); ?>

          <input type="hidden" name="status" id="status" value="1"/>
          <input type="hidden" name="booking_id" id="bookingId" value=""/>
          <input type="hidden" name="userId" id="userId" value=""/>
          <input type="hidden" name="customerId" id="customerId" value=""/>
          <input type="hidden" name="vehicleId" id="vehicleId" value=""/>
          <input type="hidden" name="type" id="type" value=""/>
          <input type="hidden" name="base_km_1" value="" id="base_km_1">
          <input type="hidden" name="base_fare_1" value="" id="base_fare_1">
          <input type="hidden" name="wait_time_1" value="" id="wait_time_1">
          <input type="hidden" name="std_fare_1" value="" id="std_fare_1">
          <input type="hidden" name="base_km_2" value="" id="base_km_2">
          <input type="hidden" name="base_fare_2" value="" id="base_fare_2">
          <input type="hidden" name="wait_time_2" value="" id="wait_time_2">
          <input type="hidden" name="std_fare_2" value="" id="std_fare_2">
          <input type="hidden" name="base_km_3" value="" id="base_km_3">
          <input type="hidden" name="base_fare_3" value="" id="base_fare_3">
          <input type="hidden" name="wait_time_3" value="" id="wait_time_3">
          <input type="hidden" name="std_fare_3" value="" id="std_fare_3">
          <?php ($no_of_tax = 0); ?>
          <?php if(Hyvikk::get('tax_charge') != "null"): ?>
            <?php ($no_of_tax = sizeof(json_decode(Hyvikk::get('tax_charge'), true))); ?>
            <?php ($taxes = json_decode(Hyvikk::get('tax_charge'), true)); ?>
            <?php ($i=0); ?>
            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" name="<?php echo e('tax_'.$i); ?>" value="<?php echo e($val); ?>" class="<?php echo e('tax_'.$i); ?>">
              <?php ($i++); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label"><?php echo app('translator')->getFromJson('fleet.incomeType'); ?></label>
                <select id="income_type" name="income_type" class="form-control vehicles" required>
                  <option value=""><?php echo app('translator')->getFromJson('fleet.incomeType'); ?></option>
                  <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Charge %
                 </label>
                <?php echo Form::number('waiting_time',0,['class'=>'form-control sum','min'=>0,'id'=>'base_fare_4']); ?>

                  <?php echo Form::hidden('total_tax_charge',0,['class'=>'form-control sum','id'=>'total_tax_charge']); ?>

                  <?php echo Form::hidden('total_tax_charge_rs',0,['class'=>'form-control sum','id'=>'total_tax_charge_rs']); ?>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label"><?php echo app('translator')->getFromJson('fleet.amount'); ?> </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text"><?php echo e(Hyvikk::get('currency')); ?></span></div>
                  <?php echo Form::number('total',null,['class'=>'form-control','id'=>'total','required']); ?>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label"><?php echo app('translator')->getFromJson('fleet.total'); ?> Charge</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text"><?php echo e(Hyvikk::get('currency')); ?></span></div>
                  <?php echo Form::number('tax_total',null,['class'=>'form-control','id'=>'base_fare_5','readonly']); ?>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label"><?php echo app('translator')->getFromJson('fleet.date'); ?></label>
                <div class='input-group'>
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                  </div>
                  <?php echo Form::text('date',date('Y-m-d'),['class'=>'form-control','id'=>'date']); ?>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo Form::submit(__('fleet.invoice'), ['class' => 'btn btn-info']); ?>

            </div>
          </div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- generate invoice modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>

<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
  <?php if(Session::get('msg')): ?>
    new PNotify({
        title: 'Success!',
        text: '<?php echo e(Session::get('msg')); ?>',
        type: 'success'
      });
  <?php endif; ?>

  $(document).ready(function() {
    $('#date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  });
</script>
<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {
    // alert($(this).data('base_km_1'));
    // window.open("route('bookings.index')/?type="+$(this).data('vehicle-type'));

    // const query = new URLSearchParams(window.location.search);
    // query.append("type", "true");

    // window.location.search = 'type='+$(".fleet #type").val( type );

     var booking_id = $(this).data('booking-id');

     $(".fleet #bookingId").val( booking_id );

     var user_id = $(this).data('user-id');
     $(".fleet #userId").val( user_id );

     var customer_id = $(this).data('customer-id');
     $(".fleet #customerId").val( customer_id );

     var vehicle_id = $(this).data('vehicle-id');
     $(".fleet #vehicleId").val( vehicle_id );

     var type = $(this).data('vehicle-type');
     $(".fleet #type").val( type );

     $(".fleet #mileage").val($(this).data('base-mileage'));
     $(".fleet #total").val($(this).data('base-fare'));

     $(".fleet #base_km_1").val($(this).data('base_km_1'));
     $(".fleet #base_fare_1").val($(this).data('base_fare_1'));
     $(".fleet #wait_time_1").val($(this).data('wait_time_1'));
     $(".fleet #std_fare_1").val($(this).data('std_fare_1'));
     $(".fleet #base_km_2").val($(this).data('base_km_2'));
     $(".fleet #base_fare_2").val($(this).data('base_fare_2'));
     $(".fleet #wait_time_2").val($(this).data('wait_time_2'));
     $(".fleet #std_fare_2").val($(this).data('std_fare_2'));
     $(".fleet #base_km_3").val($(this).data('base_km_3'));
     $(".fleet #base_fare_3").val($(this).data('base_fare_3'));
     $(".fleet #base_fare_4").val($(this).data('base_fare_4'));
     $(".fleet #base_fare_5").val($(this).data('base_fare_5'));
     $(".fleet #wait_time_3").val($(this).data('wait_time_3'));
     $(".fleet #std_fare_3").val($(this).data('std_fare_3'));

    var total = $("#total").val();

    var i;
    var tax_size = '<?php echo e($no_of_tax); ?>';
    var total_tax_val = 0;
    for (i = 0; i < tax_size; i++) {
      total_tax_val = Number(total_tax_val) + Number($('.tax_'+i).val());
      // console.log($('.tax_'+i).val());
    }
    // console.log(total_tax_val);
    $('#total_tax_charge').val(total_tax_val);
    $('#total_tax_charge_rs').val((Number(total)*Number(total_tax_val))/100);
    $('#tax_total').val(Number(total) + (Number(total)*Number(total_tax_val))/100);

  });

  $("#del_btn").on("click",function(){
    var id=$(this).data("submit");
    $("#book_"+id).submit();
  });

  $('#myModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#del_btn").attr("data-submit",id);
  });

  $('#journeyModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#journey_btn").attr("href","<?php echo e(url('admin/bookings/complete/')); ?>/"+id);
  });

    $('#cancelBooking').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#cancel_id").val(id);
  });
</script>

<!-- testing total-->
<script type="text/javascript" language="javascript">
// $(".sum").change(function(){
//   // alert($("#base_km_1").val());
//   // alert($('.vtype').data('base_km_1'));
//   // console.log($("#type").val());
//
//     var day = $("#day").find(":selected").val();
//     if(day == 1){
//       var base_km = $("#base_km_1").val();
//       var base_fare = $("#base_fare_1").val();
//       var wait_time = $("#wait_time_1").val();
//       var std_fare = $("#std_fare_1").val();
//         if(parseInt($("#mileage").val()) <= parseInt(base_km)){
//           var total ;
//         }
//         else{
//           var sum = parseInt($("#mileage").val() - base_km) * parseInt(std_fare);
//       var total = parseInt(base_fare) + parseInt(sum) + (parseInt($("#waiting_time").val()) * parseInt(wait_time));
//       }
//     }
//
//     if(day == 2){
//       var base_km = $("#base_km_2").val();
//       var base_fare = $("#base_fare_2").val();
//       var wait_time = $("#wait_time_2").val();
//       var std_fare = $("#std_fare_2").val();
//         if(parseInt($("#mileage").val()) <= parseInt(base_km)){
//           var total = parseInt(base_fare) + (parseInt($("#waiting_time").val()) * parseInt(wait_time));
//         }
//         else{
//           var sum = parseInt($("#mileage").val() - base_km) * parseInt(std_fare);
//       var total = parseInt(base_fare) + parseInt(sum) + (parseInt($("#waiting_time").val()) * parseInt(wait_time));
//       }
//     }
//
//     if(day == 3){
//       var base_km = $("#base_km_3").val();
//       var base_fare = $("#base_fare_3").val();
//       var wait_time =$("#wait_time_3").val();
//       var std_fare = $("#std_fare_3").val();
//         if(parseInt($("#mileage").val()) <= parseInt(base_km)){
//           var total = parseInt(base_fare) + (parseInt($("#waiting_time").val()) * parseInt(wait_time));
//         }
//         else{
//           var sum = parseInt($("#mileage").val() - base_km) * parseInt(std_fare);
//       var total = parseInt(base_fare) + parseInt(sum) + (parseInt($("#waiting_time").val()) * parseInt(wait_time));
//       }
//     }
//     $("#total").val(total);
//     var i;
//     var tax_size = '<?php echo e($no_of_tax); ?>';
//     var total_tax_val = 0;
//     for (i = 0; i < tax_size; i++) {
//       total_tax_val = Number(total_tax_val) + Number($('.tax_'+i).val());
//       // console.log($('.tax_'+i).val());
//     }
//     // console.log(total_tax_val);
//     $('#total_tax_charge').val(total_tax_val);
//     $('#total_tax_charge_rs').val((Number(total)*Number(total_tax_val))/100);
//     $('#tax_total').val(Number(total) + (Number(total)*Number(total_tax_val))/100);
// });

  $("#total").change(function(){
    var total = $("#total").val();
    var waiting_time = $("#waiting_time").val();
    var i;
    var tax_size = '<?php echo e($no_of_tax); ?>';
    var total_tax_val = 0;
    for (i = 0; i < tax_size; i++) {
      total_tax_val = Number(total_tax_val) + Number($('.tax_'+i).val());
      // console.log($('.tax_'+i).val());
    }
    // console.log(total_tax_val);
    $('#total_tax_charge_rs').val((Number(total)*Number(total_tax_val))/100);
    $('#tax_total').val((Number(total)*Number(waiting_time))/100);

  });
  $("#waiting_time").change(function(){
    var total = $("#total").val();
    var waiting_time = $("#waiting_time").val();
    var i;
    var tax_size = '<?php echo e($no_of_tax); ?>';
    var total_tax_val = 0;
    for (i = 0; i < tax_size; i++) {
      total_tax_val = Number(total_tax_val) + Number($('.tax_'+i).val());
      // console.log($('.tax_'+i).val());
    }
    // console.log(total_tax_val);
    $('#total_tax_charge_rs').val((Number(total)*Number(total_tax_val))/100);
    $('#tax_total').val((Number(total)*Number(waiting_time))/100);

  });

  $('input[type="checkbox"]').on('click',function(){
    $('#bulk_delete').removeAttr('disabled');
  });

  $('#bulk_delete').on('click',function(){
    // console.log($( "input[name='ids[]']:checked" ).length);
    if($( "input[name='ids[]']:checked" ).length == 0){
      $('#bulk_delete').prop('type','button');
        new PNotify({
            title: 'Failed!',
            text: "<?php echo app('translator')->getFromJson('fleet.delete_error'); ?>",
            type: 'error'
          });
        $('#bulk_delete').attr('disabled',true);
    }
    if($("input[name='ids[]']:checked").length > 0){
      // var favorite = [];
      $.each($("input[name='ids[]']:checked"), function(){
          // favorite.push($(this).val());
          $("#bulk_hidden").append('<input type=hidden name=ids[] value='+$(this).val()+'>');
      });
      // console.log(favorite);
    }
  });
  $("input[name=total_fare]").change(function(){
      var total_charge = $("#total_charge").val();
      var total_fare = $("#total_fare").val();
      var total_income=(total_fare*total_charge)/100;
      $("#amount").val(total_income).change();
});
  $("input[name=total_charge]").change(function(){
      var total_charge = $("#total_charge").val();
      var total_fare = $("#total_fare").val();
      var total_income=(total_fare*total_charge)/100;
      $("#amount").val(total_income).change();
});

  $('#chk_all').on('click',function(){
    if(this.checked){
      $('.checkbox').each(function(){
        $('.checkbox').prop("checked",true);
      });
    }else{
      $('.checkbox').each(function(){
        $('.checkbox').prop("checked",false);
      });
    }
  });

  // Checkbox checked
  function checkcheckbox(){
    // Total checkboxes
    var length = $('.checkbox').length;
    // Total checked checkboxes
    var totalchecked = 0;
    $('.checkbox').each(function(){
        if($(this).is(':checked')){
            totalchecked+=1;
        }
    });
    // console.log(length+" "+totalchecked);
    // Checked unchecked checkbox
    if(totalchecked == length){
        $("#chk_all").prop('checked', true);
    }else{
        $('#chk_all').prop('checked', false);
    }
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/bookings/index.blade.php ENDPATH**/ ?>