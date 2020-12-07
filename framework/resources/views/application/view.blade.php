@extends('layouts.app')
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("bookings.index")}}">@lang('menu.bookings')</a></li>
<li class="breadcrumb-item active">@lang('fleet.booking_receipt')</li>
@endsection
@section('content')
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
      <h4>
        <span class="logo-lg">
          <img src="{{ asset('assets/images/'. Hyvikk::get('icon_img') ) }}" class="navbar-brand" style="height: 100px;margin-top: -15px">
          {{  Hyvikk::get('app_name')  }}
        </span>
      </h4>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 invoice-col">
      <h6><?php    echo '<pre>';
         print_r($data);
         exit; ?></h6>
    </div>
    <div class="col-sm-6 invoice-col">
      <strong>@lang('fleet.dropoff_addr'):</strong>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        {{Hyvikk::get('invoice_text')}}
      </p>
    </div>
  </div>
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="{{url('admin/print/'.$id)}}" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> @lang('fleet.print')</a>
    </div>
  </div>
</div>
@endsection
