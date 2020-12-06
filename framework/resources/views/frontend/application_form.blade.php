@include('frontend.header')
  <section class="mainContents">

    @include('frontend.navbar')

    <div class="sidebarAndContents container mt-3">

      <form action="{{route('application')}}" method="post" enctype="multipart/form-data">
         {{csrf_field() }}

        <div class="Applyform_header d-flex justify-content-between align-items-center">
          <div class="avatarImage">
            <img class="img-fluid img-thumbnail" width="200" height="200" src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar">
          </div>

          <div class="applyNo">
            <label class="text-white" for="">বিনামূল্যে বিতরনের জন্য অনলাইনের মাধ্যমে/ফটোকপি/হাতে লিখা/কম্পিউটার প্রিন্ট কপি গ্রহনযোগ্য আবেদন পত্র নম্বর</label>
            <input class="form-control" type="text" name="" id="">
          </div>
        </div>


        <div class="row">

          <!-- First col -->
          <div class="col-md-6">
            <div class="mt-3">
              <label for="">নিবন্ধন কার্যালয়ের নামঃ </label>
              <input class="form-control" name="applican_name" type="text">
            </div>
            <div class="mt-3">
              <label for="">নিবন্ধনাধীন ব্যক্তির পরিচিতিঃ (নাম বাংলায়) </label>
              <input class="form-control" name="bangla_name" type="text" required>
            </div>
            <div class="mt-3">
              <label for="">Name in english:(capital letters) </label>
              <input class="form-control" name="english_name" type="text" required>
            </div>

            <div class="mt-3">
              <label for=""> জন্ম তারিখঃ খ্রিঃ </label>
              <input class="form-control" name="birth_date" type="date" required>
            </div>

            <div class="mt-3">
              <label for=""> ফোন নম্বর</label>
              <input class="form-control" name="number" type="number" required>
            </div>
            <div class="mt-3">
              <label for=""> পিতা ও মাতার কততম সন্তানঃ </label>
              <input class="form-control" name="sons_position" type="text" required>
            </div>

            <div class="mt-3">
              <label for=""> লিঙ্গঃ </label>
              <select class="form-control" name="gender" id="" required>
                <option value="পুরুষ">পুরুষ</option>
                <option value="নারী">নারী</option>
                <option value="তৃতীয় লিঙ্">তৃতীয় লিঙ্গ</option>
              </select>
            </div>

            <!-- পিতামাতা -->
            <div class="mt-3">
              <h3>পিতা ও মাতার বিবরনঃ (বাংলায়)</h3>
              <label class="mt-3" for=""> পিতার নামঃ (বাংলায়) </label>
              <input class="form-control" type="text" name="father_name_bn">

              <label class="mt-3" for=""> পিতার নামঃ (ইংরেজীতে) (CAPITAL LETTERS) </label>
              <input class="form-control" type="text" name="father_name_en">

              <label class="mt-3" for=""> জন্ম নিবন্ধন নম্বরঃ </label>
              <input class="form-control" type="text" name="father_birth_id">

              <label class="mt-3" for=""> জাতীয় পরিচয়পত্র নম্বরঃ </label>
              <input class="form-control" type="text" name="father_nid">

              <label class="mt-3" for=""> বিদেশে অবস্থান করলে পাসপোর্ট নম্বরঃ </label>
              <input class="form-control" type="text" name="father_passport">

              <label class="mt-3" for=""> জাতীয়তাঃ (বাংলাদেশী ব্যাতীত ভিন্ন হইলে) </label>
              <input class="form-control" type="text" name="father_nationality">




              <!-- মাতা -->
              <label class="mt-3" for=""> মাতার নামঃ (বাংলায়) </label>
              <input class="form-control" type="text" name="mother_name_bn">

              <label class="mt-3" for=""> মাতার নামঃ (ইংরেজীতে) (CAPITAL LETTERS) </label>
              <input class="form-control" type="text" name="mother_name_en">

              <label class="mt-3" for=""> জন্ম নিবন্ধন নম্বরঃ </label>
              <input class="form-control" type="text" name="mother_birth_id">

              <label class="mt-3" for=""> জাতীয় পরিচয়পত্র নম্বরঃ </label>
              <input class="form-control" type="text" name="mother_nid">

              <label class="mt-3" for=""> বিদেশে অবস্থান করলে পাসপোর্ট নম্বরঃ </label>
              <input class="form-control" type="text" name="mother_passport">

              <label class="mt-3" for=""> জাতীয়তাঃ (বাংলাদেশী ব্যাতীত ভিন্ন হইলে) </label>
              <input class="form-control" type="text" name="mother_nationality">

            </div>




            <!-- বর্তমান ঠিকানা -->
            <div class="mt-3">
              <h3>বর্তমান ঠিকানাঃ (বাংলায়)</h3>
              <label class="mt-3" for=""> বাসা ও সড়কঃ (নাম নম্বর) </label>
              <input class="form-control" type="text" name="p_house_no_bn">

              <label class="mt-3" for=""> গ্রাম/পাড়া/মহল্লাঃ </label>
              <input class="form-control" type="text" name="p_village_bn">

              <label class="mt-3" for=""> ইউনিয়ন/ওয়ার্ডঃ </label>
              <input class="form-control" type="text" name="p_union_bn">

              <label class="mt-3" for=""> ডাকঘরঃ </label>
              <input class="form-control" type="text" name="p_postoffice_bn">

              <label class="mt-3" for=""> পোষ্ট কোডঃ </label>
              <input class="form-control" type="text" name="p_post_code_bn">

              <label class="mt-3" for=""> উপজেলাঃ </label>
              <input class="form-control" type="text" name="p_police_station_bn">

              <label class="mt-3" for=""> জেলাঃ </label>
              <input class="form-control" type="text" name="p_district_bn">
            </div>


            <div class="mt-3">
              <h3>বর্তমান ঠিকানাঃ (ইংরেজীতে)</h3>
              <label class="mt-3" for=""> House/Road Name, No </label>
              <input class="form-control" type="text" name="p_house_no_en">

              <label class="mt-3" for=""> Village/ Area/ Town </label>
              <input class="form-control" type="text" name="p_village_en">

              <label class="mt-3" for=""> Union/Ward </label>
              <input class="form-control" type="text" name="p_union_en">

              <label class="mt-3" for=""> Post Office </label>
              <input class="form-control" type="text" name="p_postoffice_en">

              <label class="mt-3" for=""> Post Code </label>
              <input class="form-control" type="text" name="p_post_code_en">

              <label class="mt-3" for=""> Upozila </label>
              <input class="form-control" type="text" name="p_police_station_en">

              <label class="mt-3" for=""> District </label>
              <input class="form-control" type="text" name="p_district_en">
            </div>

            <div class="mt-3">
              <h3>সমর্থনকারী কাগজপত্র</h3>
              <label class="mt-3" for="">পিতা  জাতীয় পরিচয়পত্র </label>
              <input class="form-control" type="file" name="father_nid_file">

              <label class="mt-3" for="">মাতার  জাতীয় পরিচয়পত্র </label>
              <input class="form-control" type="file" name="mother_nid_file">

              <label class="mt-3" for=""> মেডিকেল রিপোর্ট / টিকা কার্ড </label>
              <input class="form-control" type="file" name="card">

              <label class="mt-3" for=""> অন্যান্য </label>
              <input class="form-control" type="file" name="others">
            </div>
          </div>

          <!-- 2nd col -->
          <div class="col-md-6">
            <h3 class="mt-3">জন্মস্থানের ঠিকানাঃ (বাংলায়)</h3>
            <label class="mt-3" for=""> বাসা ও সড়কঃ (নাম নম্বর) </label>
            <input class="form-control" type="text" name="b_house_no_bn">

            <label class="mt-3" for=""> গ্রাম/পাড়া/মহল্লাঃ </label>
            <input class="form-control" type="text" name="b_village_bn">

            <label class="mt-3" for=""> ইউনিয়ন/ওয়ার্ডঃ </label>
            <input class="form-control" type="text" name="b_union_bn">

            <label class="mt-3" for=""> ডাকঘরঃ </label>
            <input class="form-control" type="text" name="b_postoffice_bn">

            <label class="mt-3" for=""> পোষ্ট কোডঃ </label>
            <input class="form-control" type="text" name="b_post_code_bn">

            <label class="mt-3" for=""> উপজেলাঃ </label>
            <input class="form-control" type="text" name="b_police_station_bn">

            <label class="mt-3" for=""> জেলাঃ </label>
            <input class="form-control" type="text" name="b_district_bn">

            <div class="mt-3">
              <h3>জন্মস্থানের ঠিকানাঃ (ইংরেজীতে)</h3>
              <label class="mt-3" for=""> House/Road Name, No </label>
              <input class="form-control" type="text" name="b_house_no_en">

              <label class="mt-3" for=""> Village/ Area/ Town </label>
              <input class="form-control" type="text" name="b_village_en">

              <label class="mt-3" for=""> Union/Ward </label>
              <input class="form-control" type="text" name="b_union_en">

              <label class="mt-3" for=""> Post Office </label>
              <input class="form-control" type="text" name="b_postoffice_en">

              <label class="mt-3" for=""> Post Code </label>
              <input class="form-control" type="text" name="b_post_code_en">

              <label class="mt-3" for=""> Upozila </label>
              <input class="form-control" type="text" name="b_police_station_en">

              <label class="mt-3" for=""> District </label>
              <input class="form-control" type="text" name="b_district_en">
            </div>

            <!-- স্থায়ী ঠিকানা -->
            <div class="mt-3">
              <h3>স্থায়ী ঠিকানাঃ (বাংলায়)</h3>
              <label class="mt-3" for=""> বাসা ও সড়কঃ (নাম নম্বর) </label>
              <input class="form-control" type="text" name="per_house_no_bn">

              <label class="mt-3" for=""> গ্রাম/পাড়া/মহল্লাঃ </label>
              <input class="form-control" type="text" name="per_village_bn">

              <label class="mt-3" for=""> ইউনিয়ন/ওয়ার্ডঃ </label>
              <input class="form-control" type="text" name="per_union_bn">

              <label class="mt-3" for=""> ডাকঘরঃ </label>
              <input class="form-control" type="text" name="per_postoffice_bn">

              <label class="mt-3" for=""> পোষ্ট কোডঃ </label>
              <input class="form-control" type="text" name="per_post_code_bn">

              <label class="mt-3" for=""> উপজেলাঃ </label>
              <input class="form-control" type="text" name="per_police_station_bn">

              <label class="mt-3" for=""> জেলাঃ </label>
              <input class="form-control" type="text" name="per_district_bn">
            </div>


            <div class="mt-3">
              <h3>স্থায়ী ঠিকানাঃ (ইংরেজীতে)</h3>
              <label class="mt-3" for=""> House/Road Name, No </label>
              <input class="form-control" type="text" name="per_house_no_en">

              <label class="mt-3" for=""> Village/ Area/ Town </label>
              <input class="form-control" type="text" name="per_village_en">

              <label class="mt-3" for=""> Union/Ward </label>
              <input class="form-control" type="text" name="per_union_en">

              <label class="mt-3" for=""> Post Office </label>
              <input class="form-control" type="text" name="per_postoffice_en">

              <label class="mt-3" for=""> Post Code </label>
              <input class="form-control" type="text" name="per_post_code_en">

              <label class="mt-3" for=""> Upozila </label>
              <input class="form-control" type="text" name="per_police_station_en">

              <label class="mt-3" for=""> District </label>
              <input class="form-control" type="text" name="per_district_en">
            </div>

            <div class="mt-3 p-3">
            <h3>আবেদনকারীর প্রত্যয়ন (নিবন্ধনকারী ব্যাক্তি ১৮ বছরের নিম্নে বয়স্ক হলে তাহার পিতা বা মাতা বা আইনানুগ অভিভাবক বা বিধি ৯ মতে ক্ষমতাপ্রাপ্ত ব্যক্তি) নিম্নে প্রত্যয়নপূর্বক সাক্ষর/ টিপসহি প্রদান করিবেনঃ</h3>

            <label class="mt-3" for=""> নামঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> ঠিকানাঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> নিবন্ধনকারী ব্যক্তির সহিত সম্পর্কঃ </label>
            <select class="form-control" name="" id="">
              <option value="">পিতা</option>
              <option value="">মাতা</option>
              <option value="">নিজ</option>
              <option value="">পিতামহ</option>
              <option value="">পিতামহী</option>
              <option value="">মাতামহ</option>
              <option value="">মাতামহী</option>
              <option value="">ওভিভাবক</option>
              <option value="">অন্যান্য</option>

            </select>

            <label class="mt-3" for="">আইনের ২(ক) ধারা অনুযায়ী নিযুক্ত অভিভাবকের উপযুক্ত প্রমাণক সংযুক্ত করতে হইবে।</label>
            <label class="mt-3" for="">বিধিমালার ৯ ক্ষমতাপ্রাপ্ত ব্যক্তি (ক্ষমতাপ্রাপ্তির সপক্ষে উপযুক্ত আদেশনামা/প্রত্যয়নপত্র সংযুক্ত করতে হইবে।)</label>
            <label class="mt-3" for="">আমি সজ্ঞানে ঘোষণা করিতেছি যে উপরে বর্ণিত সকল তথ্য সঠিক এবং আমার/আবেদনাধীন ব্যক্তির অন্য কোথাও জন্ম নিবন্ধিত হয় নাই;হইয়া থাকিলে আমি তাহার জন্য দায়ী থাকিব।</label>

          </div>
          <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-success notika-btn-success">Submit</button>
             </div>
          </div>






      </form>
    </div>
  </section>
@include('frontend.footer')
