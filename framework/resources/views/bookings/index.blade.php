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
<li class="breadcrumb-item active">@lang('menu.bookings')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header with-border">
        <h3 class="card-title"> @lang('fleet.manage_bookings') &nbsp;
          <a href="{{route("bookings.create")}}" class="btn btn-success">@lang('fleet.new_booking')</a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-responsive display" id="data_table1" style="padding-bottom: 35px; width: 100%">
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
                <th>Birth Date</th>
                <th>Phone Number</th>
                <th>Present Address</th>
                <th>Parmanet address</th>
                <th>@lang('fleet.action')</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
              <tr>
                <th>
                @if($data->count() > 0)
                  <button class="btn btn-danger" id="bulk_delete" data-toggle="modal" data-target="#bulkModal" disabled>@lang('fleet.delete')</button>
                @endif
                </th>
                <th> Application ID</th>
                <th> Name Bangla</th>
                <th>Name English</th>
                <th>Birth Date</th>
                <th>Phone Number</th>
                <th>Present Address</th>
                <th>Parmanet address</th>
                <th>@lang('fleet.action')</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
