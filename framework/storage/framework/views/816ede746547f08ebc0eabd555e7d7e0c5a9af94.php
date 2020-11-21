<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/birthform.css')); ?>">
  <!-- <link rel="stylesheet" href="<?php echo e(asset('frontend/css/new.css')); ?>"> -->
  <title>Birth Certificate</title>
</head>

<body>
  <section class="headerSection">
    <div class="d-flex flex-row justify-content-center align-items-center">
      <img class="img-fluid logoImg" src="https://1.bp.blogspot.com/-ym26csnYYR8/XXnmanyREUI/AAAAAAAADxI/Bmf_fg2ny3EfA11_3wDhlpyalvEi7zhIQCLcBGAsYHQ/s320/Government%2Bof%2BBangladesh%2BLogo%2BEnglish.png" alt="logo">
      <div class="headerContent">
        <h3>রেজিস্ট্রার জেনারেলের কার্যালয়, জন্ম ও মৃত্যু নিবন্ধন</h3>
        <h4>স্থানীয় সরকার বিভাগ</h4>
      </div>
      <img class="img-fluid logoImg" src="http://br.lgd.gov.bd/images/jonmo.jpg" alt="logo">
    </div>
  </section>

  <section class="mainContents">

    <div class="navBar">
      <nav class="navbar navbar-expand-lg navbar-dark position-sticky">
        <a class="navbar-brand" href="../index.html">জন্ম ও মৃত্যু নিবন্ধন</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navLinksDiv" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
          </div>
        </div>
      </nav>
    </div>

    <div class="sidebarAndContents container mt-3">

      <form action="POST">

        <div class="Applyform_header d-flex justify-content-between align-items-center">
          <div class="avatarImage">
            <img width="200" height="200" src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar">
          </div>

          <div class="applyNo">
            <label for="">বিনামূল্যে বিতরনের জন্য অনলাইনের মাধ্যমে/ফটোকপি/হাতে লিখা/কম্পিউটার প্রিন্ট কপি গ্রহনযোগ্য আবেদন পত্র নম্বর</label>
            <input class="form-control" type="text" name="" id="">
          </div>
        </div>


        <div class="row">

          <!-- First col -->
          <div class="col-md-6">
            <div class="mt-3">
              <label for="">নিবন্ধন কার্যালয়ের নামঃ </label>
              <input class="form-control" type="text">
            </div>
            <div class="mt-3">
              <label for="">নিবন্ধনাধীন ব্যক্তির পরিচিতিঃ (নাম বাংলায়) </label>
              <input class="form-control" type="text">
            </div>
            <div class="mt-3">
              <label for="">Name in english:(capital letters) </label>
              <input class="form-control" type="text">
            </div>

            <div class="mt-3">
              <label for=""> জন্ম তারিখঃ খ্রিঃ </label>
              <input class="form-control" type="text">
            </div>
            <div class="mt-3">
              <label for=""> পিতা ও মাতার কততম সন্তানঃ </label>
              <input class="form-control" type="text">
            </div>

            <div class="mt-3">
              <label for=""> লিঙ্গঃ </label>
              <select class="form-control" name="" id="">
                <option value="">পুরুষ</option>
                <option value="">নারী</option>
                <option value="">তৃতীয় লিঙ্গ</option>
              </select>
            </div>

            <!-- পিতামাতা -->
            <div class="mt-3">
              <h3>পিতা ও মাতার বিবরনঃ (বাংলায়)</h3>
              <label class="mt-3" for=""> পিতার নামঃ (বাংলায়) </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> পিতার নামঃ (ইংরেজীতে) (CAPITAL LETTERS) </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জন্ম নিবন্ধন নম্বরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জাতীয় পরিচয়পত্র নম্বরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> বিদেশে অবস্থান করলে পাসপোর্ট নম্বরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জাতীয়তাঃ (বাংলাদেশী ব্যাতীত ভিন্ন হইলে) </label>
              <input class="form-control" type="text">




              <!-- মাতা -->
              <label class="mt-3" for=""> মাতার নামঃ (বাংলায়) </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> মাতার নামঃ (ইংরেজীতে) (CAPITAL LETTERS) </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জন্ম নিবন্ধন নম্বরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জাতীয় পরিচয়পত্র নম্বরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> বিদেশে অবস্থান করলে পাসপোর্ট নম্বরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জাতীয়তাঃ (বাংলাদেশী ব্যাতীত ভিন্ন হইলে) </label>
              <input class="form-control" type="text">

            </div>




            <!-- বর্তমান ঠিকানা -->
            <div class="mt-3">
              <h3>বর্তমান ঠিকানাঃ (বাংলায়)</h3>
              <label class="mt-3" for=""> বাসা ও সড়কঃ (নাম নম্বর) </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> গ্রাম/পাড়া/মহল্লাঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> ইউনিয়ন/ওয়ার্ডঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> ডাকঘরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> পোষ্ট কোডঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> উপজেলাঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জেলাঃ </label>
              <input class="form-control" type="text">
            </div>


            <div class="mt-3">
              <h3>বর্তমান ঠিকানাঃ (ইংরেজীতে)</h3>
              <label class="mt-3" for=""> House/Road Name, No </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Village/ Area/ Town </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Union/Ward </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Post Office </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Post Code </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Upozila </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> District </label>
              <input class="form-control" type="text">
            </div>
          </div>

          <!-- 2nd col -->
          <div class="col-md-6">
            <h3 class="mt-3">জন্মস্থানের ঠিকানাঃ (বাংলায়)</h3>
            <label class="mt-3" for=""> বাসা ও সড়কঃ (নাম নম্বর) </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> গ্রাম/পাড়া/মহল্লাঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> ইউনিয়ন/ওয়ার্ডঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> ডাকঘরঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> পোষ্ট কোডঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> উপজেলাঃ </label>
            <input class="form-control" type="text">

            <label class="mt-3" for=""> জেলাঃ </label>
            <input class="form-control" type="text">

            <div class="mt-3">
              <h3>জন্মস্থানের ঠিকানাঃ (ইংরেজীতে)</h3>
              <label class="mt-3" for=""> House/Road Name, No </label>
              <input class="form-control" type="text">
              <label class="mt-3" for=""> Village/ Area/ Town </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Union/Ward </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Post Office </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Post Code </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Upozila </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> District </label>
              <input class="form-control" type="text">
            </div>


            <!-- স্থায়ী ঠিকানা -->
            <div class="mt-3">
              <h3>স্থায়ী ঠিকানাঃ (বাংলায়)</h3>
              <label class="mt-3" for=""> বাসা ও সড়কঃ (নাম নম্বর) </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> গ্রাম/পাড়া/মহল্লাঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> ইউনিয়ন/ওয়ার্ডঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> ডাকঘরঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> পোষ্ট কোডঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> উপজেলাঃ </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> জেলাঃ </label>
              <input class="form-control" type="text">
            </div>


            <div class="mt-3">
              <h3>স্থায়ী ঠিকানাঃ (ইংরেজীতে)</h3>
              <label class="mt-3" for=""> House/Road Name, No </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Village/ Area/ Town </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Union/Ward </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Post Office </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Post Code </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> Upozila </label>
              <input class="form-control" type="text">

              <label class="mt-3" for=""> District </label>
              <input class="form-control" type="text">
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
          </div>






      </form>
    </div>
  </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html><?php /**PATH C:\xampp\htdocs\BirthCertificate\framework\resources\views/frontend/application_form.blade.php ENDPATH**/ ?>