<!DOCTYPE html>
<?php if(Auth::user()->getMeta('language')!= null): ?>
  <?php ($language = Auth::user()->getMeta('language')); ?>
<?php else: ?>
  <?php ($language = Hyvikk::get("language")); ?>
<?php endif; ?>


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo e(Hyvikk::get('app_name')); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/ionicons.min.css')); ?>">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fullcalendar/fullcalendar.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fullcalendar/fullcalendar.print.css')); ?>" media="print">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/cdn/buttons.dataTables.min.css')); ?>">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/dist/adminlte.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/flat/blue.css')); ?>">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/morris/morris.css')); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo e(asset('assets/css/fonts/fonts.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/pnotify.custom.min.css')); ?>" media="all" rel="stylesheet" type="text/css" />
  <?php echo $__env->yieldContent("extra_css"); ?>
  <script>
  window.Laravel = <?php echo json_encode([
  'csrfToken' => csrf_token(),
  'subscription_url' => asset('assets/push_notification/push_subscription.php'),
  'serviceWorkerUrl' => asset("serviceWorker.js")
  ]); ?>;
  </script>
  <!-- browser notification -->
  <script type="text/javascript" src="<?php echo e(asset('assets/push_notification/app.js')); ?>"></script>
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <style type="text/css">
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        font-size: 0.6em;
        height: 35px !important;
    }
  </style>
  <?php if($language == "Arabic-ar"): ?>
    <style type="text/css">
      .sidebar{
        text-align: right;
      }
      .nav-sidebar .nav-link>p>.right {
        position: absolute;
        right: 0rem;
        top: 12px;
      }
      .nav-sidebar>.nav-item {
        margin-right: -20px;
      }
    </style>
  <?php endif; ?>
</head>

