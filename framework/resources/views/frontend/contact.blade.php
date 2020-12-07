
  @include('frontend.header')
    <section class="mainContents">
        @include('frontend.navbar')
        <div class="sidebarAndContents container mt-3">
            <div class="row">
               
                <div class="col-md-12">
                   
                    <div class="contactInfo">
                        <h3>CONTACT US</h3>
                        <hr>


                        <div class="logo">
                            <h4>RioLeaf IT</h4>
                            <span><i class="fab fa-facebook"></i></span>
                            <span><i class="fab fa-twitter"></i></span>
                            <span><i class="fab fa-linkedin"></i></span>
                        </div>
                        <div class="contactInner">
                            <div class="location">
                                <i class="fas fa-location-arrow"></i>
                                <span>7/35B,70 Bir Uttam C.R Dutta Road</span>
                                <span>Estern Plaza, HatirPool, Dhaka-1205, Bangladesh</span>
                            </div>

                            <div class="email">
                                
                                <i class="fas fa-envelope"></i>
                                <span>info@rioleafit.com</span>
                            </div>
                            <div class="phone">
                                <i class="fas fa-phone"></i>
                                <span>+880-9678467317</span>
                            </div>
                        </div>

                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    @include('frontend.footer')
