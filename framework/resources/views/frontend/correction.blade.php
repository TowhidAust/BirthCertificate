@include('frontend.header')

<section class="mainContents">

  @include('frontend.navbar')

  <div class="sidebarAndContents container mt-3">



    <form action="POST">
      <div class="mt-3">
        <h3>জন্ম/মৃত্যু সনদ বাতিল/ সংশোধনের আবেদন</h3>
        <!-- <p>Enter the birth registration number and the date of birth of the person.</p> -->

        <div class="row">
          <div class="col-md-6 dashed">
            <label for=""> জন্ম/মৃত্যু নিবন্ধন নম্বরঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> জন্ম/মৃত্যু নিবন্ধনের তারিখঃ </label>
            <input class="form-control" type="date">

            <label class="mt-3" for=""> নিবন্ধিত ব্যক্তির নামঃ </label>
            <input class="form-control" type="date">

            <label class="mt-3" for=""> জন্ম/মৃত্যু তারিখঃ </label>
            <input class="form-control" type="date">

            <label class="mt-5" for=""> সংযুক্তিঃ </label>
            <span class="bg-info p-1 ml-2 rounded text-white" style="cursor: pointer;">+</span>
            <hr>
            <div class="mt-2">
              <span>সংযুক্তি ১.</span> <input class="form-control" type="text">
            </div>
            <div class="mt-2">
              <span> সংযুক্তি 2.</span> <input class="form-control" type="text">
            </div>
            <div class="mt-2">
              <span> সংযুক্তি 3.</span> <input class="form-control" type="text">
            </div>


          </div>
          <div class="col-md-6 dashed wrong-info-details">
            <div for=""> ভুল তথ্যের বিবরনঃ </div>
            <hr>

            <label class="mt-3" for=""> বিদ্যমান তথ্যঃ </label>
            <!-- <input class="form-control" type="text"> -->
            <textarea class="d-block" name="" id="" cols="60" rows="5"></textarea>


            <label class="mt-3" for=""> সংশোধনীয় তথ্যঃ </label>
            <!-- <input class="form-control" type="text"> -->
            <textarea  class="d-block" name="" id="" cols="60" rows="5"></textarea>

            <label class="mt-3" for=""> সংশোধনের কারনঃ </label>
            <!-- <input class="form-control" type="text"> -->
            <textarea  class="d-block" name="" id="" cols="60" rows="5"></textarea>


            <label class="mt-3" for=""> সনদের কপি বিতরনের সম্ভাব্য তারিখঃ </label>
            <input class="form-control" type="date">

            <div class="d-flex justify-content-start align-items-center mt-3"> 
              <input class="mr-3" type="checkbox"> <div>আমি সজ্ঞানে ঘোষণা করিতেছি যে উপরিউক্ত সকল তথ্য সত্য</div></div>
          </div>

          <div class="col-md-12 dashed">
            <h3>নিবন্ধকের কার্যালয় কর্তৃক পুরণীয়ঃ </h3>

            <label class="mt-3" for=""> নিবন্ধিত ব্যক্তির নামঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> আবেদনকারীর নামঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> সনদের কপি বিতরনের সম্ভাব্য তারিখঃ </label>
            <input class="form-control" type="date">
          </div>
        </div>

      </div>
    </form>
  </div>

  <div class="submit d-flex justify-content-end p-3">
    <a class="btn btn-primary" href="#">Next</a>
  </div>
</section>

<footer class="copyrightFooter">
  <span> &copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
</footer>
@include('frontend.footer')