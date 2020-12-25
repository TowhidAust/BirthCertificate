<?php $__env->startSection('content'); ?>
<?php ($modules=unserialize(Auth::user()->getMeta('module'))); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.dashboard'); ?></h3>
      </div>

      <div class="card-body">
        <div class="row">
          <?php if(Auth::user()->user_type == "S"): ?>
          <div class="col-lg-3 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Admin User</span>
                <span class="info-box-number"><?php echo e($users); ?></span>
              </div>
            </div>
          </div>


          <div class="col-lg-3 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-id-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Officer</span>
                <span class="info-box-number"><?php echo e($Officer); ?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-id-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Accountant</span>
                <span class="info-box-number"><?php echo e($accountant); ?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-id-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Operator</span>
                <span class="info-box-number"><?php echo e($operator); ?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-id-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Councillor</span>
                <span class="info-box-number"><?php echo e($councillor); ?></span>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if(in_array(1,$modules)): ?>
          <div class="col-lg-4 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-taxi"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Operator</span>
                <span class="info-box-number">54</span>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if(in_array(3,$modules)): ?>
          <div class="col-lg-4 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Application</span>
                <span class="info-box-number">122</span>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if(in_array(2,$modules)): ?>
          <div class="col-lg-4 col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-money"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Application Fee</span>
                <span class="info-box-number"><small><?php echo e(Hyvikk::get("currency")); ?></small> 50000</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4  col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-credit-card"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><?php echo app('translator')->getFromJson('fleet.expense'); ?></span>
                <span class="info-box-number"><small><?php echo e(Hyvikk::get("currency")); ?></small> <?php echo e($expense); ?></span>
              </div>
            </div>
          </div>
          <?php endif; ?>


          <?php if(Hyvikk::api('api') && Hyvikk::api('driver_review') == 1 && in_array(10,$modules)): ?>
          <div class="col-lg-4  col-xs-6">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-star"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><?php echo app('translator')->getFromJson('fleet.reviews'); ?></span>
                <span class="info-box-number"><?php echo e($reviews); ?></span>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection("script2"); ?>
<script src="<?php echo e(asset('assets/js/cdn/Chart.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/cdn/canvasjs.min.js')); ?>"></script>
<script>
window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(201, 203, 207)',
  black: 'rgb(0,0,0)'
};

function random_color(i){
  var color1,color2,color3;
  var col_arr=[];
  for(x=0;x<=i;x++){

  var c1 = [176,255,84,220,134,66,238];
  var c2 = [254,61,147,114,51,26,137];
  var c3 = [27,111,153,93,157,216,187,44,243];
  color1 = c1[Math.floor(Math.random()*c1.length)];
  color2 = c2[Math.floor(Math.random()*c2.length)];
  color3 = c3[Math.floor(Math.random()*c3.length)];

  col_arr.push("rgba("+color1+","+color2+","+color3+",0.5)");
  }
  return col_arr;
}

        var chartData = {
            labels: ["<?php echo app('translator')->getFromJson('fleet.income'); ?>", "<?php echo app('translator')->getFromJson('fleet.expense'); ?>"],

            datasets: [{
                type: 'pie',
                label: '',
               backgroundColor: ['#21bc6c','#ff5462'],
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [<?php echo e($income); ?>,<?php echo e($expense); ?>]
            }]
        };

        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var config = {
            type: 'line',
            data: {
                labels: MONTHS,
                datasets: [{
                    label: "<?php echo app('translator')->getFromJson('fleet.expense'); ?>",
                    backgroundColor: '#ff5462',
                    borderColor: '#ff5462',
                    data: [<?php echo e($yearly_expense); ?>],
                    fill: false,
                }, {
                    label: "<?php echo app('translator')->getFromJson('fleet.income'); ?>",
                    fill: false,
                    backgroundColor: '#21bc6c',
                    borderColor: '#21bc6c',
                    data: [<?php echo e($yearly_income); ?>],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "<?php echo app('translator')->getFromJson('fleet.month'); ?>"
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "<?php echo app('translator')->getFromJson('fleet.amount'); ?>"
                        }
                    }]
                }
            }
        };

        var datewise_config = {
            type: 'line',
            data: {
                labels: [
                      <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        CanvasJS.formatDate( new Date("<?php echo e(date('Y-m-d H:i:s',strtotime($k))); ?>"), "DD/MM/YY"),
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
                datasets: [{
                    label: "<?php echo app('translator')->getFromJson('fleet.expense'); ?>",
                    backgroundColor: '#ff5462',
                    borderColor: '#ff5462',
                    data: [<?php echo e($expenses1); ?>],
                    fill: false,
                }, {
                    label: "<?php echo app('translator')->getFromJson('fleet.income'); ?>",
                    fill: false,
                    backgroundColor: '#21bc6c',
                    borderColor: '#21bc6c',
                    data: [<?php echo e($incomes); ?>],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "<?php echo app('translator')->getFromJson('fleet.date'); ?>"
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "<?php echo app('translator')->getFromJson('fleet.amount'); ?>"
                        }
                    }]
                }
            }
        };

        window.onload = function() {
          var ctx = document.getElementById("yearly").getContext("2d");
            window.myLine = new Chart(ctx, config);
            var ctx = document.getElementById("canvas").getContext("2d");
            var datewise = document.getElementById("datewise").getContext("2d");
            window.myLine = new Chart(datewise, datewise_config);
            window.myMixedChart = new Chart(ctx, {
                type: 'pie',
                data: chartData,
                options: {
                  legend:{display:false},
                    responsive: true,

                    tooltips: {
                        mode: 'index',
                        intersect: false
                    }
                }
            });

            var ctx = document.getElementById("canvas2").getContext("2d");
            window.myMixedChart = new Chart(ctx, {
                type: 'pie',
                data: chartData3,
                options: {

                    responsive: true,
                    title: {
                        display: false,
                        text: "<?php echo app('translator')->getFromJson('fleet.chart'); ?>"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    }
                }
            });
        };



            var chartData3 = {
            labels: [<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> "<?php echo e($vehicle_name[$exp->vehicle_id]); ?>", <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
            datasets: [{
                type: 'pie',
                label: '',
                backgroundColor: random_color(<?php echo e(count($expenses)); ?>),
                borderColor: window.chartColors.black,
                borderWidth: 1,
                data: [<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($exp->expense); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }]
        };

    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
  $("#year").on("change",function(){
    var year = this.value;
    // alert(status);
    window.location = "<?php echo e(url('admin/')); ?>" + "?year=" + year; // redirect
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/home.blade.php ENDPATH**/ ?>