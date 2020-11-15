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
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.manage_income'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.addRecord'); ?></h3>
      </div>
      <div class="card-body">
        <?php ($tax_percent=0); ?>
        <?php if(Hyvikk::get('tax_charge') != "null"): ?>
          <?php ($taxes = json_decode(Hyvikk::get('tax_charge'), true)); ?>
          <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php ($tax_percent += $val ); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php echo Form::open(['route' => 'district.store','method'=>'post','class'=>'row','files'=>true]); ?>

          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('', __('Division'), ['class' => 'col-xs-12 control-label']); ?>

              <div class="col-md-12">
                <select id="division" name="division" class="form-control vehicles dynamic" data-dependent="district" required style="width: 100%">
                  <option value="">Select Division</option>
                  <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($type->state_id); ?>"><?php echo e($type->state_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('tax_charge_rs', __('')." ". __('District'), ['class' => 'col-xs-5 control-label']); ?>

              <div class="col-xs-6">
                <div class="input-group">
                  <input required="required" name="district_name" type="text" id="tax_charge_rs" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4" style=" margin-top: 29px;">
            <?php echo Form::submit(__('fleet.submit'), ['class' => 'btn btn-success']); ?>

          </div>
          <?php echo Form::close(); ?>

          <?php echo e(csrf_field()); ?>


      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4">
              <h3 class="card-title">
              <strong>   District  </strong>
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive" id="income">
        <table class="table" id="data_table">
          <thead class="thead-inverse">
            <tr>
              <th>
                <?php if($today->count() > 0): ?>
                  <input type="checkbox" id="chk_all">
                <?php endif; ?>
              </th>
              <th>Division Name</th>
              <th>District Name</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <input type="checkbox" name="ids[]" value="<?php echo e($row->city_id); ?>" class="checkbox" id="chk<?php echo e($row->city_id); ?>" onclick='checkcheckbox();'>
              </td>
              <td>
              <?php if($row->city_name != null): ?>
              <?php echo e($row->state_name); ?>

              <?php endif; ?>
              </td>
              <td>
              <?php if($row->city_name != null): ?>
              <?php echo e($row->city_name); ?>

              <?php endif; ?>
              </td>
              <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-gear"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu custom" role="menu">
                    <?php echo Form::open(['route' => 'district_edit','method'=>'post','files'=>true]); ?>

                          <?php echo Form::hidden("id",$row->city_id); ?>

                        <button type="submit" class="dropdown-item" name="button"><span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> <?php echo app('translator')->getFromJson('fleet.edit'); ?></button>
                    <?php echo Form::close(); ?>

                    <?php echo Form::open(['route' => 'district.delete','method'=>'post','files'=>true]); ?>

                          <?php echo Form::hidden("id",$row->city_id); ?>

                        <button type="submit" class="dropdown-item" name="button"><span aria-hidden="true" class="fa fa-trash" style="color: #dd4b39"></span> Delete</button>
                    <?php echo Form::close(); ?>

                    </div>
                    </div>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="bulkModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.delete'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo Form::open(['url'=>'admin/delete-income','method'=>'POST','id'=>'form_delete']); ?>

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
<!-- Modal -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('fleet.delete'); ?></h4>
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
<!-- Modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
  $('#revenue').on('change',function(){
    var amount = $('#revenue').val();
    var tax_percent = "<?php echo e($tax_percent); ?>";
    var tax_charges = (Number('<?php echo e($tax_percent); ?>') * Number(amount))/100;
  $('#tax_charge_rs').val(tax_charges);
  $('#tax_total').val(Number(amount) + Number(tax_charges));
    // console.log(tax_percent);
  });
$(document).ready(function() {
  $('#vehicle_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectVehicle'); ?>"});
  $('#income_type').select2({placeholder: "Select Division"});

  $('#division').select2({placeholder: "Select Division"});
  $("#vehicle_id").on("change",function(){
    $("#mileage").val($(this).find(':selected').data("mileage"));
    $("#mileage").attr("min",$(this).find(':selected').data("mileage"));
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

  $("#del_btn").on("click",function(){
    var id=$(this).data("submit");
    $("#form_"+id).submit();
  });

  $('#myModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#del_btn").attr("data-submit",id);
  });

$(document).on("click",".delete",function(e){
  var hvk=confirm("Are you sure?");
  if(hvk==true){
    var id=$(this).data("id");
    var action="<?php echo e(url('admin/income')); ?>"+"/" +id;

      $.ajax({
        type: "POST",
        url: action,
        data: "_method=DELETE&_token="+window.Laravel.csrfToken+"&id="+id,
        success: function(data){
          // alert(data);
          $("#income").empty();
          $("#income").html(data);

          new PNotify({
              title: 'Deleted!',
              text: '<?php echo app('translator')->getFromJson("fleet.deleted"); ?>',
              type: 'wanring'
          })
        }
      ,
      dataType: "HTML"
    });
  }
});

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\car\framework\resources\views/location/district.blade.php ENDPATH**/ ?>