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
<?php ($tax_percent=0); ?>
<?php if(Hyvikk::get('tax_charge') != "null"): ?>
  <?php ($taxes = json_decode(Hyvikk::get('tax_charge'), true)); ?>
  <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php ($tax_percent += $val ); ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php echo Form::open(['route' => 'intercity.fare.update','method'=>'post','class'=>'row','files'=>true]); ?>

  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Update Record</h3>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('', __('Division'), ['class' => 'col-xs-12 control-label']); ?>

              <div class="col-md-12">
                <select id="division" name="division" class="form-control vehicles dynamic" data-dependent="district"  style="width: 100%">
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
              <?php echo Form::label('', __('District'), ['class' => 'col-xs-12 control-label']); ?>

              <div class="col-md-12">
                <select id="district" name="district" class="form-control vehicles dynamic_district" data-dependent="thana"  style="width: 100%">
                  <option value="">Select District</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('', __('Thana'), ['class' => 'col-xs-12 control-label']); ?>

              <div class="col-md-12">
                <select id="thana" name="from_thana" class="form-control vehicles dynamic" required style="width: 100%">
                  <option value="<?php echo e($edit_fare->thana_id); ?>"><?php echo e($edit_fare->upozila_name); ?></option>
                </select>
              </div>
            </div>
          </div>
          <?php echo e(csrf_field()); ?>

         </div>
         <div class="row">
           <div class="col-md-4">
           </div>
           <div class="col-md-4" style="text-align:center;">
            <img style="margin-top:12px;" src="<?php echo e(asset('img/arrr.png')); ?>" alt="">
           </div>
           <div class="col-md-4">
           </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('', __('Division'), ['class' => 'col-xs-12 control-label']); ?>

                <div class="col-md-12">
                  <select id="divisionto" name="divisionto" class="form-control vehicles dynamicto" data-dependentt="districtto"  style="width: 100%">
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
                <?php echo Form::label('', __('District'), ['class' => 'col-xs-12 control-label']); ?>

                <div class="col-md-12">
                  <select id="districtto" name="districtto" class="form-control vehicles dynamicto_district" data-dependent="thanato"  style="width: 100%">
                    <option value="">Select District</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('', __('Thana'), ['class' => 'col-xs-12 control-label']); ?>

                <div class="col-md-12">
                  <select id="thanato" name="to_thana" class="form-control vehicles dynamic" required style="width: 100%">
                      <option value="<?php echo e($edit_fare_to_info->thana_id); ?>"><?php echo e($edit_fare_to_info->upozila_name); ?></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('', __('Vehicale Type'), ['class' => 'col-xs-12 control-label']); ?>

                <div class="col-md-12">
                  <select id="vtype" name="vehicle_type" class="form-control vehicles" required style="width: 100%">
                    <option value="<?php echo e($edit_fare->type_id); ?>"><?php echo e($edit_fare->displayname); ?></option>
                    <?php $__currentLoopData = $vehicle_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($vah->id); ?>"><?php echo e($vah->displayname); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('', __('Amount'), ['class' => 'col-xs-12 control-label']); ?>

                <div class="col-md-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">TK</span></div>
                    <input required="required" name="fare" type="text"  class="form-control" min="0" value="<?php echo e($edit_fare->fare); ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('', __('Return Extra Amount'), ['class' => 'col-xs-12 control-label']); ?>

                <div class="col-md-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">TK</span></div>
                      <input type="hidden" name="id" value="<?php echo e($edit_fare->intercity_fare_id); ?>" required>
                    <input required="required" name="return_extra_fare" type="text"  class="form-control" min="0" value="<?php echo e($edit_fare->return_extra_fare); ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4" style=" margin-top: 29px;">
              <button type="submit" class="btn btn-success">Update Fare</button>
            </div>
           </div>
         </div>

      </div>
    </div>
    <?php echo Form::close(); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4">
              <h3 class="card-title">
              <strong>   Intercity Fare  </strong>
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
              <th>From</th>
              <th>To</th>
              <th>Vehicale Type </th>
              <th>Trip Fare </th>
              <th>Return Extra Fare </th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>

            <?php $__currentLoopData = $fare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td> <input type="checkbox" id="chk_all"></td>
              <td><?php echo e($row->district_name); ?> , <?php echo e($row->upozila_name); ?></td>
              <td><?php
                $to= DB::table('thana')
                            ->join('district', 'thana.city_id', '=', 'district.city_id')
                            ->select('upozila_name','district.city_name as district_name')
                            ->where('id',$row->to_thana_id)
                            ->get() ;
                  foreach ($to as  $value) {
                    echo $value->district_name.' , '.$value->upozila_name;
                }
               ?></td>
               <td><?php echo e($row->displayname); ?></td>
              <td><?php echo e(number_format($row->fare, 2)); ?></td>
              <td><?php echo e(number_format($row->return_extra_fare, 2)); ?></td>
              <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-gear"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu custom" role="menu">
                    <?php echo Form::open(['route' => 'fare.edit','method'=>'post','files'=>true]); ?>

                          <?php echo Form::hidden("id",$row->intercity_fare_id); ?>

                        <button type="submit" class="dropdown-item" name="button"><span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> <?php echo app('translator')->getFromJson('fleet.edit'); ?></button>
                    <?php echo Form::close(); ?>

                    <?php echo Form::open(['route' => 'intercity.fare.delete','method'=>'post','files'=>true]); ?>

                          <?php echo Form::hidden("id",$row->intercity_fare_id); ?>

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

$(document).ready(function() {
  $('.dynamic').change(function(){
       if($(this).val() != '')
       {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"<?php echo e(route('dynamicdependent.fetch')); ?>",
         method:"POST",
         data:{select:select, value:value, _token:_token, dependent:dependent},
         success:function(result)
         {
          $('#'+dependent).html(result);
         }

        })
       }
      });
  $('.dynamic_district').change(function(){
       if($(this).val() != '')
       {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"<?php echo e(route('dynamicdescrict.fetch')); ?>",
         method:"POST",
         data:{select:select, value:value, _token:_token, dependent:dependent},
         success:function(result)
         {
          $('#'+dependent).html(result);
         }

        })
       }
      });
  $('.dynamicto_district').change(function(){
       if($(this).val() != '')
       {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"<?php echo e(route('dynamicTodescrict.fetch')); ?>",
         method:"POST",
         data:{select:select, value:value, _token:_token, dependent:dependent},
         success:function(result)
         {
          $('#'+dependent).html(result);
         }

        })
       }
      });

      $('.dynamicto').change(function(){
           if($(this).val() != '')
           {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependentt = $(this).data('dependentt');
            var _token = $('input[name="_token"]').val();
            $.ajax({
             url:"<?php echo e(route('dynamictodependent.fetch')); ?>",
             method:"POST",
             data:{select:select, value:value, _token:_token, dependentt:dependentt},
             success:function(result)
             {
              $('#'+dependentt).html(result);
             }

            })
           }
          });
  $('#district').select2({placeholder: "Select District"});
  $('#division').select2({placeholder: "Select Division"});
  $('#districtto').select2({placeholder: "Select District"});
  $('#divisionto').select2({placeholder: "Select Division"});

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/fare/edit_intercity.blade.php ENDPATH**/ ?>