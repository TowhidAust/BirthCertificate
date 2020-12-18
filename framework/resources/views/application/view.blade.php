@extends('layouts.app')
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">@lang('Application')</a></li>
<li class="breadcrumb-item active">@lang('New Application')</li>
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
        <span><h5>@if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                {!! session('message') !!}
              </div>
              @endif</h5>
        </span>
        <span><h5>@if (Session::has('reject'))
              <div class="alert alert-danger" role="alert">
                {!! session('reject') !!}
              </div>
              @endif</h5>
        </span>
      </h4>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Basic Infomation</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Bangla Name : {{$data->bangla_name}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  English Name : {{$data->english_name}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Number : {{$data->number}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Birth Day : {{$data->birth_date}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Gender : {{$data->gender}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Family Member Position : {{$data->sons_position}}  </p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">   </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Status : <span class="badge badge-secondary">{{$data->status}}</span>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Payment Status : <span class="badge badge-secondary">@if($data->payment_status=='0') Unpaid @else Paid @endif</span>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Division : {{$data->applican_name}}  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Ward : {{$data->ward_name}}  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application ID : {{$data->applicant_id}}  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Birth ID : {{$data->birth_id}}  </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Parent's Infomation</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Father Name Bangla: {{$data->father_name_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Name English : {{$data->father_name_en}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Birth ID : {{$data->father_birth_id}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father NID : {{$data->father_nid_no}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Passport No : {{$data->father_passport}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Father Nationality : {{$data->father_nationality}}  </p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Mother Name Bangla: {{$data->mother_name_bn}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Name English : {{$data->mother_name_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Birth ID : {{$data->mother_birth_id}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother NID : {{$data->father_nid_no}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Passport No : {{$data->mother_passport}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Mother Nationality : {{$data->mother_nationality}}  </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Present Address</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: {{$data->p_house_no_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : {{$data->p_village_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : {{$data->p_union_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : {{$data->p_post_office_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : {{$data->p_post_code_bn}}</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : {{$data->p_police_station_bn}}</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : {{$data->p_district_bn}}</p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: {{$data->p_house_no_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : {{$data->p_village_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : {{$data->p_union_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : {{$data->p_post_office_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : {{$data->p_post_code_en}}</p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : {{$data->p_police_station_en}}</p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : {{$data->p_district_en}}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Birth Address</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: {{$data->b_house_no_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : {{$data->b_village_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : {{$data->b_union_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : {{$data->b_post_office_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : {{$data->b_post_code_bn}}</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : {{$data->b_police_station_bn}}</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : {{$data->b_district_bn}}</p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: {{$data->b_house_no_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : {{$data->b_village_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : {{$data->b_union_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : {{$data->b_post_office_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : {{$data->b_post_code_en}}</p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : {{$data->b_police_station_en}}</p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : {{$data->b_district_en}}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Permanent Address</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: {{$data->per_house_no_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : {{$data->per_village_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : {{$data->per_union_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : {{$data->per_post_office_bn}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : {{$data->per_post_code_bn}}</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : {{$data->per_police_station_bn}}</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : {{$data->per_district_bn}}</p>
    </div>
    <div class="col-sm-6 invoice-col">
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  House/Road No: {{$data->per_house_no_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  village : {{$data->per_village_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Ward : {{$data->per_union_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Office : {{$data->per_post_office_en}}  </p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Post Code : {{$data->per_post_code_en}}</p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Upozila : {{$data->per_police_station_en}}</p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"> District : {{$data->per_district_en}}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong>Payment Information</strong>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Bank Name : {{$data->bank_name}}  </p>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Branch Name : {{$data->branch}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Transaction ID : {{$data->transaction_id}}  </p>
    </div>
    <div class="col-sm-6 invoice-col">
      <?php  $extension=substr($data->file,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="{{asset($data->file)}}"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%" src="{{asset($data->file)}}" alt="">
     <?php } ?>
    </div>
  </div>
    <h3>Supported Documents</h3>
  <div class="row">
    <div class="col-sm-4 invoice-col">
      <strong>Father's NID</strong>
    </div>
    <div class="col-sm-8 invoice-col">
      <?php  $extension=substr($data->father_nid,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="{{asset($data->father_nid)}}"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%" src="{{asset($data->father_nid)}}" alt="">
     <?php } ?>
    </div>
    </div>
  <div class="row">
    <div class="col-sm-4 invoice-col">
      <strong>Mother's NID</strong>
    </div>
    <div class="col-sm-8 invoice-col">
      <?php  $extension=substr($data->mother_nid,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="{{asset($data->mother_nid)}}"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%" src="{{asset($data->mother_nid)}}" alt="">
     <?php } ?>
     </div>
    </div>

    <div class="row">
    <div class="col-sm-4 invoice-col">
      <strong>Medical Report / Tika Card</strong>
    </div>
    <div class="col-sm-8 invoice-col">
      <?php  $extension=substr($data->card,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="{{asset($data->card)}}"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%;" src="{{asset($data->card)}}" alt="">
     <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 invoice-col">
      <strong>Others Documents</strong>
    </div>
    <div class="col-sm-8 invoice-col">
      <?php  $extension=substr($data->others,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="{{asset($data->others)}}"></iframe>
     <?php }else{ ?>
       <img style="height: 90%;width:100%;" src="{{asset($data->others)}}" alt="">
     <?php } ?>
    </div>
    </div>
<?php
 $approve=DB::table('approvals')->where('applicant_id',$data->applicant_id)->first();
 ?>

  <div class="row">
    <div class="col-xs-12">
     @if(Auth::user()->user_type == "S")
   <a href="{{url('admin/print/'.$id)}}" target="_blank" class="btn btn-primary"><i class="fa fa-undo"></i> Reject</a>
   <a href="{{url('admin/application/'.$data->applicant_id.'/approve')}}" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
   @endif
   @if(Auth::user()->user_type == "D"&&$approve->councillor=='0')
   <a href="{{url('admin/print/'.$id)}}" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> @lang('fleet.print')</a>
   <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i>@lang('Reject')</button>
   <a href="{{url('admin/application/'.$data->applicant_id.'/councillor_approve')}}" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
   @endif
   @if(Auth::user()->user_type == "A"&&$approve->accountant=='0')
   <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i>@lang('Reject')</button>
   <a href="{{url('admin/application/'.$data->applicant_id.'/councillor_approve')}}" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
   @endif

  </div>
  </div>
</div>
<!-- Modal -->
<div id="import" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Reject Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'councillor.reject','method'=>'POST','files'=>true]) !!}
        <div class="form-group">
          {!! Form::label('excel',__('Write Reason below'),['class'=>"form-label"]) !!}
        </div>
        <div class="form-group">
          <input type="hidden" name="applicant_id" value="{{$data->applicant_id}}">
          <textarea name="reason" rows="8" cols="65"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="submit">@lang('Submit')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal -->
@endsection