<body class="hold-transition sidebar-mini" <?php if($language == "Arabic-ar"): ?> dir="rtl" <?php endif; ?>>
  <?php echo Form::hidden('loggedinuser',Auth::user()->id,['id'=>'loggedinuser']); ?>

  <?php echo Form::hidden('user_type',Auth::user()->user_type,['id'=>'user_type']); ?>

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
          <?php if(Auth::user()->user_type=="S"): ?>
            <?php ($r = 0); ?>
            <?php ($i = 0); ?>
            <?php ($l = 0); ?>
            <?php ($d = 0); ?>
            <?php ($s = 0); ?>
            <?php ($user= Auth::user()); ?>
            <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($notification->type == "App\Notifications\RenewRegistration"): ?>
              <?php ($r++); ?>
              <?php elseif($notification->type == "App\Notifications\RenewInsurance"): ?>
              <?php ($i++); ?>
              <?php elseif($notification->type == "App\Notifications\RenewVehicleLicence"): ?>
              <?php ($l++); ?>
              <?php elseif($notification->type == "App\Notifications\RenewDriverLicence"): ?>
              <?php ($d++); ?>
              <?php elseif($notification->type == "App\Notifications\ServiceReminderNotification"): ?>
              <?php ($s++); ?>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php ($n = $r + $i +$l + $d + $s); ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge"><?php if($n>0): ?> <?php echo e($n); ?> <?php endif; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if($n>0): ?><span class="dropdown-item dropdown-header"> <?php echo e($n); ?> Notifications </span>
          <div class="dropdown-divider"></div><?php endif; ?>
          <a style="margin-left: 23px;" href="<?php echo e(url('admin/vehicle_notification',['type'=>'renew-registrations'])); ?>" class="dropdown-item">
            <i class="fa fa-id-card-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_registration'); ?>
            <span class="float-right text-muted text-sm"><?php if($r>0): ?> <?php echo e($r); ?> <?php endif; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="<?php echo e(url('admin/vehicle_notification',['type'=>'renew-insurance'])); ?>" class="dropdown-item">
            <i class="fa fa-file-text mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_insurance'); ?>
            <span class="float-right text-muted text-sm"><?php if($i>0): ?> <?php echo e($i); ?> <?php endif; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="<?php echo e(url('admin/vehicle_notification',['type'=>'renew-licence'])); ?>" class="dropdown-item">
            <i class="fa fa-file-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_licence'); ?>
            <span class="float-right text-muted text-sm"><?php if($l>0): ?> <?php echo e($l); ?> <?php endif; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="<?php echo e(url('admin/driver_notification',['type'=>'renew-driving-licence'])); ?>" class="dropdown-item">
            <i class="fa fa-file-text-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.renew_driving_licence'); ?>
            <span class="float-right text-muted text-sm"><?php if($d>0): ?> <?php echo e($d); ?> <?php endif; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="<?php echo e(url('admin/reminder',['type'=>'service-reminder'])); ?>" class="dropdown-item">
            <i class="fa fa-clock-o mr-2"></i> <?php echo app('translator')->getFromJson('fleet.serviceReminders'); ?>
            <span class="float-right text-muted text-sm"><?php if($s>0): ?> <?php echo e($s); ?> <?php endif; ?></span>
          </a>
        </div>
      </li>
      <?php endif; ?>
    <!-- logout -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-circle"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <?php if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null): ?>
              <?php if(starts_with(Auth::user()->getMeta('driver_image'),'http')): ?>
                <?php ($src = Auth::user()->getMeta('driver_image')); ?>
                <?php else: ?>
                <?php ($src=asset('uploads/'.Auth::user()->getMeta('driver_image'))); ?>
                <?php endif; ?>
                <img src="<?php echo e($src); ?>" class="img-size-50 mr-3 img-circle" alt="User Image">
                <?php elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O'): ?>
                  <?php if(Auth::user()->getMeta('profile_image') == null): ?>
                  <img src="<?php echo e(asset("assets/images/no-user.jpg")); ?>" class="img-size-50 mr-3 img-circle" alt="User Image">
                  <?php else: ?>
                  <img src="<?php echo e(asset('uploads/'.Auth::user()->getMeta('profile_image'))); ?>" class="img-size-50 mr-3 img-circle" alt="User Image">
                  <?php endif; ?>
                <?php elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null): ?>
                <?php if(starts_with(Auth::user()->getMeta('profile_pic'),'http')): ?>
                <?php ($src = Auth::user()->getMeta('profile_pic')); ?>
                <?php else: ?>
                <?php ($src=asset('uploads/'.Auth::user()->getMeta('profile_pic'))); ?>
                <?php endif; ?>
                <img src="<?php echo e($src); ?>" class="img-size-50 mr-3 img-circle" alt="User Image">
                <?php else: ?>
                <img src="<?php echo e(asset("assets/images/no-user.jpg")); ?>" class="img-size-50 mr-3 img-circle" alt="User Image">
                <?php endif; ?>

              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo e(Auth::user()->name); ?>


                  <span class="float-right text-sm text-danger">

                  </span>
                </h3>
                <p class="text-sm text-muted"><?php echo e(Auth::user()->email); ?></p>
                <p class="text-sm text-muted"></p>

              </div>
            </div>
            <div>
            <div style="margin: 5px;">
              <a style="margin-left: 23px;" href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="btn btn-secondary btn-flat"><i class="fa fa-edit"></i> <?php echo app('translator')->getFromJson('fleet.editProfile'); ?></a>

              <a style="margin-left: 23px;" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-secondary btn-flat pull-right"> <i class="fa fa-sign-out"></i>
              <?php echo app('translator')->getFromJson('menu.logout'); ?>
              </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
            </div>
            <div class="clear"></div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
      
    <!-- logout -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a style="margin-left: 23px;" href="<?php echo e(url('admin/')); ?>" class="brand-link">
      <img src="<?php echo e(asset('assets/images/'. Hyvikk::get('icon_img') )); ?>" alt="Fleet Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo e(Hyvikk::get('app_name')); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <?php if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null): ?>
           <?php if(starts_with(Auth::user()->getMeta('driver_image'),'http')): ?>
            <?php ($src = Auth::user()->getMeta('driver_image')); ?>
            <?php else: ?>
            <?php ($src=asset('uploads/'.Auth::user()->getMeta('driver_image'))); ?>
            <?php endif; ?>
            <img src="<?php echo e($src); ?>" class="img-circle elevation-2" alt="User Image">
            <?php elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O'): ?>
              <?php if(Auth::user()->getMeta('profile_image') == null): ?>
              <img src="<?php echo e(asset("assets/images/no-user.jpg")); ?>" class="img-circle elevation-2" alt="User Image">
              <?php else: ?>
              <img src="<?php echo e(asset('uploads/'.Auth::user()->getMeta('profile_image'))); ?>" class="img-circle elevation-2" alt="User Image">
              <?php endif; ?>
            <?php elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null): ?>
            <?php if(starts_with(Auth::user()->getMeta('profile_pic'),'http')): ?>
            <?php ($src = Auth::user()->getMeta('profile_pic')); ?>
            <?php else: ?>
            <?php ($src=asset('uploads/'.Auth::user()->getMeta('profile_pic'))); ?>
            <?php endif; ?>
            <img src="<?php echo e($src); ?>" class="img-circle elevation-2" alt="User Image">
            <?php else: ?>
            <img src="<?php echo e(asset("assets/images/no-user.jpg")); ?>" class="img-circle elevation-2" alt="User Image">
            <?php endif; ?>

        </div>
        <div class="info">
          <a style="margin-left: 23px;" href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="d-block"><?php echo e(Auth::user()->name); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- customer -->
          <?php if(Auth::user()->user_type=="C"): ?>

            <?php if(Request::is('admin/bookings*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>
            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                applications
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('bookings.create')); ?>" class="nav-link <?php if(Request::is('admin/bookings/create')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                New Applications</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('/application')); ?>" class="nav-link <?php if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))): ?> active <?php endif; ?>">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Manage Applications</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="nav-link <?php if(Request::is('admin/change-details*')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.editProfile'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(url('admin/addresses')); ?>" class="nav-link <?php if(Request::is('admin/addresses*')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.addresses'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(url('admin/')); ?>" class="nav-link <?php if(Request::is('admin')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-money"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.expenses'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <?php endif; ?>
          <!-- customer -->
          <!-- user-type S or O -->
          <?php if(Auth::user()->user_type=="S" || Auth::user()->user_type=="O"): ?>
          <li class="nav-item">
            <a  href="<?php echo e(url('admin/')); ?>" class="nav-link <?php if(Request::is('admin')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                <?php echo app('translator')->getFromJson('menu.Dashboard'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <?php endif; ?>
          <!-- user-type S or O -->

          <!-- driver -->
          <?php if(Auth::user()->user_type=="D"): ?>

          <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(url('admin/')); ?>" class="nav-link <?php if(Request::is('admin/')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-user"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.myProfile'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(route('my_bookings')); ?>" class="nav-link <?php if(Request::is('admin/my_bookings')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                <?php echo app('translator')->getFromJson('menu.my_bookings'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(url('admin/change-details/'.Auth::user()->id)); ?>" class="nav-link <?php if(Request::is('admin/change-details*')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.editProfile'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
            <?php if(Request::is('admin/notes*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.notes'); ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('notes.index')); ?>" class="nav-link <?php if((Request::is('admin/notes*') && !(Request::is('admin/notes/create')))): ?> active <?php endif; ?>">
                  <i class="fa fa-flag nav-icon"></i>
                  <p> <?php echo app('translator')->getFromJson('fleet.manage_note'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route("notes.create")); ?>" class="nav-link <?php if(Request::is('admin/notes/create')): ?> active <?php endif; ?>">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.create_note'); ?></p>
                </a>
              </li>
            </ul>
          </li>
            <?php if(Request::is('admin/driver-reports*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                <?php echo app('translator')->getFromJson('menu.reports'); ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route("dreports.monthly")); ?>" class="nav-link <?php if(Request::is('admin/driver-reports/monthly')): ?> active <?php endif; ?>">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.monthlyReport'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route("dreports.yearly")); ?>" class="nav-link <?php if(Request::is('admin/driver-reports/yearly')): ?> active <?php endif; ?>">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.yearlyReport'); ?></p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <!-- driver -->

          <!-- sidebar menus for office-admin and super-admin -->
        <?php if(Auth::user()->user_type == "S" || Auth::user()->user_type == "O"): ?>
        <?php ($modules=unserialize(Auth::user()->getMeta('module'))); ?> <!--array of selected modules of logged in user-->
        <?php else: ?>
        <?php ($modules=array()); ?>
        <?php endif; ?>

        <?php if(!Auth::guest() &&  Auth::user()->user_type!="D" && Auth::user()->user_type != "C" ): ?>

            <?php if((Request::is('admin/drivers*')) || (Request::is('admin/users*')) || (Request::is('admin/customers*')) ): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(0,$modules) || Auth::user()->user_type == "S"): ?> <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                <?php echo app('translator')->getFromJson('menu.users'); ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if(in_array(0,$modules)): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('councillor')); ?>" class="nav-link <?php if(Request::is('admin/drivers*')): ?> active <?php endif; ?>">
                  <i class="fa fa-id-card nav-icon"></i>
                  <p>Word Councillor</p>
                </a>
              </li>
              <?php endif; ?>
              <?php if(Auth::user()->user_type=="S"): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('users.index')); ?>" class="nav-link <?php if(Request::is('admin/users*')): ?> active <?php endif; ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p> Officers</p>
                </a>
              </li>
              <?php if(in_array(0,$modules)): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('customers.index')); ?>" class="nav-link <?php if(Request::is('admin/customers*')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Operator</p>
                </a>
              </li>
              <?php endif; ?>
              <?php endif; ?>
            </ul>
          </li> <?php endif; ?>

            <?php if((Request::is('admin/driver-logs')) || (Request::is('admin/vehicle-types*')) || (Request::is('admin/vehicles*')) || (Request::is('admin/vehicle_group*')) || (Request::is('admin/vehicle-reviews*')) || (Request::is('admin/view-vehicle-review*')) || (Request::is('admin/vehicle-review*'))): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>



            <?php if((Request::is('admin/income')) || (Request::is('admin/expense')) || (Request::is('admin/transaction')) || (Request::is('admin/income_records')) || (Request::is('admin/expense_records')) ): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(2,$modules)): ?>
          <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-money"></i>
              <p>
                <?php echo app('translator')->getFromJson('menu.transactions'); ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('income.index')); ?>" class="nav-link <?php if((Request::is('admin/income'))|| (Request::is('admin/income_records'))): ?> active <?php endif; ?>">
                  <i class="fa fa-newspaper-o nav-icon"></i>
                  <p>Manage Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('expense.index')); ?>" class="nav-link <?php if((Request::is('admin/expense')) || (Request::is('admin/expense_records'))): ?> active <?php endif; ?>">
                  <i class="fa fa-newspaper-o nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.manage_expense'); ?></p>
                </a>
              </li>
            </ul>
          </li>
           <?php endif; ?>

            <?php if((Request::is('admin/bookings*'))  || (Request::is('admin/bookings_calendar')) || (Request::is('admin/booking-quotation*'))): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>

            <?php endif; ?>
            <?php if(Auth::user()->user_type=="O"||Auth::user()->user_type=="S"): ?>
          <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                Applications
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="#" class="nav-link <?php if(Request::is('admin/bookings/create')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                  New</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('today_application')); ?>" class="nav-link <?php if(Request::is('admin/today_application')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                  Today's</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('pending')); ?>" class="nav-link <?php if(Request::is('admin/pending')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                  Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('application')); ?>" class="nav-link <?php if((Request::is('admin/application*')) && !(Request::is('admin/application')) && !(Request::is('admin/application'))): ?> active <?php endif; ?>">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Manage Applications</p>
                </a>
              </li>
            </ul>
          </li> <?php endif; ?>
            <?php if(Auth::user()->user_type=="O"||Auth::user()->user_type=="S"): ?>
          <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                Corrections
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('bookings.create')); ?>" class="nav-link <?php if(Request::is('admin/bookings/create')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                  Today's </p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('application')); ?>" class="nav-link <?php if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))): ?> active <?php endif; ?>">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Pending </p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('application')); ?>" class="nav-link <?php if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))): ?> active <?php endif; ?>">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Manage Corrections</p>
                </a>
              </li>

            </ul>
          </li> <?php endif; ?>

            <?php if(Request::is('admin/reports*')): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <?php if(in_array(4,$modules)): ?> <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                <?php echo app('translator')->getFromJson('menu.reports'); ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if(in_array(2,$modules)): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/reports/income')); ?>" class="nav-link <?php if(Request::is('admin/reports/income')): ?> active <?php endif; ?>">
                  <i class="fa fa-credit-card nav-icon"></i>
                  <p> Fee <?php echo app('translator')->getFromJson('fleet.report'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/reports/expense')); ?>" class="nav-link <?php if(Request::is('admin/reports/expense')): ?> active <?php endif; ?>">
                  <i class="fa fa-money nav-icon"></i>
                  <p> <?php echo app('translator')->getFromJson('fleet.expense'); ?> <?php echo app('translator')->getFromJson('fleet.report'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('reports.delinquent')); ?>" class="nav-link <?php if(Request::is('admin/reports/delinquent')): ?> active <?php endif; ?>">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p> <?php echo app('translator')->getFromJson('menu.deliquentReport'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('reports.monthly')); ?>" class="nav-link <?php if(Request::is('admin/reports/monthly')): ?> active <?php endif; ?>">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.monthlyReport'); ?></p>
                </a>
              </li>
              <?php endif; ?>
              <?php if(in_array(3,$modules)): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('reports.application')); ?>" class="nav-link <?php if(Request::is('admin/reports/application')): ?> active <?php endif; ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Applications</p>
                </a>
              </li>
              <?php endif; ?>
              <?php if(in_array(0,$modules)): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('reports.users')); ?>" class="nav-link <?php if(Request::is('admin/reports/users')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-book nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.user_report'); ?></p>
                </a>
              </li>
              <?php endif; ?>

              <?php if(in_array(0,$modules)): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('reports.drivers')); ?>" class="nav-link <?php if(Request::is('admin/reports/drivers')): ?> active <?php endif; ?>">
                  <i class="fa fa-id-card nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.Officers'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('reports.customers')); ?>" class="nav-link <?php if(Request::is('admin/reports/customers')): ?> active <?php endif; ?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Operators</p>
                </a>
              </li>
              <?php endif; ?>

              <?php if(in_array(2,$modules)): ?>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('reports.yearly')); ?>" class="nav-link <?php if(Request::is('admin/reports/yearly')): ?> active <?php endif; ?>">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.yearlyReport'); ?></p>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </li> <?php endif; ?>
            <?php if(Request::is('admin/settings*') || Request::is('admin/fare-settings') || Request::is('admin/api-settings') || (Request::is('admin/expensecategories*')) || (Request::is('admin/incomecategories*')) || (Request::is('admin/expensecategories*')) || (Request::is('admin/send-email')) || (Request::is('admin/set-email')) || (Request::is('admin/cancel-reason*')) || (Request::is('admin/frontend-settings*')) || (Request::is('admin/company-services*')) || (Request::is('admin/payment-settings*'))): ?>
            <?php ($class="menu-open"); ?>
            <?php ($active="active"); ?>

            <?php else: ?>
            <?php ($class=""); ?>
            <?php ($active=""); ?>
            <?php endif; ?>
          <li class="nav-item has-treeview <?php echo e($class); ?>">
            <a href="#" class="nav-link <?php echo e($active); ?>">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                <?php echo app('translator')->getFromJson('menu.settings'); ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('settings.index')); ?>" class="nav-link <?php if(Request::is('admin/settings')): ?> active <?php endif; ?>">
                  <i class="fa fa-gear nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.general_settings'); ?></p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/api-settings')); ?>" class="nav-link <?php if(Request::is('admin/api-settings')): ?> active <?php endif; ?>">
                  <i class="fa fa-gear nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.api_settings'); ?></p>
                </a>
              </li> -->
              
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('cancel-reason.index')); ?>" class="nav-link <?php if(Request::is('admin/cancel-reason*')): ?> active <?php endif; ?>">
                  <i class="fa fa-ban nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.cancellation'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/send-email')); ?>" class="nav-link <?php if(Request::is('admin/send-email')): ?> active <?php endif; ?>">
                  <i class="fa fa-envelope nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.email_notification'); ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/set-email')); ?>" class="nav-link <?php if(Request::is('admin/set-email')): ?> active <?php endif; ?>">
                  <i class="fa fa-envelope-open nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.email_content'); ?></p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/fare-settings')); ?>" class="nav-link <?php if(Request::is('admin/fare-settings')): ?> active <?php endif; ?>">
                  <i class="fa fa-gear nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.fare_settings'); ?></p>
                </a>
              </li> -->
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('expensecategories.index')); ?>" class="nav-link <?php if(Request::is('admin/expensecategories*')): ?> active <?php endif; ?>">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.expenseCategories'); ?></p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(route('incomecategories.index')); ?>" class="nav-link <?php if(Request::is('admin/incomecategories*')): ?> active <?php endif; ?>">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('menu.incomeCategories'); ?></p>
                </a>
              </li> -->
              <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/frontend-settings')); ?>" class="nav-link <?php if(Request::is('admin/frontend-settings')): ?> active <?php endif; ?>">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.frontend_settings'); ?></p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="<?php echo e(url('admin/company-services')); ?>" class="nav-link <?php if(Request::is('admin/company-services*')): ?> active <?php endif; ?>">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p><?php echo app('translator')->getFromJson('fleet.companyServices'); ?></p>
                </a>
              </li> -->
            </ul>
          </li>

          <?php if(in_array(12,$modules) && Hyvikk::api('api_key') != null): ?> <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(url('admin/driver-maps')); ?>" class="nav-link <?php if(Request::is('admin/driver-maps') || Request::is('admin/track-driver*')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-map"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.maps'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li> <?php endif; ?>
          <?php endif; ?> <!-- super-admin -->

          <?php if(Hyvikk::api('api') && Hyvikk::api('driver_review') == 1 && in_array(10,$modules)): ?> <li class="nav-item">
            <a style="margin-left: 23px;" href="<?php echo e(url('admin/reviews')); ?>" class="nav-link <?php if(Request::is('admin/reviews')): ?> active <?php endif; ?>">
              <i class="nav-icon fa fa-star"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.reviews'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li> <?php endif; ?>


          <!-- <?php if(in_array(13,$modules)): ?> <li class="nav-item">
            <a href="https://goo.gl/forms/PtzIirmT3ap8m5dY2" target="_blank" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                <?php echo app('translator')->getFromJson('fleet.helpus'); ?>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li> <?php endif; ?> -->
          <!-- sidebar menus for office-admin and super-admin -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $__env->yieldContent('heading'); ?> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php if(!(Request::is('admin'))): ?>
              <li class="breadcrumb-item"><a style="margin-left: 23px;" href="<?php echo e(url('admin/')); ?>"><?php echo app('translator')->getFromJson('fleet.home'); ?></a></li>
              <?php endif; ?>
              <?php echo $__env->yieldContent('breadcrumb'); ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><?php echo app('translator')->getFromJson('fleet.copyright'); ?> &copy; 2016-<?php echo e(date("Y")); ?> <a href="https://infobizsoftware.com/">LeoliftIT</a>.</strong>
    <?php echo app('translator')->getFromJson('fleet.all_rights_reserved'); ?>
    <div class="float-right d-none d-sm-inline-block">
      <b><?php echo app('translator')->getFromJson('fleet.version'); ?></b> 4.0.3
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php echo $__env->yieldContent('script2'); ?>
<!-- jQuery -->
<script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('assets/js/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('assets/plugins/fastclick/fastclick.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('assets/js/cdn/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/dataTables.buttons.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/cdn/buttons.print.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('assets/js/adminlte.js')); ?>"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#data_table tfoot th').each( function () {
    // console.log($('#data_table tfoot th').length);
    if($(this).index() != 0 && $(this).index() != $('#data_table tfoot th').length - 1) {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="'+title+'" />' );
    }
  });

  $('#data_table1 tfoot th').each( function () {
    // console.log($(this).index());
    if($(this).index() != 0 && $(this).index() != $('#data_table1 tfoot th').length - 1){
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="'+title+'" />' );
  }

  });

  var table1 = $('#data_table1').DataTable({
    dom: 'Bfrtip',
    buttons: [
          {
        extend: 'print',
        text: '<i class="fa fa-print"></i> <?php echo e(__("fleet.print")); ?>',

        exportOptions: {
           columns: ([1,2,3,4,5,6,7,8,9,10]),
        },
        customize: function ( win ) {
                $(win.document.body)
                    .css( 'font-size', '10pt' )
                    .prepend(
                        '<h3><?php echo e(__("fleet.bookings")); ?></h3>'
                    );
                $(win.document.body).find( 'table' )
                    .addClass( 'table-bordered' );
                // $(win.document.body).find( 'td' ).css( 'font-size', '10pt' );

            }
          }
    ],
    "language": {
             "url": '<?php echo e(__("fleet.datatable_lang")); ?>',
          },
    columnDefs: [ { orderable: false, targets: [0] } ],
    // individual column search
   "initComplete": function() {
            table1.columns().every(function () {
              var that = this;
              $('input', this.footer()).on('keyup change', function () {
                  that.search(this.value).draw();
              });
            });
          }
  });

  var table = $('#data_table').DataTable({
    "language": {
        "url": '<?php echo e(__("fleet.datatable_lang")); ?>',
     },
     columnDefs: [ { orderable: false, targets: [0] } ],
     // individual column search
     "initComplete": function() {
              table.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                  // console.log($(this).parent().index());
                    that.search(this.value).draw();
                });
              });
            }
  });

  $('[data-toggle="tooltip"]').tooltip();

});
</script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/pnotify.custom.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->

<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/layouts/app.blade.php ENDPATH**/ ?>