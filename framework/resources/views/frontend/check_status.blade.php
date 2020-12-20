@include('frontend.header')
  <section class="mainContents">

    @include('frontend.navbar')

    <div class="sidebarAndContents container mt-3">





        <div class="row">
          <!-- First col -->
          <div class="col-md-6">
            <form action="{{route('verify')}}" method="post" enctype="multipart/form-data">
               {{csrf_field() }}
            <div class="mt-3">
                <label class="text-black" for="">জন্ম রেকর্ডটি যাচাই করতে জন্ম নিবন্ধন নম্বর  এবং ব্যক্তির জন্মের তারিখ লিখুন</label>
            </div>
            <div class="mt-3">
              <label for="">জন্ম নিবন্ধন নম্বর</label>
              <input class="form-control"  name="application_id" type="text" required>
            </div>
            <div class="mt-3">
              <label for=""> জন্ম তারিখঃ খ্রিঃ </label>
              <input class="form-control" id="date" name="birth_date" type="date" required>
            </div>
            <div class="mt-3 verify">
             <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
               <button class="btn btn-success verify-botton">Verify</button>
            </div>
              </form>
          </div>


          <!-- 2nd col -->
          <div class="col-md-6">
            <div class="mt-3">
              <label for=""> <b>বিস্তারিত তথ্য </b> </label>
              <h5>@if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                  {!! session('error') !!}
                </div>
                @endif</h5>
              <h5>@if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                  {!! session('message') !!}
                </div>
                @endif</h5>
            @if($data)
            @if($data->status!="Completed")
            <div class="alert alert-info" role="alert">
            {{$data->application_status}}
            </div>
            @endif
            <p>Enrollment ID : {{$data->id}}</p>
            <p>Birth Certificate ID : {{$data->birth_id}}</p>
            <p>Bangla Name : {{$data->bangla_name}}</p>
            <p>English Name : {{$data->english_name}}</p>
            <p>Date of birth : {{$data->birth_date}}</p>
            <p>Gender : {{$data->gender}}</p>
            @endif
            </div>
          </div>
    </div>
  </section>
  <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
@include('frontend.footer')
