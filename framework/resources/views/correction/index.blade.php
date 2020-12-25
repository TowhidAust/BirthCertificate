@extends('layouts.app')
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')
@section('extra_css')
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
  <style type="text/css">
    .checkbox, #chk_all{
      width: 20px;
      height: 20px;
    }
  </style>
@endsection
@section("breadcrumb")
<li class="breadcrumb-item active">@lang('Application')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link custom_color active" href="#activity" data-toggle="tab">Pending</a></li>
          <li class="nav-item"><a class="nav-link custom_color" href="#upcoming" data-toggle="tab">Approved</a></li>
          <li class="nav-item"><a class="nav-link custom_color " style="color:red;" href="#rejected" data-toggle="tab">Rejected</a></li>

        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <h4>Pending Applications</h4>
            <div class="table-responsive">
              <table class="table table-responsive display" id="data_table" >
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($pending_applican_info as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->ward_name}}</td>
                      <td>{{$row->birth_id}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->birth_date}}</td>
                      <td><span class="badge badge-secondary">{{$row->status}}</span></td>
                      <td> <a href="{{ url("admin/correction/".$row->id."/view")}}"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="tab-pane" id="upcoming">
            <h4>Approved Applications</h4>
            <div class="table-responsive">
              <table class="table driver_table" id="data_table1" >
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($approved_applican_info as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->ward_name}}</td>
                      <td>{{$row->birth_id}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->birth_date}}</td>
                      <td><span class="badge badge-secondary">{{$row->status}}</span></td>
                      <td> <a href="{{ url("admin/correction/".$row->id."/view")}}"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="rejected">
            <h4>Approved Applications</h4>
            <div class="table-responsive">
              <table class="table driver_table" id="data_table2">
                <thead class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rejected_applican_info as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->ward_name}}</td>
                      <td>{{$row->birth_id}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->birth_date}}</td>
                      <td><span class="badge badge-secondary">{{$row->status}}</span></td>
                      <td> <a href="{{ url("admin/correction/".$row->id."/view")}}"><button type="button" class="btn btn-info" name="View">View</button></a>  </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="thead-inverse">
                  <tr>
                    <th> Application ID</th>
                    <th> Ward No</th>
                    <th> Birth ID</th>
                    <th> Application  Name</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>@lang('fleet.action')</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
