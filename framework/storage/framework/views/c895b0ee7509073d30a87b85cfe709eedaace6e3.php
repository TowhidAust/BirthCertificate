     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <div class="section-hero s-video full-height has-overlay">

       <div class="video-background grayscale">
         <div class="video-foreground">
           <!-- Youtube video -->
           <iframe src="https://www.youtube.com/embed/SOnNzT_0lkQ?controls=0&amp;showinfo=0&amp;rel=0&amp;autoplay=1&amp;loop=1&amp;playlist=SOnNzT_0lkQ" allowfullscreen="allowfullscreen"></iframe>

           <!-- Vimeo video -->
           <iframe src="https://player.vimeo.com/video/67933413?color=fcfeff&amp;title=0&amp;byline=0&amp;autoplay=1&amp;loop=1" allowfullscreen="allowfullscreen"></iframe>

           <!-- HTML5 video -->
           <video autoplay="autoplay" loop="loop" muted="" width="300" height="150">
             <source src="<?php echo e(asset('fontend/media/car3.mp4')); ?>" type="video/mp4">
               <source src="media/hero.ogv" type="video/ogg">
                 <source src="media/hero.webm" type="video/webm">
           </video>
         </div>
       </div>

       <div class="row align-middle align-justify">

           <div class="column small-12 medium-6 large-8 text-center hero-content show-for-medium">
             <h1><span class="mark">Renthire</span></h1>
             <h3>the right choice for your business</h3>
           </div>

           <div class="column small-12 medium-6 large-4">
             <div class="card bg-primary block-shadow card-booking-form mb0">
               <div class="card-section text-center">
                 <h2 class="h4">Rent a car in 60 seconds!</h2>
               </div>

               <!-- Booking form-->
               <!-- <form class="card-section form-primary flex-container flex-dir-column align-justify" action="<?php echo e(route('search_car')); ?>" action="GET"> -->
               <form class="card-section form-primary flex-container flex-dir-column align-justify"  action="<?php echo e(route('search_car')); ?>" method="POST">
             <fieldset>

                   <div class="block-header border" style="margin: 5px 0px 5px 0px;">
                     <h5 class="h5 headline" style="font-size:12px;">Pick Up</h5>
                     <hr style="border-bottom-color: #7b666699;" class="dotted">
                 </div>
                 <div class="row small-up-2 js-datepicker-group">
                   <div class="column">
                     <div class="input-group">
                       <span class="input-group">
                         <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                         <select id="district" name="district" class="input-group-field vehicles dynamic_district" data-dependent="thana" required style="width: 100%">
                           <option value="">Select District</option>
                           <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($type->city_id!='12'): ?>
                           <option value="<?php echo e($type->city_id); ?>"><?php echo e($type->city_name); ?></option>
                           <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                       </span>
                     </div>
                   </div>
                   <div class="column">
                     <div class="input-group">
                       <span class="input-group">
                         <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                         <select id="thana" name="from_thana" class="input-group-field vehicles dynamic" required style="width: 100%">
                           <option value="">Select Upzila</option>
                         </select>
                       </span>
                     </div>
                   </div>
                 </div>
                 <?php echo e(csrf_field()); ?>


               <div class="row small-up-2 js-datepicker-group">
                 <div class="column">
                   <div class="input-group">
                     <span class="input-group-label zmdi zmdi-calendar-check"></span>
                     <input class="input-group-field js-datepicker-date" name="trip_date" type="text" placeholder="Pick up date">
                   </div>
                 </div>
                 <div class="column">
                   <div class="input-group">
                     <span class="input-group-label zmdi zmdi-alarm-check"></span>
                     <input class="input-group-field js-datepicker-time" name="trip_time" type="text" placeholder="Pick up time">
                   </div>
                 </div>
               </div>
             </fieldset>
             <fieldset class="pt0">
               <label>
                 <span class="input-group">
                   <span class="input-group-label zmdi zmdi-pin-off fa fa-map-marker"></span>
                   <input class="input-group-field placeholder" type="text" name="pickup_location" placeholder="Write your pickup point" required>
                 </span>
               </label>
               <div class="block-header border" style="margin: 0px 0px 14px 0px;">
                   <h5 class="h5 headline" style="font-size:12px;">Drop</h5>
                   <hr style="border-bottom-color: #7b666699;" class="dotted">
               </div>
               <div class="row small-up-2 js-datepicker-group">
                 <div class="column">
                   <div class="input-group">
                     <span class="input-group">
                       <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                       <select id="districtto" name="districtto" class="input-group-field vehicles dynamicto_district" data-dependent="thanato" required style="width: 100%">
                         <option value="">Select District</option>
                         <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($type->city_id); ?>"><?php echo e($type->city_name); ?></option>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                     </span>
                   </div>
                 </div>
                 <div class="column">
                   <div class="input-group">
                     <span class="input-group">
                       <span  class="input-group-label zmdi zmdi-pin fa fa-map-marker"></span>
                       <select id="thanato" name="to_thana" class="input-group-field vehicles dynamic" required style="width: 100%">
                         <option value="">Select Upzila</option>
                       </select>
                     </span>
                   </div>
                 </div>
               </div>
             </fieldset>
             <!-- <fieldset class="pt0" style="margin-bottom: -10px;">
               <div class="checkbox inline">
                 <label>
                   <input type="checkbox">
                   <span class="custom-checkbox secondary"><i class="icon-check"></i>
                   </span>I have a promo code
                 </label>
               </div>
             </fieldset> -->

           <button class="button rh-button secondary flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
               <span>Book Now</span>
           </button>

           </form><!-- /end booking form-->

             </div><!-- /end .card -->
           </div><!-- /end .column -->
         </div><!-- /end .row -->
     </div><!-- /end .section-hero.s-video -->

       <!-- ===== CARDS CAROUSEL ===== -->

       <div class="section s-cards-carousel s-line">
         <div class="row overlap-large">
           <div class="column small-12">
             <div class="owl-carousel" data-owl-carousel data-button-type="rh-buttons" data-button-color="secondary primary" data-owl-options='{"autoplay": "false","smartSpeed": "600","dotsClass": "rh-owl-dots dots-dark", "responsive": {"960": {"items": "3","slideBy": "3","dots": false,"nav": "true"}}}'>

               <section class="card card-product simple block-shadow">
                 <header class="card-divider bg-white">
                   <h3 class="h4 headline">Transit F</h3>
                   <ul class="rating">
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i></li>
                   </ul>
                 </header>
                 <img src="img/fleet/card-product-01.jpg" alt="">
                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">37</span><sup>/ day</sup>
                   </div>
                   <a class="button rh-button flip-y right-vb small mb0" href="fleet-details-right-sidebar.html">
                     <i class="zmdi zmdi-link fa fa-link"></i><span>Details</span>
                   </a>
                 </div>
                 <footer class="card-section features flex-container align-middle align-spaced">
                   <div><i class="rh rh-highway rh-hw"></i></div>
                   <div><i class="rh rh-gps rh-hw"></i></div>
                   <div><i class="rh rh-steering rh-hw"></i></div>
                   <div><i class="rh rh-gearbox rh-hw"></i></div>
                 </footer>
               </section><!-- /end .card-product -->

               <section class="card card-product simple block-shadow">
                 <header class="card-divider bg-white">
                   <h3 class="h4 headline">Super Sprinter ML</h3>
                   <ul class="rating">
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                   </ul>
                 </header>
                 <img src="img/fleet/card-product-05.jpg" alt="">
                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">40</span><sup>/ day</sup>
                   </div>
                   <a class="button rh-button flip-y right-vb small mb0" href="fleet-details-right-sidebar.html">
                     <i class="zmdi zmdi-link fa fa-link"></i>
                     <span>Details</span>
                   </a>
                 </div>
                 <footer class="card-section features flex-container align-middle align-spaced">
                   <div><i class="rh rh-money-gear rh-hw"></i></div>
                   <div><i class="rh rh-steering rh-hw"></i></div>
                   <div><i class="rh rh-gearbox rh-hw"></i></div>
                 </footer>
               </section><!-- /end .card-product -->

               <section class="card card-product simple block-shadow">
                 <header class="card-divider bg-white">
                   <h3 class="h4 headline">Transit FB</h3>
                   <ul class="rating">
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i></li>
                   </ul>
                 </header>
                 <img src="img/fleet/card-product-02.jpg" alt="">
                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">38</span><sup>/ day</sup>
                   </div>
                   <a class="button rh-button flip-y right-vb small mb0" href="fleet-details-right-sidebar.html">
                     <i class="zmdi zmdi-link fa fa-link"></i>
                     <span>Details</span>
                   </a>
                 </div>
                 <footer class="card-section features flex-container align-middle align-spaced">
                   <div><i class="rh rh-money-gear rh-hw"></i></div>
                   <div><i class="rh rh-highway rh-hw"></i></div>
                   <div><i class="rh rh-gearbox rh-hw"></i></div>
                 </footer>
               </section><!-- /end .card-product -->

               <section class="card card-product simple block-shadow">
                 <header class="card-divider bg-white">
                   <h3 class="h4 headline">Super Sprinter ML</h3>
                   <ul class="rating">
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                   </ul>
                 </header>
                 <img src="img/fleet/card-product-07.jpg" alt="">
                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">44</span><sup>/ day</sup>
                   </div>
                   <a class="button rh-button flip-y right-vb small mb0" href="fleet-details-right-sidebar.html">
                     <i class="zmdi zmdi-link fa fa-link"></i>
                     <span>Details</span>
                   </a>
                 </div>
                 <footer class="card-section features flex-container align-middle align-spaced">
                   <div><i class="rh rh-highway rh-hw"></i></div>
                   <div><i class="rh rh-gps rh-hw"></i></div>
                   <div><i class="rh rh-steering rh-hw"></i></div>
                   <div><i class="rh rh-gearbox rh-hw"></i></div>
                 </footer>
               </section><!-- /end .card-product -->

               <section class="card card-product simple block-shadow">
                 <header class="card-divider bg-white">
                   <h3 class="h4 headline">Transit FB</h3>
                   <ul class="rating">
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                   </ul>
                 </header>
                 <img src="img/fleet/card-product-02.jpg" alt="">
                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">41</span><sup>/ day</sup>
                   </div>
                   <a class="button rh-button flip-y right-vb small mb0" href="fleet-details-right-sidebar.html">
                     <i class="zmdi zmdi-link fa fa-link"></i>
                     <span>Details</span>
                   </a>
                 </div>
                 <footer class="card-section features flex-container align-middle align-spaced">
                   <div><i class="rh rh-money-gear rh-hw"></i></div>
                   <div><i class="rh rh-highway rh-hw"></i></div>
                   <div><i class="rh rh-gps rh-hw"></i></div>
                   <div><i class="rh rh-steering rh-hw"></i></div>
                   <div><i class="rh rh-gearbox rh-hw"></i></div>
                 </footer>
               </section><!-- /end .card-product -->
               <section class="card card-product simple block-shadow">
                 <header class="card-divider bg-white">
                   <h3 class="h4 headline">Super Sprinter MF</h3>
                   <ul class="rating">
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i></li>
                   </ul>
                 </header>
                 <img src="img/fleet/card-product-09.jpg" alt="">
                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">42</span><sup>/ day</sup>
                   </div>
                   <a class="button rh-button flip-y right-vb small mb0" href="fleet-details-right-sidebar.html">
                     <i class="zmdi zmdi-link fa fa-link"></i>
                     <span>Details</span>
                   </a>
                 </div>
                 <footer class="card-section features flex-container align-middle align-spaced">
                   <div><i class="rh rh-steering rh-hw"></i></div>
                   <div><i class="rh rh-gearbox rh-hw"></i></div>
                 </footer>
               </section><!-- /end .card-product -->

             </div><!-- /end .owl-carousel -->
           </div><!-- /end .column -->
         </div><!-- /end .row -->
       </div><!-- /end .s-cards-carousel -->

       <!-- ===== WELCOME ===== -->

       <div class="section-boxed s-half bg-gray s-welcome">
         <div class="row expanded small-up-1 medium-up-2">
           <div class="column small-12 medium-6 medium-order-2" data-interchange="[<?php echo e(asset('fontend/img/sections/s-pattern-05.jpg')); ?>, small]">
             <article class="s-welcome-content">
               <header class="s-header">
                 <h2 class="s-headline"> Welcome<span class="s-headline-decor"></span></h2>
               </header>
               <p>Aut reiciendis culpa quidem fugit officiis blanditiis voluptatem iusto officia, aperiam porro sunt fuga itaque doloribus est dolorum voluptas, magni illo facere totam. Molestiae numquam excepturi totam, voluptatum beatae, inventore tempora sint hic culpa nemo cupiditate tenetur doloremque provident eum aut incidunt dignissimos a nesciunt enim magni quasi voluptates laudantium aliquam.</p>
               <p>Tenetur hic excepturi totam veritatis nesciunt aut expedita, dignissimos atque aliquam maxime et. Nemo nihil in illo rerum, minima deserunt nisi odit!</p>

               <figure class="signature">
                 <img src="img/signature-black.png" alt="">
                 <figcaption>
                   <p class="h6 author">Frank Desmond</p>
                   <p class="position">general director</p>
                 </figcaption>
               </figure>
             </article>
           </div>
           <div class="column small-12 medium-6 medium-order-1 pos-r has-overlay" data-interchange="[<?php echo e(asset('fontend/img/sections/222.jpeg')); ?>, small]">
             <a class="video-play-button large" href="https://player.vimeo.com/video/105467517?autoplay=1;color=ffdd39&amp;amp;title=0&amp;amp;byline=0" data-rel="lightcase-fade">
               <i class="zmdi zmdi-play fa fa-play"></i>
             </a>
           </div>
         </div>
       </div><!-- /end .s-welcome -->

       <!-- ===== SERVICES ===== -->

       <div class="section-boxed bg-secondary-shade s-line-secondary">
         <div class="row">
           <div class="column small-12">
             <header class="s-header align-center">
               <h2 class="s-headline">Company Services<span class="s-headline-decor"></span></h2>
             </header>
           </div>

           <div class="column small-12 medium-6 large-4">
             <a class="media-object media-button" href="<?php echo e(route('index')); ?>">
               <div class="media-object-section"><i class="icon rh rh-wrecker"></i></div>
               <div class="media-object-section"><h3 class="h3">Interciy Service</h3></div>
             </a>
           </div>

           <div class="column small-12 medium-6 large-4">
             <a class="media-object media-button" href="<?php echo e(route('wedding')); ?>">
               <div class="media-object-section"><i class="icon rh rh-van"></i></div>
               <div class="media-object-section"><h3 class="h3">Wedding Package</h3></div>
             </a>
           </div>

           <div class="column small-12 medium-6 large-4">
             <a class="media-object media-button" href="<?php echo e(route('package')); ?>">
               <div class="media-object-section"><i class="icon rh rh-crane-6"></i></div>
               <div class="media-object-section"><h3 class="h3">General Package</h3></div>
             </a>
           </div>



           <div class="column small-12 text-center s-footer">
             <a class="button rh-button " href="service-list.html">
               <i class="zmdi zmdi-wrench fa fa-wrench"></i>
               <span>View all services</span>
             </a>
           </div>
         </div><!-- /end .row -->
       </div><!-- /end .section-boxed -->

       <!-- ===== OUR ADVANTAGES ===== -->

       <div class="section">
         <div class="row">
           <div class="column small-12">
             <header class="s-header align-center">
               <h2 class="s-headline">Our advantages<span class="s-headline-decor"></span></h2>
               <p class="subheader">Obcaecati explicabo dignissimos fuga veritatis quae sequi recusandae possimus eius, iure, quasi voluptatum, veniam sapiente inventore velit!</p>
             </header>

             <div class="row small-up-1 medium-up-2 large-up-3 owl-carousel" data-carousel="medium-down" data-owl-options='{"smartSpeed": "500","dotsClass": "rh-owl-dots dots-dark"}'>

               <div class="column">
                 <!-- Icon card #1-->
                 <article class="card card-post-icon block-shadow">
                   <div class="card-media"><img class="grayscale" src="img/cards/card-04.jpg" alt=""></div>

                   <div class="card-divider bg-primary">
                     <div class="icon-box circle secondary border large"><i class="rh rh-locations"></i></div>
                     <h3 class="h4" data-equalizer-watch="data-equalizer-watch">Multiple Pick-Up<br>and Drop-Off Locations</h3>
                   </div>

                   <div class="card-section">
                     <p>Tempore quisquam animi facilis delectus quod est minima, explicabo consectetur vero, nisi dolorum perspiciatis temporibus incidunt ad excepturi in similique magni repellendus at?</p>
                   </div>
                 </article><!-- /end .card-post-icon-->
               </div>

               <div class="column">
                 <!-- Icon card #2-->
                 <article class="card card-post-icon block-shadow">
                   <div class="card-media"><img class="grayscale" src="img/cards/card-05.jpg" alt=""></div>

                   <div class="card-divider bg-primary">
                     <div class="icon-box circle secondary border large"><i class="rh rh-tools-c"></i></div>
                     <h3 class="h4" data-equalizer-watch="data-equalizer-watch">24-hour roadside<br>assistance</h3>
                   </div>

                   <div class="card-section">
                     <p>Est dolorem totam, in consequatur aperiam placeat minima facere pariatur molestiae, minus ea illum vero nemo fugiat voluptate praesentium temporibus odit deleniti.</p>
                   </div>
                 </article><!-- /end .card-post-icon-->
               </div>

               <div class="column">
                 <!-- Icon card #3-->
                 <article class="card card-post-icon block-shadow">
                   <div class="card-media"><img class="grayscale" src="img/cards/card-06.jpg" alt=""></div>

                   <div class="card-divider bg-primary">
                     <div class="icon-box circle secondary border large"><i class="rh rh-money-back"></i></div>
                     <h3 class="h4" data-equalizer-watch="data-equalizer-watch">100% money back<br>guarantee</h3>
                   </div>

                   <div class="card-section">
                     <p>Voluptate nostrum, consequuntur ab veniam officiis officia alias voluptas distinctio minima mollitia repudiandae minus vero dolorem excepturi sapiente dicta totam fugiat deserunt.</p>
                   </div>
                 </article><!-- /end .card-post-icon-->
               </div>

             </div><!-- /end .row -->
           </div><!-- /end .column -->
         </div><!-- /end .row -->
       </div><!-- /end .section -->

       <!-- ===== COUNTERS SECTION ===== -->

       <div class="s-counters bg-gray" data-counter>

         <!-- Counter -->
         <div class="row small-up-1 medium-up-2 large-up-4 collapse counter">

           <div class="column">
             <div class="media-object align-center-middle">
               <div class="media-object-section align-self-top">
                 <i class="counter-icon rh rh-van-f"></i>
               </div>
               <div class="media-object-section">
                 <div class="counter-digits js-counter" data-value="365"></div>
                 <div class="counter-title">Vehicles in fleet</div>
               </div>
             </div>
           </div>

           <div class="column">
             <div class="media-object align-center-middle">
               <div class="media-object-section align-self-top">
                 <i class="counter-icon rh rh-calendar"></i>
               </div>
               <div class="media-object-section">
                 <div class="counter-digits js-counter" data-value="9125"></div>
                 <div class="counter-title">Days in business</div>
               </div>
             </div>
           </div>

           <div class="column">
             <div class="media-object align-center-middle">
               <div class="media-object-section align-self-top">
                 <i class="counter-icon rh rh-case"></i>
               </div>
               <div class="media-object-section">
                 <div class="counter-digits js-counter" data-value="1234"></div>
                 <div class="counter-title">Projects done</div>
               </div>
             </div>
           </div>

           <div class="column">
             <div class="media-object align-center-middle">
               <div class="media-object-section align-self-top">
                 <i class="counter-icon rh rh-user"></i>
               </div>
               <div class="media-object-section">
                 <div class="counter-digits js-counter" data-value="7859"></div>
                 <div class="counter-title">Happy clients</div>
               </div>
             </div>
           </div>
         </div><!-- /end .counter -->
       </div><!-- /end .s-counters -->

       <!-- ===== SIMPLE AVERTISMENT SECTION ===== -->

       <div class="section-boxed s-half bg-secondary s-line-secondary" data-interchange="[<?php echo e(asset('fontend/img/sections/s-pattern-03.jpg')); ?>, small]">
         <div class="s-half-image has-overlay grayscale" data-interchange="[<?php echo e(asset('fontend/img/sections/s-pattern-08.jpeg')); ?>, small]"></div>

         <div class="row small-up-1 medium-up-2 align-right expanded">
           <div class="column flex-container flex-dir-column align-justify">
             <article>
               <header class="block-header">
                 <h2 class="h2 headline">Want to buy a truck? We sell this too</h2>
               </header>
               <p class="gray-color">Quae, similique nihil aspernatur dolore velit minus, voluptas, ut excepturi a vero repellat. Eligendi inventore repellendus alias ipsum nulla eos, ullam neque voluptatem voluptates dicta cumque possimus, optio tenetur atque odit quidem quibusdam animi doloremque aliquid officia iusto nemo illo, ducimus similique.</p>

               <div class="callout bg-transparent gray-color">
                 <ul class="zmdi-hc-ul fa-ul featured-list">
                   <li> <i class="zmdi-hc-li zmdi zmdi-check zmdi-hc-border-circle fa-li fa fa-check"></i>Officiis hic in nulla beatae impedit aspernatur!</li>
                   <li> <i class="zmdi-hc-li zmdi zmdi-check zmdi-hc-border-circle fa-li fa fa-check"></i>Saepe corporis magni quam veniam repellat, inventore?</li>
                   <li> <i class="zmdi-hc-li zmdi zmdi-check zmdi-hc-border-circle fa-li fa fa-check"></i>Sunt fugiat neque at unde, ea tempora.</li>
                 </ul>
               </div>

               <p class="gray-color">Placeat architecto, ut debitis labore similique consequatur facere qui sequi recusandae! Perferendis, atque, ipsum! Praesentium, sunt. Optio, adipisci aut ab! Voluptate nemo sint minus laudantium id praesentium nesciunt. Officiis quam ullam quis voluptates facilis aspernatur impedit quia.</p>
             </article>
             <div class="s-footer">
               <a class="button rh-button left-vb mb0" href="<?php echo e(route('contact')); ?>">
                 <i class="zmdi zmdi-more-vert"></i>
                 <span>More about the service</span>
               </a>
             </div>
           </div>
         </div>
       </div><!-- /end .section-boxed -->

       <!-- ===== FULL WIDTH SECTION ===== -->

       <div class="section-boxed s-equal-paddings">
         <div class="row align-center">
           <div class="column small-12 large-10">

             <div class="media-object stack-for-medium mb0 align-middle">
               <div class="media-object-section">
                 <h2 class="h3 headline light text-center">We would like to inform you about our stock & special offers</h2>
               </div>
               <div class="media-object-section pb0">
                 <form class="simple-form">
                   <div class="input-group">
                     <input class="input-group-field" type="email" placeholder="Your email address">
                     <button class="button transparent" type="submit"><i class="zmdi zmdi-mail-send fa fa-paper-plane"></i></button>
                   </div>
                 </form>
               </div>
             </div>

           </div>
         </div>
       </div><!-- /end .s-equal-paddings -->

       <!-- ===== TESTIMONIALS ===== -->

       <div class="section-boxed s-half bg-gray">
         <div class="row expanded align-spaced small-up-1 medium-up-2">

           <div class="column flex-container align-bottom align-left mb0 has-overlay medium-order-2" data-interchange="[<?php echo e(asset('fontend/img/sections/half-section-10-g.jpeg')); ?>, small]">
             <div class="callout large bg-primary callout-overlap-left block-shadow">
               <h2>Over 50 000 customers have trusted us already!</h2>
             </div>
           </div>

           <div class="column medium-order-1" data-interchange="[<?php echo e(asset('fontend/img/sections/s-pattern-05.jpeg')); ?>, small]">

             <div class="owl-carousel testimonials" data-owl-carousel data-owl-options='{"smartSpeed": "1200","dotsClass": "rh-owl-dots dots-dark"}'>

               <div class="testimonials-item text-center">
                 <div class="icon-box circle small border secondary-gray"><i class="zmdi zmdi-quote fa fa-quote-right"></i></div>
                 <p>Proactively harness frictionless methods of empowerment vis-a-vis mission-critical data. Credibly reinvent B2C alignments with market-driven sources. Continually network interactive expertise via flexible intellectual.</p>
                 <div class="testimonials-divider">
                   <svg class="testimonials-corner">
                     <use xlink:href="#corner"></use>
                   </svg>
                 </div>
                 <div class="testimonials-meta">
                   <div class="media-object align-center">
                     <div class="media-object-section">
                       <div class="rh-thumbnail">
                         <img class="grayscale" src="img/users/user-04.jpg" alt="Jerry Derryl, Baltimore Markets">
                       </div>
                     </div>
                     <div class="media-object-section">
                       <span class="h5 author">Jerry Derryl</span>
                       <span class="company">MBaltimore Markets</span>
                     </div>
                   </div>
                 </div>
               </div>

               <div class="testimonials-item text-center">
                 <div class="icon-box circle small border secondary-gray"><i class="zmdi zmdi-quote fa fa-quote-right"></i></div>
                 <p>Distinctively engage professional process improvements without inexpensive deliverables. Completely engage cross-unit platforms whereas B2C scenarios. Credibly pursue enterprise-wide mindshare after superior resources.</p>
                 <div class="testimonials-divider">
                   <svg class="testimonials-corner">
                     <use xlink:href="#corner"></use>
                   </svg>
                 </div>
                 <div class="testimonials-meta">
                   <div class="media-object align-center">
                     <div class="media-object-section">
                       <div class="rh-thumbnail">
                         <img class="grayscale" src="img/users/user-05.jpg" alt="Kirk Barron, Montana's Cookhouse">
                       </div>
                     </div>
                     <div class="media-object-section">
                       <span class="h5 author">Kirk Barron</span>
                       <span class="company">Montana's Cookhouse</span>
                     </div>
                   </div>
                 </div>
               </div>

               <div class="testimonials-item text-center">
                 <div class="icon-box circle small border secondary-gray"><i class="zmdi zmdi-quote fa fa-quote-right"></i></div>
                 <p>Appropriately scale B2B intellectual capital with resource maximizing benefits. Monotonectally foster error-free models without collaborative services. Competently maximize an expanded array of e-markets.</p>
                 <div class="testimonials-divider">
                   <svg class="testimonials-corner">
                     <use xlink:href="#corner"></use>
                   </svg>
                 </div>
                 <div class="testimonials-meta">
                   <div class="media-object align-center">
                     <div class="media-object-section">
                       <div class="rh-thumbnail">
                         <img class="grayscale" src="img/users/user-05.jpg" alt="Elma Simpson, Mode O'Day">
                       </div>
                     </div>
                     <div class="media-object-section">
                       <span class="h5 author">Elma Simpson</span>
                       <span class="company">Mode O\'Day</span>
                     </div>
                   </div>
                 </div>
               </div>

             </div><!-- /end .owl-carousel.testimonials -->
           </div><!-- /end .column -->
         </div><!-- /end .row -->
       </div><!-- /end .section-boxed -->

       <!-- ===== CARD-POST SECTION ===== -->

       <section class="section s-line">


         <div class="row small-up-1 medium-up-2 large-up-3 owl-carousel" data-carousel="medium-down" data-owl-options='{"smartSpeed": "500", "dotsClass": "rh-owl-dots dots-dark"}'>
           <div class="column">
             <!-- .card-post -->
             <article class="card card-post block-shadow">

               <header class="card-divider">
                 <a class="subheader" href="#">Company news</a>
                 <a href="blog-single-sidebar-left.html"><h3>Laborum magnam harum</h3></a>
               </header>

               <figure class="card-media"><img class="grayscale" src="img/cards/card-07.jpg" alt=""></figure>

               <div class="card-section">
                 <div class="meta">
                   <a class="meta-text" href="#"><i class="zmdi zmdi-account zmdi-hc-fw fa fa-user fa-fw"></i>Robert Gray</a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-calendar zmdi-hc-fw fa fa-calendar fa-fw"></i><time datetime="2017-05-01">May 1</time></a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-comments zmdi-hc-fw fa fa-comments fa-fw"></i>7</a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-thumb-up zmdi-hc-fw fa fa-thumbs-up fa-fw"></i>12</a>
                 </div>
                 <p>Reiciendis rem debitis tenetur iure incidunt. Provident eligendi facere error! Mollitia adipisci vel, accusantium reprehenderit aperiam praesentium!</p>
               </div>

               <footer class="card-divider align-justify">
                 <div class="share">
                   <button class="button transparent secondary-white" type="button"><i class="zmdi zmdi-share zmdi-hc-fw fa fa-share-alt fa-fw"></i>Share it</button>
                   <div class="button-group socials small tooltip top">
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-twitter fa fa-twitter "></i></a>
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-facebook fa fa-facebook "></i></a>
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-google fa fa-google "></i></a>
                   </div>
                 </div>
                 <a class="button transparent secondary-white" href="blog-single-sidebar-left.html"><i class="zmdi zmdi-collection-text zmdi-hc-fw fa fa-file-text fa-fw"></i>Read more</a>
               </footer>

             </article><!-- /end .card-post -->
           </div><!-- /end .column -->

           <div class="column">
             <!-- .card-post -->
             <article class="card card-post block-shadow">

               <header class="card-divider">
                 <a class="subheader" href="#">Company news</a>
                 <a href="blog-single-sidebar-right.html"><h3>Consequuntur inventore</h3></a>
               </header>

               <a class="card-media image-hover" href="img/cards/card-08@lightbox.jpg" data-rel="lightcase-zoom">
                 <img class="grayscale" src="img/cards/card-08.jpg" alt="">
                 <div class="image-hover-buttons"><span class="button-zoom"></span></div>
               </a>

               <div class="card-section">
                 <div class="meta">
                   <a class="meta-text" href="#"><i class="zmdi zmdi-account zmdi-hc-fw fa fa-user fa-fw"></i>Robert Gray</a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-calendar zmdi-hc-fw fa fa-calendar fa-fw"></i><time datetime="2017-05-01">May 1</time></a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-comments zmdi-hc-fw fa fa-comments fa-fw"></i>7</a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-thumb-up zmdi-hc-fw fa fa-thumbs-up fa-fw"></i>12</a>
                 </div>
                 <p>Consequuntur atque inventore aliquid laboriosam, dolorum sunt eveniet qui perferendis, id nesciunt sint alias commodi vel. Nisi excepturi optio.</p>
               </div>

               <footer class="card-divider align-justify">
                 <div class="share">
                   <button class="button transparent  secondary-white" type="button"><i class="zmdi zmdi-share zmdi-hc-fw fa fa-share-alt fa-fw"></i>Share it</button>
                   <div class="button-group socials small tooltip top">
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-twitter fa fa-twitter "></i></a>
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-facebook fa fa-facebook "></i></a>
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-google fa fa-google "></i></a>
                   </div>
                 </div>
                 <a class="button transparent secondary-white" href="blog-single-sidebar-right.html"><i class="zmdi zmdi-collection-text zmdi-hc-fw fa fa-file-text fa-fw"></i>Read more</a>
               </footer>

             </article><!-- /end .card-post -->
           </div><!-- /end .column -->

           <div class="column">
             <!-- .card-post -->
             <article class="card card-post block-shadow">

               <header class="card-divider">
                 <a class="subheader" href="#">Company news</a>
                 <a href="blog-single-full.html"><h3>Nesciunt sint alias inventore</h3></a>
               </header>

               <div class="content-slider orbit card-media" data-orbit="data-orbit">

                 <!-- carousel navigation buttons -->
                 <a class="button rh-button-simple left-vb flip-y undefined orbit-previous" href="#"><i class="zmdi zmdi-chevron-left fa fa-chevron-left"></i></a>
                 <a class="button rh-button-simple right-vb flip-y undefined orbit-next" href="#"><i class="zmdi zmdi-chevron-right fa fa-chevron-right"></i></a>

                 <!-- post carousel -->
                 <ul class="orbit-container grayscale">
                   <li class="orbit-slide is-active">
                     <a class="image-hover" href="img/gallery/gallery-01@lightbox.jpg" data-rel="lightcase-zoom:card-gallery">
                       <img class="orbit-image" src="img/cards/card-17.jpg" data-interchange="[img/cards/card-17.jpg, small]" alt="">
                       <div class="image-hover-buttons"><span class="button-zoom"></span></div>
                     </a>
                   </li>
                   <li class="orbit-slide">
                     <a class="image-hover" href="img/gallery/gallery-08@lightbox.jpg" data-rel="lightcase-zoom:card-gallery"><img class="orbit-image" src="img/cards/card-18.jpg" data-interchange="[img/cards/card-18.jpg, small]" alt="" />
                       <div class="image-hover-buttons"><span class="button-zoom"></span></div>
                     </a>
                   </li>
                   <li class="orbit-slide">
                     <a class="image-hover" href="img/gallery/gallery-04@lightbox.jpg" data-rel="lightcase-zoom:card-gallery"><img class="orbit-image" src="img/cards/card-19.jpg" data-interchange="[img/cards/card-19.jpg, small]" alt="" />
                       <div class="image-hover-buttons"><span class="button-zoom"></span></div>
                     </a>
                   </li>
                 </ul><!-- /end .orbit-container -->

                 <!-- carousel bullet navigation -->
                 <nav class="orbit-bullets">
                   <button class="is-active" data-slide="0">
                     <span></span>
                     <span class="show-for-sr">Slide 0</span>
                   </button>
                   <button data-slide="1">
                     <span></span>
                     <span class="show-for-sr">Slide 1</span>
                   </button>
                   <button data-slide="2">
                     <span></span>
                     <span class="show-for-sr">Slide 2</span>
                   </button>
                 </nav>

               </div><!-- /end .content-slider -->

               <div class="card-section">
                 <div class="meta">
                   <a class="meta-text" href="#"><i class="zmdi zmdi-account zmdi-hc-fw fa fa-user fa-fw"></i>Robert Gray</a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-calendar zmdi-hc-fw fa fa-calendar fa-fw"></i><time datetime="2017-05-01">May 1</time></a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-comments zmdi-hc-fw fa fa-comments fa-fw"></i>7</a>
                   <a class="meta-text" href="#"><i class="zmdi zmdi-thumb-up zmdi-hc-fw fa fa-thumbs-up fa-fw"></i>12</a>
                 </div>
                 <p>Ex consequuntur corporis saepe dolor! Tenetur vitae commodi ex dignissimos ab veritatis iusto et perferendis quam. Expedita quos sunt officia magnam.</p>
               </div>

               <footer class="card-divider align-justify">
                 <div class="share">
                   <button class="button transparent  secondary-white" type="button"><i class="zmdi zmdi-share zmdi-hc-fw fa fa-share-alt fa-fw"></i>Share it</button>
                   <div class="button-group socials small tooltip top">
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-twitter fa fa-twitter "></i></a>
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-facebook fa fa-facebook "></i></a>
                     <a class="button hollow secondary" href="#"><i class="zmdi zmdi-google fa fa-google "></i></a>
                   </div>
                 </div>
                 <a class="button transparent secondary-white" href="blog-single-full.html"><i class="zmdi zmdi-collection-text zmdi-hc-fw fa fa-file-text fa-fw"></i>Read more</a>
               </footer>

             </article>
           </div><!-- /end .column -->
         </div><!-- /end .row -->

         <div class="row">
           <div class="column small-12">
             <footer class="s-footer text-center">
               <a class="button rh-button" href="<?php echo e(route('package')); ?>"><i class="zmdi zmdi-collection-text fa fa-file-text"></i><span>View all Package</span></a>
             </footer>
           </div>
         </div>

       </section><!-- /end .section -->

       <!-- ===== CONTACT FORM SECTION ===== -->

       <script type="text/javascript">
       $(document).ready(function() {
         $('.dynamic').change(function(){
              if($(this).val() != '')
              {
               var select = $(this).attr("id");
               var value = $(this).val();
               var dependent = $(this).data('dependent');
               var _token = $('input[name="_token"]').val();
               $.ajax({
                url:"<?php echo e(route('user.dynamicdescrict.fetch')); ?>",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result)
                {
                 $('#'+dependent).html(result);
                }

               })
              }
             });
         $('.dynamic_district').change(function(){
              if($(this).val() != '')
              {
               var select = $(this).attr("id");
               var value = $(this).val();
               var dependent = $(this).data('dependent');
               var _token = $('input[name="_token"]').val();
               $.ajax({
                url:"<?php echo e(route('user.dynamicdescrict.fetch')); ?>",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result)
                {
                 $('#'+dependent).html(result);
                }

               })
              }
             });
         $('.dynamicto_district').change(function(){
              if($(this).val() != '')
              {
               var select = $(this).attr("id");
               var value = $(this).val();
               var dependent = $(this).data('dependent');
               var _token = $('input[name="_token"]').val();
               $.ajax({
                url:"<?php echo e(route('user.dynamicTodescrict.fetch')); ?>",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result)
                {
                 $('#'+dependent).html(result);
                }

               })
              }
             });

             $('.dynamicto').change(function(){
                  if($(this).val() != '')
                  {
                   var select = $(this).attr("id");
                   var value = $(this).val();
                   var dependentt = $(this).data('dependentt');
                   var _token = $('input[name="_token"]').val();
                   $.ajax({
                    url:"<?php echo e(route('dynamictodependent.fetch')); ?>",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependentt:dependentt},
                    success:function(result)
                    {
                     $('#'+dependentt).html(result);
                    }

                   })
                  }
                 });
         $('#thana').select2({placeholder: "Select Thana"});
         $('#district').select2({placeholder: "Select District"});
         $('#division').select2({placeholder: "Select Division"});
         $('#thanato').select2({placeholder: "Select Thana"});
         $('#districtto').select2({placeholder: "Select District"});
         $('#divisionto').select2({placeholder: "Select Division"});
         $('#vtype').select2({placeholder: "Select Vehicale Type"});

         $("#vehicle_id").on("change",function(){
           $("#mileage").val($(this).find(':selected').data("mileage"));
           $("#mileage").attr("min",$(this).find(':selected').data("mileage"));
         });

         $('#date').datepicker({
           autoclose: true,
           format: 'yyyy-mm-dd'
         });

         $('#date1').datepicker({
           autoclose: true,
           format: 'yyyy-mm-dd'
         });

         $('#date2').datepicker({
           autoclose: true,
           format: 'yyyy-mm-dd'
         });

         $("#del_btn").on("click",function(){
           var id=$(this).data("submit");
           $("#form_"+id).submit();
         });

         $('#myModal').on('show.bs.modal', function(e) {
           var id = e.relatedTarget.dataset.id;
           $("#del_btn").attr("data-submit",id);
         });

       $(document).on("click",".delete",function(e){
         var hvk=confirm("Are you sure?");
         if(hvk==true){
           var id=$(this).data("id");
           var action="<?php echo e(url('admin/income')); ?>"+"/" +id;

             $.ajax({
               type: "POST",
               url: action,
               data: "_method=DELETE&_token="+window.Laravel.csrfToken+"&id="+id,
               success: function(data){
                 // alert(data);
                 $("#income").empty();
                 $("#income").html(data);

                 new PNotify({
                     title: 'Deleted!',
                     text: '<?php echo app('translator')->getFromJson("fleet.deleted"); ?>',
                     type: 'wanring'
                 })
               }
             ,
             dataType: "HTML"
           });
         }
       });

       });


         $('#chk_all').on('click',function(){
           if(this.checked){
             $('.checkbox').each(function(){
               $('.checkbox').prop("checked",true);
             });
           }else{
             $('.checkbox').each(function(){
               $('.checkbox').prop("checked",false);
             });
           }
         });

         // Checkbox checked
         function checkcheckbox(){
           // Total checkboxes
           var length = $('.checkbox').length;
           // Total checked checkboxes
           var totalchecked = 0;
           $('.checkbox').each(function(){
               if($(this).is(':checked')){
                   totalchecked+=1;
               }
           });
           // console.log(length+" "+totalchecked);
           // Checked unchecked checkbox
           if(totalchecked == length){
               $("#chk_all").prop('checked', true);
           }else{
               $('#chk_all').prop('checked', false);
           }
         }
       </script>
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/index.blade.php ENDPATH**/ ?>