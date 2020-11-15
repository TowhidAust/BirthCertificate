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

<?php echo Form::open(['route' => 'color.store','method'=>'post','class'=>'row','files'=>true]); ?>

  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.addRecord'); ?></h3>
      </div>

      <div class="card-body">
         <?php echo e(csrf_field()); ?>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('', __('Color Name'), ['class' => 'col-xs-12 control-label']); ?>

                <div class="col-md-12">
                  <div class="input-group">
                    <div class="input-group-prepend"></div>
                    <input required="required" name="name" type="text"  class="form-control" min="0">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="col-md-12">
                  <div class="input-group">
                    <?php echo Form::label('', __('Select Status'), ['class' => 'col-xs-12 control-label']); ?>

                    <div class="col-md-12">
                      <select id="thana" name="status" class="form-control vehicles dynamic" required style="width: 100%">
                        <option value="0">Select Status</option>
                        <option value="1">Active</option>
                        <option value="2">Deactive</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4" style=" margin-top: 29px;">
              <button type="submit" class="btn btn-success">Add Color</button>
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
              <strong>    Car Color  </strong>
              </h3>
            </div>
            <div class="col-md-6">
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive" id="income">
        <table class="table" id="data_table">
          <thead class="thead-inverse">
            <tr>
              <th>
                S/L
              </th>
              <th>Color Name</th>
              <th>Status</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>

            <?php $__currentLoopData = $fare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td> <input type="checkbox" id="chk_all"></td>
              <td><?php echo e($row->name); ?></td>
              <td>
                <?php if($row->status=='1'): ?>
                <?php echo e('Active'); ?>

                <?php else: ?>
                <?php echo e('Deactive'); ?>

                <?php endif; ?>
              </td>
              <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-gear"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu custom" role="menu">
                    <?php echo Form::open(['route' => 'color.update','method'=>'post','files'=>true]); ?>

                          <?php echo Form::hidden("id",$row->id); ?>

                          <?php if($row->status=='1'): ?>
                          <?php echo Form::hidden("status",'0'); ?>

                            <button type="submit" class="dropdown-item" name="button"><span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> <?php echo app('translator')->getFromJson('Deactive'); ?></button>
                            <?php else: ?>
                            <?php echo Form::hidden("status",'1'); ?>

                            <button type="submit" class="dropdown-item" name="button"><span aria-hidden="true" class="fa fa-edit" style="color: #dd4b39"></span> Active</button>
                            <?php endif; ?>

                    <?php echo Form::close(); ?>

                    <?php echo Form::open(['route' => 'fare.commission.delete','method'=>'post','files'=>true]); ?>

                          <?php echo Form::hidden("id",$row->id); ?>

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
<!-- Modal -->
<!-- Modal -->
<!-- Modal -->

<!-- Modal -->
<!-- Modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>

<script type="text/javascript">
function myFunction() {
  confirm("Do you want to delete all?");
}
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
  $('#thana').select2({placeholder: "Select Thana"});
  $('#district').select2({placeholder: "Select District"});
  $('#division').select2({placeholder: "Select Division"});
  $('#thanato').select2({placeholder: "Select Thana"});
  $('#districtto').select2({placeholder: "Select District"});
  $('#divisionto').select2({placeholder: "Select Division"});
  $('#vtype').select2({placeholder: "Select Vehicale Type"});

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/color/index.blade.php ENDPATH**/ ?>