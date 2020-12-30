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
<li class="breadcrumb-item"><a href="{{ route("drivers.index")}}">Councillor Edit</a></li>
<li class="breadcrumb-item active">Councillor Edit</li>

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Councillor Edit</h3>
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

        {!! Form::open(['route' => ['drivers.update',$driver->id],'files'=>true,'method'=>'PATCH']) !!}
        {!! Form::hidden('id',$driver->id) !!}
        {!! Form::hidden('edit',"1") !!}
        {!! Form::hidden('detail_id',$driver->getMeta('id')) !!}
        {!! Form::hidden('user_id',Auth::user()->id) !!}
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('first_name', __('fleet.firstname'), ['class' => 'form-label required']) !!}
              {!! Form::text('first_name', $driver->getMeta('first_name'),['class' => 'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('last_name', __('fleet.lastname'), ['class' => 'form-label required']) !!}
              {!! Form::text('last_name', $driver->getMeta('last_name'),['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('address', __('fleet.address'), ['class' => 'form-label required']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book-o"></i></span>
                </div>
                {!! Form::text('address', $driver->getMeta('address'),['class' => 'form-control','required']) !!}
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('email', __('fleet.email'), ['class' => 'form-label required']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                {!! Form::email('email', $driver->email,['class' => 'form-control','required']) !!}
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('contract_number', __('fleet.contract'), ['class' => 'form-label']) !!}
              {!! Form::text('contract_number', $driver->getMeta('contract_number'),['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('gender', __('fleet.gender') , ['class' => 'form-label']) !!}<br>
              <input type="radio" name="gender" class="flat-red gender" value="1" @if($driver->getMeta('gender')== 1) checked @endif> @lang('fleet.male')<br>
              <input type="radio" name="gender" class="flat-red gender" value="0" @if($driver->getMeta('gender')== 0) checked @endif> @lang('fleet.female')
            </div>
            <div class="form-group">
              {!! Form::label('driver_image', __('Proofile Image'), ['class' => 'form-label']) !!}
              @if($driver->getMeta('driver_image') != null)
              <a href="{{ asset('uploads/'.$driver->getMeta('driver_image')) }}" target="_blank">View</a>
              @endif
              {!! Form::file('driver_image',null,['class' => 'form-control','required']) !!}
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('econtact', __('fleet.emergency_details'), ['class' => 'form-label']) !!}
              {!! Form::textarea('econtact',$driver->getMeta('econtact'),['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="col-md-12">
          {!! Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']) !!}
          <a href="{{route("drivers.index")}}" class="btn btn-danger" >@lang('fleet.back')</a>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@section("script")
<script src="{{ asset('assets/js/moment.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.code').select2();
  $('#vehicle_id').select2();
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

  //Flat green color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  });

});
</script>
@endsection
