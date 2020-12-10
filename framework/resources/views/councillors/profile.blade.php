@extends('layouts.app')
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')

@section('extra_css')
<style type="text/css">
.nav-tabs-custom>.nav-tabs>li.active{border-top-color:#3c8dbc !important;}
.custom_color.active
{
  color: #fff;
  background-color: #02bcd1 !important;
}
</style>
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ url('admin/')}}">@lang('fleet.home')</a></li>
<li class="breadcrumb-item active">@lang('fleet.myProfile')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-3">
  <!-- Profile Image -->
    <div class="card card-info card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          @if($data->getMeta('driver_image') != null)
            @if(starts_with($data->getMeta('driver_image'),'http'))
              @php($src = $data->getMeta('driver_image'))
            @else
              @php($src=asset('uploads/'.$data->getMeta('driver_image')))
            @endif
            <img src="{{$src}}" class="profile-user-img img-responsive img-circle"  alt="User profile picture">
          @else
            <img src="{{ asset("assets/images/no-user.jpg")}}" alt="User profile picture" class="profile-user-img img-responsive img-circle">
          @endif
        </div>
        <h3 class="profile-username text-center"> {{$data->getMeta('first_name')}} {{ $data->getMeta('last_name')}}</h3>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>
            @lang('fleet.total')
            Application</b> <a class="pull-right"> {{$total}} </a>
          </li>
        </ul>
        <a href="{{ url('admin/change-details/'.Auth::user()->id) }}" class="btn btn-info btn-block"><b>@lang('fleet.editProfile')</b></a>
      </div>
    </div>
    <!-- About Me Box -->
    <div class="card card-info">
      <div class="card-header">
      <h3 class="card-title">@lang('fleet.about_me')</h3>
      </div>
      <!-- /.box-header -->
      <div class="card-body">
        <strong><i class="fa fa-user margin-r-5"></i> @lang('fleet.personal_info')</strong>
        <p class="text-muted">
          {{$data->getMeta('first_name')}} {{$data->getMeta('middle_name')}} {{$data->getMeta('last_name')}}
          <br>
          {{$data->getMeta('phone')}}
          <br>
          {{$data->email}}
          <br>
          {{$data->getMeta('address')}}
        </p>
        <hr>

  
      </div>
    </div>
    <!-- /.box -->
  </div>

  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link custom_color active" href="#activity" data-toggle="tab">Pending</a></li>
          <li class="nav-item"><a class="nav-link custom_color" href="#upcoming" data-toggle="tab">Approved</a></li>

        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <h4>Pending Applications</h4>
            <div class="table-responsive">
              <table class="table driver_table">
                <thead class="thead-inverse">
                  <tr>
                    <th>
                      @if($data->count() > 0)
                      <input type="checkbox" id="chk_all">
                      @endif
                    </th>
                    <th> Application ID</th>
                    <th> Name Bangla</th>
                    <th>Name English</th>
                    <th>Number</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($pending_applican_info as $row)
                    <tr>
                      <td>  @if($data->count() > 0)
                        <input type="checkbox" id="chk_all">
                        @endif</td>
                      <td>{{$row->applicant_id}}</td>
                      <td>{{$row->bangla_name}}</td>
                      <td>{{$row->english_name}}</td>
                      <td>{{$row->number}}</td>
                      <td>{{$row->birth_date}}</td>
                      <td>{{$row->gender}}</td>
                      <td><span class="badge badge-secondary">{{$row->status}}</span></td>
                      <td> <a href="{{ url("admin/application/".$row->applicant_id."/view")}}"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane" id="upcoming">
            <h4>Approved Applican</h4>
            <div class="table-responsive">
              <table class="table driver_table">
                <thead class="thead-inverse">
                  <tr>
                    <th>
                      @if($data->count() > 0)
                      <input type="checkbox" id="chk_all">
                      @endif
                    </th>
                    <th> Application ID</th>
                    <th> Name Bangla</th>
                    <th>Name English</th>
                    <th>Number</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($approved_applican_info as $row)
                    <tr>
                      <td>  @if($data->count() > 0)
                        <input type="checkbox" id="chk_all">
                        @endif</td>
                      <td>{{$row->applicant_id}}</td>
                      <td>{{$row->bangla_name}}</td>
                      <td>{{$row->english_name}}</td>
                      <td>{{$row->number}}</td>
                      <td>{{$row->birth_date}}</td>
                      <td>{{$row->gender}}</td>
                      <td><span class="badge badge-secondary">{{$row->status}}</span></td>
                      <td> <a href="{{ url("admin/application/".$row->applicant_id."/view")}}"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
$('.driver_table').DataTable({
  "language": {
      "url": '{{ __("fleet.datatable_lang") }}',
   }
});
</script>
@endsection
