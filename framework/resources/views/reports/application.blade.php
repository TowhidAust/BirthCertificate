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
<li class="breadcrumb-item"><a href="#">@lang('menu.reports')</a></li>
<li class="breadcrumb-item active">@lang('Application') @lang('fleet.report')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Application Report
        </h3>
      </div>

      <div class="card-body">
        {!! Form::open(['route' => 'applicaton_report_post','method'=>'post','class'=>'form-inline']) !!}
        <div class="row">
          <div class="form-group">
            {!! Form::label('date1','From') !!}
            <div class="input-group date">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
              {!! Form::text('date1', $date1,['class' => 'form-control','placeholder'=>__('fleet.start_date'),'required']) !!}
            </div>
          </div>
          <div class="form-group" style="margin-right: 10px">
            {!! Form::label('date2','To') !!}
            <div class="input-group date">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
              {!! Form::text('date2', $date2,['class' => 'form-control','placeholder'=>__('fleet.end_date'),'required']) !!}
            </div>
          </div>

          <div class="form-group" style="margin-right: 5px">
            {!! Form::label('ward_name', __('Ward NO'), ['class' => 'form-label']) !!}
            <select id="ward_name" name="ward_name" class="form-control vehicles" style="width: 150px">
              <option value="">Select Ward NO</option>
              @foreach($wards as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-info" style="margin-right: 1px">@lang('fleet.generate_report')</button>
          <!-- <button type="submit" formaction="{{url('admin/print-booking-report')}}" class="btn btn-danger"><i class="fa fa-print"></i> @lang('fleet.print')</button> -->
        </div>
        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">
        @lang('fleet.report')
        </h3>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover"  id="myTable">
            <thead>
              <tr>
                <th> Application ID</th>
                <th> Birth ID</th>
                <th> Ward Name</th>
                <th> Name Bangla</th>
                <th>Name English</th>
                <th>Number</th>
                <th>Birth Date</th>
                <th>Gender</th>
                <th>Status</th>
              </tr>
          </thead>

          <tbody>

            @foreach($pending_applican_info as $row)
            <tr>
              <td>{{$row->applicant_id}}</td>
              <td>{{$row->birth_id}}</td>
              <td>{{$row->ward_name}}</td>
              <td>{{$row->bangla_name}}</td>
              <td>{{$row->english_name}}</td>
              <td>{{$row->number}}</td>
              <td>{{$row->birth_date}}</td>
              <td>{{$row->gender}}</td>
              <td><span class="badge badge-secondary">{{$row->status}}</span></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th> Application ID</th>
              <th> Birth ID</th>
              <th> Ward Name</th>
              <th> Name Bangla</th>
              <th>Name English</th>
              <th>Number</th>
              <th>Birth Date</th>
              <th>Gender</th>
              <th>Status</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection


@section("script")

<script type="text/javascript" src="{{ asset('assets/js/cdn/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cdn/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#customer_id').select2();
    $('#vehicle_id').select2();
    $('#myTable tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="'+title+'" />' );
    });
    var myTable = $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [{
             extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                ]}
        ],

        "language": {
                 "url": '{{ __("fleet.datatable_lang") }}',
              },
        "initComplete": function() {
                myTable.columns().every(function () {
                  var that = this;
                  $('input', this.footer()).on('keyup change', function () {
                      that.search(this.value).draw();
                  });
                });
              }
    });
    $('#date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

    $('#date1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

    $('#date2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  });
</script>
@endsection
