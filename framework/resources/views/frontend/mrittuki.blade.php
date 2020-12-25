
  @include('frontend.header')
    <section class="mainContents">
        @include('frontend.navbar')
        <div class="sidebarAndContents container mt-3">
            <div class="row">
                <div class="col-md-4">
                    @include('frontend.sidebar')
                </div>
                <div class="col-md-8">
                  <div class="header">
                      <h3>প্রশ্ন: মৃত্যু নিবন্ধন কি?</h3>
                      <p>উত্তর: মৃত্যু নিবন্ধন হলো মৃত ব্যক্তির নাম, মৃত্যুর তারিখ, মৃত্যুর স্থান, লিঙ্গ, পিতা বা মাতা বা স্বামী অথবা স্ত্রীর নাম নির্ধারিত নিবন্ধক কর্তৃক খাতায়/রেজিস্টারে লেখা এবং মৃত্যু সনদ প্রদান করা।</p>
                  </div>
               </div>
        </div>
      </div>
    </section>

    <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
    @include('frontend.footer')
