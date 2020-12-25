
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
                      <h3>বরিশাল সিটি কর্পোরেশন এর জন্ম ও মৃত্যু নিবন্ধন কার্যালয়ের তালিকা</h3>
                      <p>বরিশাল সিটি কর্পোরেশন এর প্রধান কার্যালয় অথবা যেকোন স্থান থেকে ফরম সংগ্রহ করে প্রধান অফিসে জমা দিন।</p>
                  </div>
               </div>
        </div>
      </div>
    </section>

    <footer class="copyrightFooter">
      <span>	&copy; 2020 Birth & Death Registration. All rights reserved. Developed by Birth and Death Registration Team.</span>
    </footer>
    @include('frontend.footer')
