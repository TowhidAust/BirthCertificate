@include('frontend.header')

<section class="mainContents">

  @include('frontend.navbar')

  <div class="sidebarAndContents container mt-3">
    <h5>@if (Session::has('message'))
      <div class="alert alert-success" role="alert">
        {!! session('message') !!}
      </div>
      @endif</h5>


    <form action="{{route('correction_submit')}}" method="post" enctype="multipart/form-data">
       {{csrf_field() }}
      <div class="mt-3">
        <h3>জন্ম/মৃত্যু সনদ বাতিল/ সংশোধনের আবেদন</h3>
        <!-- <p>Enter the birth registration number and the date of birth of the person.</p> -->

        <div class="row">
          <div class="col-md-6 dashed">
            <label for=""> জন্ম/মৃত্যু নিবন্ধন নম্বরঃ </label>
            <input class="form-control" name="birth_id" type="text" required>

            <label class="mt-3" for=""> নিবন্ধিত ব্যক্তির নামঃ </label>

            <input class="form-control" type="text" name="name" required>

              <label class="mt-3">নিবন্ধন ওয়ার্ডের নামঃ </label>
              <select class="form-control" name="ward_id" required>
                <option value="">ওয়ার্ড নির্বাচন করুন  </option>
                @foreach($wards as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>

          </div>
          <div class="col-md-6 dashed">
            <label for=""> জন্ম/মৃত্যু নিবন্ধনের তারিখঃ   </label>
            <input class="form-control" type="date" name="birth_app_date" required>

            <label class="mt-3" for=""> জন্ম/মৃত্যু তারিখঃ  </label>
            <input class="form-control" type="date" name="birth_date" required>
            <div class="d-flex justify-content-start align-items-center mt-3"> <input type="checkbox" required> <div> আমি সজ্ঞানে ঘোষণা করিতেছি যে উপরিউক্ত সকল তথ্য সত্য</div></div>
        </div>
          <!-- <div class="col-md-6 dashed">
              <label class="mt-3" for=""> জন্ম/মৃত্যু নিবন্ধনের তারিখঃ </label>
              <input class="form-control" type="date">

              <label class="mt-3" for=""> জন্ম/মৃত্যু তারিখঃ </label>
              <input class="form-control" type="date">
            </div> -->


          <div class="col-md-12 dashed">
            <h3>ভুল তথ্যের বিবরনীয়ঃ </h3>
            <div class="form-group float-lb">
                                       <div class="table-responsive">
                                            <table class="table table-bordered" id="dynamic_field">
                                               <tr>
                                                 <td>Present infomation</td>
                                                 <td>Correction Infomation</td>
                                                 <td>Add New</td>
                                               </tr>
                                                 <tr>
                                                      <td><input type="text" name="present[]" placeholder="Enter present information" class="form-control name_list" /></td>
                                                      <td><input type="text" name="correction[]" placeholder="Enter your correction" class="form-control name_list" /></td>

                                                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                                 </tr>
                                            </table>
                                       </div>
                                     </div>
          </div>
          <div class="col-md-6 dashed">
            Supported document (you can upload more documents)
          </div>
          <div class="col-md-6 dashed">
            <input type="file" name="file[]" placeholder="Enter New Tag" class="form-control name_list" required multiple />
          </div>
          <div class="col-md-6 dashed">
            <h3>ফি প্রদানের তথ্য </h3>
            <label class="mt-3" for=""> ব্যাংকের নাম </label>
            <input class="form-control" type="text" name="bank_name">

            <label class="mt-3" for="">শাখা </label>
            <input class="form-control" type="text" name="branch">

            <label class="mt-3" for=""> ক্রমিক সংখ্যা </label>
            <input class="form-control" type="text" name="transaction_id">

            <label class="mt-3" for=""> ফি প্রদানের নথি </label>
            <input class="form-control" type="file" name="payment_file">
          </div>
          <div class="col-md-6 dashed">
            <h3>নিবন্ধকের কার্যালয় কর্তৃক পুরণীয়ঃ </h3>

            <label class="mt-3" for=""> নিবন্ধিত ব্যক্তির নামঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> আবেদনকারীর নামঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> সনদের কপি বিতরনের সম্ভাব্য তারিখঃ </label>
            <input class="form-control" type="date">
          </div>

          <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-success notika-btn-success">Submit</button>
             </div>
        </div>

      </div>
    </form>
  </div>
</section>

<footer class="copyrightFooter">
  <span> &copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
</footer>
@include('frontend.footer')
