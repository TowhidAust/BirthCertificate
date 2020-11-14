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
          <small class="float-right"> <b>@lang('fleet.date') : </b>{{date('Y-m-d')}}</small>
          <address style="font-size:16px;    margin-left: 9px;">
            {{Hyvikk::get('badd1')}}
            <br>
            {{Hyvikk::get('badd2')}}
            <br>
            {{Hyvikk::get('city')}},

            {{Hyvikk::get('state')}}
            <br>
            {{Hyvikk::get('country')}}
          </address>
        </span>
      </h4>
    </div>
  </div>
  @if($booking->type!='Wedding')
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <b>From</b>
      <address>
        {!! nl2br(e($booking->customer->getMeta('address'))) !!}
      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      <b>@if($booking->customer->getMeta('address') != null) To @endif</b>
      <address>
        {!! nl2br(e($booking->customer->getMeta('address'))) !!}
      </address>
    </div>
    <div class="col-sm-4 invoice-col" style="float: right;text-align: right;padding-right: 11px;">
      <b>Invoice#</b>
      232323
      <br>
      <b>{{ $booking->customer->name }}</b>
    </div>
  </div>
  @else
  <div class="row invoice-info">
    <div class="col-sm-6 invoice-col" >
      <strong> @lang('fleet.pickup_addr'):</strong>
      <address>
        {{$booking->pickup_addr}}
        <br>
        @lang('fleet.pickup'):
        <b> {{date($date_format_setting.' g:i A',strtotime($booking->pickup))}}</b>
      </address>
    </div>
    <div class="col-sm-6 invoice-col" style="float: right;text-align: right;padding-right: 11px;">
      <b>Invoice#</b>
        {{ $booking->id }}
      <br>
      <b>{{ $booking->customer->name }}</b>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 pull-right">
      <p class="lead"></p>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:16.66%"> Image</th>
            <th style="width:16.66%"> Car Name </th>
            <th style="width:16.66%"> Time Slot </th>
            <th style="width:16.66%"> Trip Fare</th>
            <th style="width:16.66%"> Quantity </th>
            <th style="width:16.66%"> Sub Total </th>
          </tr>

          <?php
          $package_info= DB::table('package')
                      ->where('id',$booking->wedding_package_id)
                      ->select('*',)
                      ->first();
          $total=0;
          ?>
          @if(!empty($package_info))
          <tr>
            <td> <img src="{{asset('uploads/'.$package_info->image)}}" height="80px" width="80px"></td>
            <td>{{$package_info->package_name}}</td>
            <td></td>
            @if($package_info->type=='0')
              @if($booking->decu_type=='real')
              <td>{{$package_info->price}}</td>
              @else
              <td>{{$package_info->ar_price}}</td>
              @endif
            @else
              <td>{{$package_info->price}}</td>
            @endif

            <td>1</td>
            <td>{{ Hyvikk::get('currency') }}{{number_format($package_info->price,2)}}</td>
          </tr>
          <?php $total=$total+$package_info->price;?>
          @endif
        @foreach($guest_car as $car)
          <?php $total=$total+($car->rent*$car->number_of_car);?>
          <tr>
            <td> <img src="{{asset('uploads/'.$car->image)}}" height="80px" width="80px"></td>
            <td>{{$car->car_name}}</td>
            <td>{{$car->time}}</td>
            <td>{{$car->rent}}</td>
            <td>{{$car->number_of_car}}</td>
            <td>{{ Hyvikk::get('currency') }} {{number_format($car->rent*$car->number_of_car,2)}}</td>
          </tr>
          @endforeach
          <tr>
            <th colspan="5">Total Amount :</th>
            <td>{{ Hyvikk::get('currency') }}{{number_format($total,2)}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        {{Hyvikk::get('invoice_text')}}
      </p>
    </div>
  </div>
</div>
@endsection
