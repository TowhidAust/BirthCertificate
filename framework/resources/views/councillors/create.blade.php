@extends('layouts.app')
@section('extra_css')
  <!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
<style type="text/css">
  .select2-selection{
    height: 38px !important;
  }
</style>
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("councillor")}}">@lang('Councillor')</a></li>
<li class="breadcrumb-item active">@lang('Add Councillor')</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header with-border">
        <h3 class="card-title">@lang('Add Councillor')</h3>
      </div>

      <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        {!! Form::open(['route' => 'councillor.store','files'=>true,'method'=>'post']) !!}
        {!! Form::hidden('is_active',0) !!}
        {!! Form::hidden('is_available',0) !!}
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('first_name', __('fleet.firstname'), ['class' => 'form-label required','autofocus']) !!}
              {!! Form::text('first_name', null,['class' => 'form-control','required','autofocus']) !!}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('last_name', __('fleet.lastname'), ['class' => 'form-label required']) !!}
              {!! Form::text('last_name', null,['class' => 'form-control','required']) !!}
            </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                {!! Form::label('address', __('fleet.address'), ['class' => 'form-label required']) !!}
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-address-book-o"></i></span>
                  </div>
                  {!! Form::text('address', null,['class' => 'form-control','required']) !!}
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('email', __('fleet.email'), ['class' => 'form-label required']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                {!! Form::email('email', null,['class' => 'form-control','required']) !!}
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('contract_number', __('fleet.contract'), ['class' => 'form-label']) !!}
              {!! Form::text('contract_number', null,['class' => 'form-control','required']) !!}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('password', __('fleet.password'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                {!! Form::password('password', ['class' => 'form-control','required']) !!}
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">


            <div class="form-group">
            {!! Form::label('Ward Number', __('Ward Number') , ['class' => 'form-label']) !!}<br>

              <select class="form-control" name="ward" required>
                <option value="">Select Ward</option>
                @foreach($wards as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              {!! Form::label('gender', __('fleet.gender') , ['class' => 'form-label']) !!}<br>
              <input type="radio" name="gender" class="flat-red gender" value="1" checked> @lang('fleet.male')<br>

              <input type="radio" name="gender" class="flat-red gender" value="0"> @lang('fleet.female')
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('econtact', __('fleet.emergency_details'), ['class' => 'form-label']) !!}
              {!! Form::textarea('econtact',null,['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="col-md-12">
          {!! Form::submit(__('Save'), ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@section("script")
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.code').select2();
  $('#vehicle_id').select2();
  $("#first_name").focus();
  $('#end_date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#exp_date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#issue_date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#start_date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

});

  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
</script>
@endsection
