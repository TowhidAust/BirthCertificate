<!DOCTYPE html>
@if(Auth::user()->getMeta('language')!= null)
  @php ($language = Auth::user()->getMeta('language'))
@else
  @php($language = Hyvikk::get("language"))
@endif


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ Hyvikk::get('app_name') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cdn/buttons.dataTables.min.css')}}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/dist/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/plugins/iCheck/flat/blue.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('assets/plugins/iCheck/all.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('assets/css/fonts/fonts.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/pnotify.custom.min.css')}}" media="all" rel="stylesheet" type="text/css" />
  @yield("extra_css")
  <script>
  window.Laravel = {!! json_encode([
  'csrfToken' => csrf_token(),
  'subscription_url' => asset('assets/push_notification/push_subscription.php'),
  'serviceWorkerUrl' => asset("serviceWorker.js")
  ]) !!};
  </script>
  <!-- browser notification -->
  <script type="text/javascript" src="{{asset('assets/push_notification/app.js')}}"></script>
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
  @if($language == "Arabic-ar")
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
  @endif
</head>

<body class="hold-transition sidebar-mini" @if($language == "Arabic-ar") dir="rtl" @endif>
  {!! Form::hidden('loggedinuser',Auth::user()->id,['id'=>'loggedinuser']) !!}
  {!! Form::hidden('user_type',Auth::user()->user_type,['id'=>'user_type']) !!}
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
          @if(Auth::user()->user_type=="S")
            @php($r = 0)
            @php($i = 0)
            @php($l = 0)
            @php($d = 0)
            @php($s = 0)
            @php($user= Auth::user())
            @foreach ($user->unreadNotifications as $notification)
            @if($notification->type == "App\Notifications\RenewRegistration")
              @php($r++)
              @elseif($notification->type == "App\Notifications\RenewInsurance")
              @php($i++)
              @elseif($notification->type == "App\Notifications\RenewVehicleLicence")
              @php($l++)
              @elseif($notification->type == "App\Notifications\RenewDriverLicence")
              @php($d++)
              @elseif($notification->type == "App\Notifications\ServiceReminderNotification")
              @php($s++)
              @endif
            @endforeach
          @php($n = $r + $i +$l + $d + $s)
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">@if($n>0) {{$n}} @endif</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @if($n>0)<span class="dropdown-item dropdown-header"> {{$n}} Notifications </span>
          <div class="dropdown-divider"></div>@endif
          <a style="margin-left: 23px;" href="{{url('admin/vehicle_notification',['type'=>'renew-registrations'])}}" class="dropdown-item">
            <i class="fa fa-id-card-o mr-2"></i> @lang('fleet.renew_registration')
            <span class="float-right text-muted text-sm">@if($r>0) {{$r}} @endif</span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="{{url('admin/vehicle_notification',['type'=>'renew-insurance'])}}" class="dropdown-item">
            <i class="fa fa-file-text mr-2"></i> @lang('fleet.renew_insurance')
            <span class="float-right text-muted text-sm">@if($i>0) {{$i}} @endif</span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="{{url('admin/vehicle_notification',['type'=>'renew-licence'])}}" class="dropdown-item">
            <i class="fa fa-file-o mr-2"></i> @lang('fleet.renew_licence')
            <span class="float-right text-muted text-sm">@if($l>0) {{$l}} @endif</span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="{{url('admin/driver_notification',['type'=>'renew-driving-licence'])}}" class="dropdown-item">
            <i class="fa fa-file-text-o mr-2"></i> @lang('fleet.renew_driving_licence')
            <span class="float-right text-muted text-sm">@if($d>0) {{$d}} @endif</span>
          </a>
          <div class="dropdown-divider"></div>
          <a style="margin-left: 23px;" href="{{url('admin/reminder',['type'=>'service-reminder'])}}" class="dropdown-item">
            <i class="fa fa-clock-o mr-2"></i> @lang('fleet.serviceReminders')
            <span class="float-right text-muted text-sm">@if($s>0) {{$s}} @endif</span>
          </a>
        </div>
      </li>
      @endif
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
              @if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null)
              @if(starts_with(Auth::user()->getMeta('driver_image'),'http'))
                @php($src = Auth::user()->getMeta('driver_image'))
                @else
                @php($src=asset('uploads/'.Auth::user()->getMeta('driver_image')))
                @endif
                <img src="{{$src}}" class="img-size-50 mr-3 img-circle" alt="User Image">
                @elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O')
                  @if(Auth::user()->getMeta('profile_image') == null)
                  <img src="{{ asset("assets/images/no-user.jpg")}}" class="img-size-50 mr-3 img-circle" alt="User Image">
                  @else
                  <img src="{{asset('uploads/'.Auth::user()->getMeta('profile_image'))}}" class="img-size-50 mr-3 img-circle" alt="User Image">
                  @endif
                @elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null)
                @if(starts_with(Auth::user()->getMeta('profile_pic'),'http'))
                @php($src = Auth::user()->getMeta('profile_pic'))
                @else
                @php($src=asset('uploads/'.Auth::user()->getMeta('profile_pic')))
                @endif
                <img src="{{$src}}" class="img-size-50 mr-3 img-circle" alt="User Image">
                @else
                <img src="{{ asset("assets/images/no-user.jpg")}}" class="img-size-50 mr-3 img-circle" alt="User Image">
                @endif

              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{Auth::user()->name}}

                  <span class="float-right text-sm text-danger">

                  </span>
                </h3>
                <p class="text-sm text-muted">{{Auth::user()->email}}</p>
                <p class="text-sm text-muted"></p>

              </div>
            </div>
            <div>
            <div style="margin: 5px;">
              <a style="margin-left: 23px;" href="{{ url('admin/change-details/'.Auth::user()->id)}}" class="btn btn-secondary btn-flat"><i class="fa fa-edit"></i> @lang('fleet.editProfile')</a>

              <a style="margin-left: 23px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-secondary btn-flat pull-right"> <i class="fa fa-sign-out"></i>
              @lang('menu.logout')
              </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </div>
            <div class="clear"></div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li> --}}
    <!-- logout -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a style="margin-left: 23px;" href="{{ url('admin/')}}" class="brand-link">
      <img src="{{ asset('assets/images/'. Hyvikk::get('icon_img') ) }}" alt="Fleet Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{  Hyvikk::get('app_name')  }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           @if(Auth::user()->user_type == 'D' && Auth::user()->getMeta('driver_image') != null)
           @if(starts_with(Auth::user()->getMeta('driver_image'),'http'))
            @php($src = Auth::user()->getMeta('driver_image'))
            @else
            @php($src=asset('uploads/'.Auth::user()->getMeta('driver_image')))
            @endif
            <img src="{{$src}}" class="img-circle elevation-2" alt="User Image">
            @elseif(Auth::user()->user_type == 'S' || Auth::user()->user_type == 'O')
              @if(Auth::user()->getMeta('profile_image') == null)
              <img src="{{ asset("assets/images/no-user.jpg")}}" class="img-circle elevation-2" alt="User Image">
              @else
              <img src="{{asset('uploads/'.Auth::user()->getMeta('profile_image'))}}" class="img-circle elevation-2" alt="User Image">
              @endif
            @elseif(Auth::user()->user_type == 'C' && Auth::user()->getMeta('profile_pic') != null)
            @if(starts_with(Auth::user()->getMeta('profile_pic'),'http'))
            @php($src = Auth::user()->getMeta('profile_pic'))
            @else
            @php($src=asset('uploads/'.Auth::user()->getMeta('profile_pic')))
            @endif
            <img src="{{$src}}" class="img-circle elevation-2" alt="User Image">
            @else
            <img src="{{ asset("assets/images/no-user.jpg")}}" class="img-circle elevation-2" alt="User Image">
            @endif

        </div>
        <div class="info">
          <a style="margin-left: 23px;" href="{{ url('admin/change-details/'.Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- customer -->
          @if(Auth::user()->user_type=="C"||Auth::user()->user_type=="A")

            @if(Request::is('admin/bookings*'))
            @php($class="menu-open")
            @php($active="active")
            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                applications
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('bookings.create')}}" class="nav-link @if(Request::is('admin/bookings/create')) active @endif">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                New Applications</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('/application')}}" class="nav-link @if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))) active @endif">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Manage Applications</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a style="margin-left: 23px;" href="{{ url('admin/change-details/'.Auth::user()->id)}}" class="nav-link @if(Request::is('admin/change-details*')) active @endif">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                @lang('fleet.editProfile')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a style="margin-left: 23px;" href="{{url('admin/addresses') }}" class="nav-link @if(Request::is('admin/addresses*')) active @endif">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                @lang('fleet.addresses')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a style="margin-left: 23px;" href="{{url('admin/') }}" class="nav-link @if(Request::is('admin')) active @endif">
              <i class="nav-icon fa fa-money"></i>
              <p>
                @lang('fleet.expenses')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          @endif
          <!-- customer -->
          <!-- user-type S or O -->
          @if(Auth::user()->user_type=="S" || Auth::user()->user_type=="O")
          <li class="nav-item">
            <a  href="{{ url('admin/')}}" class="nav-link @if(Request::is('admin')) active @endif">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                @lang('menu.Dashboard')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          @endif
          <!-- user-type S or O -->

          <!-- driver -->
          @if(Auth::user()->user_type=="D")

          <li class="nav-item">
            <a style="margin-left: 23px;" href="{{url('admin/')}}" class="nav-link @if(Request::is('admin/')) active @endif">
              <i class="nav-icon fa fa-user"></i>
              <p>
                @lang('fleet.myProfile')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a style="margin-left: 23px;" href="{{ url('admin/change-details/'.Auth::user()->id)}}" class="nav-link @if(Request::is('admin/change-details*')) active @endif">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                @lang('fleet.editProfile')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
            @if(Request::is('admin/notes*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                @lang('fleet.notes')
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('notes.index') }}" class="nav-link @if((Request::is('admin/notes*') && !(Request::is('admin/notes/create')))) active @endif">
                  <i class="fa fa-flag nav-icon"></i>
                  <p> @lang('fleet.manage_note')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route("notes.create") }}" class="nav-link @if(Request::is('admin/notes/create')) active @endif">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>@lang('fleet.create_note')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                Corrections
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('today_correction')}}" class="nav-link @if(Request::is('admin/bookings/create')) active @endif">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                  Today's </p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('correction')}}" class="nav-link @if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))) active @endif">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Manage Corrections</p>
                </a>
              </li>

            </ul>
          </li>
            @if(Request::is('admin/driver-reports*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                @lang('menu.reports')
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route("dreports.monthly")}}" class="nav-link @if(Request::is('admin/driver-reports/monthly')) active @endif">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>@lang('menu.monthlyReport')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route("dreports.yearly")}}" class="nav-link @if(Request::is('admin/driver-reports/yearly')) active @endif">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>@lang('fleet.yearlyReport')</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <!-- driver -->

          <!-- sidebar menus for office-admin and super-admin -->
        @if(Auth::user()->user_type == "S" || Auth::user()->user_type == "O")
        @php($modules=unserialize(Auth::user()->getMeta('module'))) <!--array of selected modules of logged in user-->
        @else
        @php($modules=array())
        @endif

        @if (!Auth::guest() &&  Auth::user()->user_type!="D" && Auth::user()->user_type != "C" )

            @if((Request::is('admin/drivers*')) || (Request::is('admin/users*')) || (Request::is('admin/customers*')) )
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(0,$modules) || Auth::user()->user_type == "S") <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                @lang('menu.users')
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(in_array(0,$modules))
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('councillor')}}" class="nav-link @if(Request::is('admin/drivers*')) active @endif">
                  <i class="fa fa-id-card nav-icon"></i>
                  <p>Word Councillor</p>
                </a>
              </li>
              @endif
              @if(Auth::user()->user_type=="S")
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('users.index')}}" class="nav-link @if(Request::is('admin/users*')) active @endif">
                  <i class="fa fa-user nav-icon"></i>
                  <p> Officers</p>
                </a>
              </li>
              @if(in_array(0,$modules))
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('customers.index')}}" class="nav-link @if(Request::is('admin/customers*')) active @endif">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Operator</p>
                </a>
              </li>
              @endif
              @endif
            </ul>
          </li> @endif

            @if((Request::is('admin/driver-logs')) || (Request::is('admin/vehicle-types*')) || (Request::is('admin/vehicles*')) || (Request::is('admin/vehicle_group*')) || (Request::is('admin/vehicle-reviews*')) || (Request::is('admin/view-vehicle-review*')) || (Request::is('admin/vehicle-review*')))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif



            @if((Request::is('admin/income')) || (Request::is('admin/expense')) || (Request::is('admin/transaction')) || (Request::is('admin/income_records')) || (Request::is('admin/expense_records')) )
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(2,$modules))
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-money"></i>
              <p>
                @lang('menu.transactions')
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('income.index')}}" class="nav-link @if((Request::is('admin/income'))|| (Request::is('admin/income_records'))) active @endif">
                  <i class="fa fa-newspaper-o nav-icon"></i>
                  <p>Manage Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('expense.index')}}" class="nav-link @if((Request::is('admin/expense')) || (Request::is('admin/expense_records'))) active @endif">
                  <i class="fa fa-newspaper-o nav-icon"></i>
                  <p>@lang('fleet.manage_expense')</p>
                </a>
              </li>
            </ul>
          </li>
           @endif

            @if((Request::is('admin/bookings*'))  || (Request::is('admin/bookings_calendar')) || (Request::is('admin/booking-quotation*')))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")

            @endif
            @if(Auth::user()->user_type=="O"||Auth::user()->user_type=="S"||Auth::user()->user_type=="A"||Auth::user()->user_type=="OP")
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                Applications
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('today_application')}}" class="nav-link @if(Request::is('admin/today_application')) active @endif">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                  Today's</p>
                </a>
              </li>

              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('application')}}" class="nav-link @if((Request::is('admin/application*')) && !(Request::is('admin/application')) && !(Request::is('admin/application'))) active @endif">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Manage Applications</p>
                </a>
              </li>
            </ul>
          </li> @endif
              @if(Auth::user()->user_type=="O"||Auth::user()->user_type=="S"||Auth::user()->user_type=="A"||Auth::user()->user_type=="OP")
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                Corrections
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('today_correction')}}" class="nav-link @if(Request::is('admin/bookings/create')) active @endif">
                  <i class="fa fa-address-book nav-icon "></i>
                  <p>
                  Today's </p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('correction')}}" class="nav-link @if((Request::is('admin/bookings*')) && !(Request::is('admin/bookings/create')) && !(Request::is('admin/bookings_calendar'))) active @endif">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>
                  Manage Corrections</p>
                </a>
              </li>

            </ul>
          </li> @endif

            @if(Request::is('admin/reports*'))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          @if(in_array(4,$modules)) <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                @lang('menu.reports')
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(in_array(2,$modules))
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/reports/income') }}" class="nav-link @if(Request::is('admin/reports/income')) active @endif">
                  <i class="fa fa-credit-card nav-icon"></i>
                  <p> Fee @lang('fleet.report')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/reports/expense') }}" class="nav-link @if(Request::is('admin/reports/expense')) active @endif">
                  <i class="fa fa-money nav-icon"></i>
                  <p> @lang('fleet.expense') @lang('fleet.report')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('reports.delinquent') }}" class="nav-link @if(Request::is('admin/reports/delinquent')) active @endif">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p> @lang('menu.deliquentReport')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('reports.monthly') }}" class="nav-link @if(Request::is('admin/reports/monthly')) active @endif">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>@lang('menu.monthlyReport')</p>
                </a>
              </li>
              @endif
              @if(in_array(3,$modules))
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('reports.application') }}" class="nav-link @if(Request::is('admin/reports/application')) active @endif">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Applications</p>
                </a>
              </li>
              @endif
              @if(in_array(0,$modules))
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('reports.users') }}" class="nav-link @if(Request::is('admin/reports/users')) active @endif">
                  <i class="fa fa-address-book nav-icon"></i>
                  <p>@lang('fleet.user_report')</p>
                </a>
              </li>
              @endif

              @if(in_array(0,$modules))
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('reports.drivers') }}" class="nav-link @if(Request::is('admin/reports/drivers')) active @endif">
                  <i class="fa fa-id-card nav-icon"></i>
                  <p>@lang('fleet.Officers')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('reports.customers') }}" class="nav-link @if(Request::is('admin/reports/customers')) active @endif">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Operators</p>
                </a>
              </li>
              @endif

              @if(in_array(2,$modules))
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('reports.yearly') }}" class="nav-link @if(Request::is('admin/reports/yearly')) active @endif">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>@lang('fleet.yearlyReport')</p>
                </a>
              </li>
              @endif
            </ul>
          </li> @endif
            @if(Request::is('admin/settings*') || Request::is('admin/fare-settings') || Request::is('admin/api-settings') || (Request::is('admin/expensecategories*')) || (Request::is('admin/incomecategories*')) || (Request::is('admin/expensecategories*')) || (Request::is('admin/send-email')) || (Request::is('admin/set-email')) || (Request::is('admin/cancel-reason*')) || (Request::is('admin/frontend-settings*')) || (Request::is('admin/company-services*')) || (Request::is('admin/payment-settings*')))
            @php($class="menu-open")
            @php($active="active")

            @else
            @php($class="")
            @php($active="")
            @endif
          <li class="nav-item has-treeview {{$class}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                @lang('menu.settings')
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('settings.index') }}" class="nav-link @if(Request::is('admin/settings')) active @endif">
                  <i class="fa fa-gear nav-icon"></i>
                  <p>@lang('menu.general_settings')</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/api-settings')}}" class="nav-link @if(Request::is('admin/api-settings')) active @endif">
                  <i class="fa fa-gear nav-icon"></i>
                  <p>@lang('menu.api_settings')</p>
                </a>
              </li> -->
              {{-- <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/payment-settings')}}" class="nav-link @if(Request::is('admin/payment-settings')) active @endif">
                  <i class="fa fa-gear nav-icon"></i>
                  <p>@lang('fleet.payment_settings')</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('cancel-reason.index')}}" class="nav-link @if(Request::is('admin/cancel-reason*')) active @endif">
                  <i class="fa fa-ban nav-icon"></i>
                  <p>@lang('fleet.cancellation')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/send-email')}}" class="nav-link @if(Request::is('admin/send-email')) active @endif">
                  <i class="fa fa-envelope nav-icon"></i>
                  <p>@lang('menu.email_notification')</p>
                </a>
              </li>
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/set-email')}}" class="nav-link @if(Request::is('admin/set-email')) active @endif">
                  <i class="fa fa-envelope-open nav-icon"></i>
                  <p>@lang('menu.email_content')</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/fare-settings')}}" class="nav-link @if(Request::is('admin/fare-settings')) active @endif">
                  <i class="fa fa-gear nav-icon"></i>
                  <p>@lang('menu.fare_settings')</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('expensecategories.index') }}" class="nav-link @if(Request::is('admin/expensecategories*')) active @endif">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>@lang('menu.expenseCategories')</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ route('incomecategories.index') }}" class="nav-link @if(Request::is('admin/incomecategories*')) active @endif">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>@lang('menu.incomeCategories')</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/frontend-settings')}}" class="nav-link @if(Request::is('admin/frontend-settings')) active @endif">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>@lang('fleet.frontend_settings')</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a style="margin-left: 23px;" href="{{ url('admin/company-services')}}" class="nav-link @if(Request::is('admin/company-services*')) active @endif">
                  <i class="fa fa-tasks nav-icon"></i>
                  <p>@lang('fleet.companyServices')</p>
                </a>
              </li> -->
            </ul>
          </li>

          @if(in_array(12,$modules) && Hyvikk::api('api_key') != null) <li class="nav-item">
            <a style="margin-left: 23px;" href="{{ url('admin/driver-maps')}}" class="nav-link @if(Request::is('admin/driver-maps') || Request::is('admin/track-driver*')) active @endif">
              <i class="nav-icon fa fa-map"></i>
              <p>
                @lang('fleet.maps')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li> @endif
          @endif <!-- super-admin -->

          @if(Hyvikk::api('api') && Hyvikk::api('driver_review') == 1 && in_array(10,$modules)) <li class="nav-item">
            <a style="margin-left: 23px;" href="{{ url('admin/reviews')}}" class="nav-link @if(Request::is('admin/reviews')) active @endif">
              <i class="nav-icon fa fa-star"></i>
              <p>
                @lang('fleet.reviews')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li> @endif


          <!-- @if(in_array(13,$modules)) <li class="nav-item">
            <a href="https://goo.gl/forms/PtzIirmT3ap8m5dY2" target="_blank" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                @lang('fleet.helpus')
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li> @endif -->
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
            <h1 class="m-0 text-dark">@yield('heading') </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @if(!(Request::is('admin')))
              <li class="breadcrumb-item"><a style="margin-left: 23px;" href="{{ url('admin/')}}">@lang('fleet.home')</a></li>
              @endif
              @yield('breadcrumb')
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>@lang('fleet.copyright') &copy; 2016-{{date("Y")}} <a href="https://infobizsoftware.com/">LeoliftIT</a>.</strong>
    @lang('fleet.all_rights_reserved')
    <div class="float-right d-none d-sm-inline-block">
      <b>@lang('fleet.version')</b> 4.0.3
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('script2')
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('assets/js/cdn/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/buttons.print.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.js')}}"></script>

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
        text: '<i class="fa fa-print"></i> {{__("fleet.print")}}',

        exportOptions: {
           columns: ([1,2,3,4,5,6,7,8,9,10]),
        },
        customize: function ( win ) {
                $(win.document.body)
                    .css( 'font-size', '10pt' )
                    .prepend(
                        '<h3>{{__("fleet.bookings")}}</h3>'
                    );
                $(win.document.body).find( 'table' )
                    .addClass( 'table-bordered' );
                // $(win.document.body).find( 'td' ).css( 'font-size', '10pt' );

            }
          }
    ],
    "language": {
             "url": '{{ __("fleet.datatable_lang") }}',
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
        "url": '{{ __("fleet.datatable_lang") }}',
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
<script type="text/javascript" src="{{ asset('assets/js/pnotify.custom.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
@yield('script')
</body>
</html>
