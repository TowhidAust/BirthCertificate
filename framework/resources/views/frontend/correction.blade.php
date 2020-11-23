<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/birthform.css')}}">
    <link rel="stylesheet" href="./birthform.css">
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
                  <input type="text" name="" id="">
                  </div>
                </div>
                <div class="mt-3 birthInfoCheck">
                  <h3>জন্ম তথ্য যাচাই</h3>
                   <p>Enter the birth registration number and the date of birth of the person.</p>
                    <label for=""> Birth Registration Number </label>
                    <input class="form-control" type="text">

                    <label for=""> Date of Birth </label>
                    <input class="form-control" type="date">
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
</html>
