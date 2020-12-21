@extends('layouts.app')
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">@lang('Correction')</a></li>
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
        <span><h5>@if (Session::has('complete'))
              <div class="alert alert-success" role="alert">
                {!! session('complete') !!}
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
          <p class="text-muted well well-sm " style="margin-top: 10px;">  Birth ID : {{$data->birth_id}}  </p>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Bangla Name : {{$data->name}}  </p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">  Birth Day : {{$data->birth_date}}  </p>
    </div>
    <div class="col-sm-6 invoice-col">
        <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
        <p class="text-muted well well-sm " style="margin-top: 10px;">  Application ID : {{$data->id}}  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Application Status : <span class="badge badge-secondary">{{$data->status}}</span>  </p>
      <p class="text-muted well well-sm " style="margin-top: 10px;">  Payment Status : <span class="badge badge-secondary">@if($data->payment_status=='0') Unpaid @else Paid @endif</span>  </p>


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
      <p class="text-muted well well-sm " style="margin-top: 10px;">    </p>
       @if(!empty($data->file))
      <?php  $extension=substr($data->file,-3);
      if($extension=='pdf'){
       ?>
       <iframe width="100%" height="500px" src="{{asset($data->file)}}"></iframe>
     <?php }else{ ?>

       <img style="height: 90%;width:100%" src="{{asset($data->file)}}" alt="">

     <?php } ?>
        @endif
    </div>
  </div>
    <h3>Correction Information</h3>
    <div class="row">
      <div class="col-sm-12 invoice-col">
        <table class="table table-bordered" id="dynamic_field">
           <tr>
             <td>Present infomation</td>
             <td>Correction Infomation</td>
           </tr>
           @foreach($corrections as $row)
             <tr>
                  <td>{{$row->present}}</td>
                    <td>{{$row->correction}}</td>
             </tr>
             @endforeach
        </table>
      </div>
    </div></br>
  <h3>Supported Documents</h3>
   @foreach($documents as $data)
   <div class="row">
     <div class="col-sm-10 invoice-col" style="padding:5%;">
       <?php  $extension=substr($data->file,-3);
       if($extension=='pdf'){
        ?>
        <iframe width="100%" height="500px" src="{{asset($data->file)}}"></iframe>
      <?php }else{ ?>

        <img style="height: 90%;width:100%" src="{{asset($data->file)}}" alt="">

      <?php } ?>
     </div>
   </div>
   @endforeach


  <div class="row">
    <div class="col-xs-12">
      @if(Auth::user()->user_type == "D" && $approve->councillor!='1')
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> @lang('Reject')</button>
      <a href="{{url('admin/correction/'.$id.'/approve')}}" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
      @elseif(Auth::user()->user_type == "A"&&$approve->accountant!='1')
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> @lang('Reject')</button>
      <a href="{{url('admin/application/'.$id.'/approve')}}" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
      @elseif(Auth::user()->user_type == "O"&&$approve->officer!='1')
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> @lang('Reject')</button>
      <a href="{{url('admin/application/'.$id.'/approve')}}" target="_blank" class="btn btn-success"><i class="fa fa-send"></i> Approve</a>
      @elseif(Auth::user()->user_type == "OP"&&$approve->operator!='1')
      <button data-toggle="modal" data-target="#import" class="btn btn-danger"><i class="fa fa-undo"></i> @lang('Reject')</button>
      <button data-toggle="modal" data-target="#complete" class="btn btn-success"><i class="fa fa-send"></i> Approve</button>
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
        {!! Form::open(['route'=>'reject_correction','method'=>'POST','files'=>true]) !!}
        <div class="form-group">
          {!! Form::label('excel',__('Write Reason below'),['class'=>"form-label"]) !!}
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="{{$id}}">
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
<!-- Modal -->
<div id="complete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Complete Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'complete','method'=>'POST','files'=>true]) !!}
        <div class="form-group">
          {!! Form::label('excel',__('Enter Birth ID *'),['class'=>"form-label"]) !!}
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="{{$data->id}}">
          <input class="form-control" type="text" name="birth_id" value="" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit">@lang('Submit')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal -->
@endsection
