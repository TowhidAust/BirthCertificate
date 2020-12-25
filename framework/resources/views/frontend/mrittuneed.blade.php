
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
                      <h3>প্রশ্ন: মৃত্যু নিবন্ধন কি কি কাজে লাগে?</h3>
                      <p>উত্তর: মৃত ব্যক্তির সম্পত্তি বণ্টন, পারিবারিক পেনশন প্রাপ্তি প্রভৃতি কাজের জন্য মৃত্যু নিবন্ধন প্রয়োজন। তদুপরি মৃত্যু নিবন্ধিত না হলে দেশের প্রকৃত জনসংখ্যা নির্ণয় সম্ভব হবে না। মৃত্যু নিবন্ধন করতে হলে মৃত ব্যক্তির জন্ম নিবন্ধন থাকতে হবে। জন্ম নিবন্ধন করা না থাকলে জন্ম নিবন্ধন সম্পাদনের পর মৃত্যু নিবন্ধন করতে হবে।</p>
                  </div>
               </div>
        </div>
      </div>
    </section>

    <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
    @include('frontend.footer')
