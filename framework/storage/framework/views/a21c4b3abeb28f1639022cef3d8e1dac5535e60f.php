     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<!-- <section class="section-boxed page-header bg-secondary-shade" data-interchange="[img/page-headers/page-header-20.jpg, small]">
					<div class="row">
						<div class="column small-12">
							<header class="s-header align-center">
								<h1 class="headline">Company services</h1>
							</header>
						</div>
					</div>
				</section> -->

				<!-- ===== BREADCRUMBS ===== -->

				<!-- <div class="callout bg-secondary-shade">
					<div class="row">
						<div class="column small-12">
							<nav class="text-center" aria-label="You are here:">
								<ul class="breadcrumbs mb0">
									<li><a class="block-link" href="#">Home</a></li>
									<li><span class="show-for-sr">Current:</span>Package</li>
								</ul>
							</nav>
						</div>
					</div>
				</div> -->

				<!-- ===== MAIN PART ===== -->
     <main>
       <!-- SERVICES CARD GRID -->
       <section class="section">
         <header class="s-header align-center">
           <h2 class="s-headline"> What we do<span class="s-headline-decor"></span></h2>
         </header>

         <!-- data-equalizer - foundation plugin, set equal height for .card-divider-->
         <div class="row small-up-1 medium-up-2 large-up-3 dots-dark" data-equalizer data-equalize-on="large" data-carousel="medium-down">
           <div class="column column-block">

             <article class="card card-post-icon block-shadow card-service">
               <div class="card-media">
                 <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/1.jpg')); ?>" alt="">
               </div>
               <header class="card-divider bg-secondary">
                 <div class="icon-box circle primary border"><i class="rh rh-wrecker"></i></div>
                 <h3 class="h4" data-equalizer-watch="data-equalizer-watch">Towing service</h3>
               </header>
               <div class="card-section">
                 <p>Quae nostrum ipsa veritatis dolor perspiciatis quidem laborum, eveniet laudantium voluptas et.</p>
               </div>
               <footer class="card-section text-center">
                 <a class="button rh-button flip-y" href="#">
                   <i class="zmdi zmdi-info fa fa-info-circle"></i>
                   <span>More about service</span>
                 </a>
               </footer>
             </article>

           </div><!-- /end .column -->
           <div class="column column-block">

             <article class="card card-post-icon block-shadow card-service">
               <div class="card-media">
                 <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/2.jpg')); ?>" alt="">
               </div>
               <header class="card-divider bg-secondary">
                 <div class="icon-box circle primary border"><i class="rh rh-van"></i></div>
                 <h3 class="h4" data-equalizer-watch="data-equalizer-watch">Van hire</h3>
               </header>
               <div class="card-section">
                 <p>Libero animi tenetur ullam adipisci culpa laudantium at tempora optio natus dignissimos.</p>
               </div>
               <footer class="card-section text-center">
                 <a class="button rh-button flip-y" href="#">
                   <i class="zmdi zmdi-info fa fa-info-circle"></i>
                   <span>More about service</span>
                 </a>
               </footer>
             </article>

           </div><!-- /end .column -->
           <div class="column column-block">

             <article class="card card-post-icon block-shadow card-service">
               <div class="card-media">
                 <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/3.jpg')); ?>" alt="">
               </div>
               <header class="card-divider bg-secondary">
                 <div class="icon-box circle primary border"><i class="rh rh-crane-6"></i></div>
                 <h3 class="h4" data-equalizer-watch="data-equalizer-watch">Self-loading<br>crane truck hire</h3>
               </header>
               <div class="card-section">
                 <p>Cum, laborum, rerum! Assumenda, atque voluptates quia repudiandae quo perspiciatis quisquam minima!</p>
               </div>
               <footer class="card-section text-center">
                 <a class="button rh-button flip-y" href="#">
                   <i class="zmdi zmdi-info fa fa-info-circle"></i>
                   <span>More about service</span>
                 </a>
               </footer>
             </article>

           </div><!-- /end .column -->
           <div class="column column-block">

             <article class="card card-post-icon block-shadow card-service">
               <div class="card-media">
                 <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/3.jpg')); ?>" alt="">
               </div>
               <header class="card-divider bg-secondary">
                 <div class="icon-box circle primary border"><i class="rh rh-cargo-6"></i></div>
                 <h3 class="h4" data-equalizer-watch="data-equalizer-watch">Moving services</h3>
               </header>
               <div class="card-section">
                 <p>Aliquam tenetur explicabo, ut perspiciatis, blanditiis incidunt ex facilis labore iusto eveniet.</p>
               </div>
               <footer class="card-section text-center">
                 <a class="button rh-button flip-y" href="#">
                   <i class="zmdi zmdi-info fa fa-info-circle"></i>
                   <span>More about service</span>
                 </a>
               </footer>
             </article>

           </div><!-- /end .column -->
           <div class="column column-block">

             <article class="card card-post-icon block-shadow card-service">
               <div class="card-media">
                 <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/2.jpg')); ?>" alt="">
               </div>
               <header class="card-divider bg-secondary">
                 <div class="icon-box circle primary border"><i class="rh rh-trailer-2"></i></div>
                 <h3 class="h4" data-equalizer-watch="data-equalizer-watch">Transportation</h3>
               </header>
               <div class="card-section">
                 <p>Voluptas neque minus placeat quia quo. Aspernatur commodi deserunt, blanditiis earum quam.</p>
               </div>
               <footer class="card-section text-center">
                 <a class="button rh-button flip-y" href="#">
                   <i class="zmdi zmdi-info fa fa-info-circle"></i>
                   <span>More about service</span>
                 </a>
               </footer>
             </article>

           </div><!-- /end .column -->
           <div class="column column-block">

             <article class="card card-post-icon block-shadow card-service">
               <div class="card-media">
                 <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/1.jpg')); ?>" alt="">
               </div>
               <header class="card-divider bg-secondary">
                 <div class="icon-box circle primary border"><i class="rh rh-sale"></i></div>
                 <h3 class="h4" data-equalizer-watch="data-equalizer-watch">Sale of used vehicles</h3>
               </header>
               <div class="card-section">
                 <p>Expedita soluta accusamus excepturi quaerat cum, eveniet libero corporis consectetur dolore, iusto?</p>
               </div>
               <footer class="card-section text-center">
                 <a class="button rh-button flip-y" href="#">
                   <i class="zmdi zmdi-info fa fa-info-circle"></i>
                   <span>More about service</span>
                 </a>
               </footer>
             </article>
           </div><!-- /end .column -->
         </div><!-- /end .row -->
       </section><!-- /end .section -->

       <!-- ===== TRAPEZE SECTION ===== -->

       <div class="section-trapeze primary">
         <section class="trapeze bg-primary">
           <header class="s-header align-center">
             <h2 class="h3 headline">Great value rental vehicles extras</h2>
           </header>

           <div class="row align-center features">
             <div class="column small-12 medium-6 large-5">

               <div class="media-object">
                 <div class="media-object-section">
                   <div class="icon-box border circle secondary small"><i class="rh rh-money-gear"></i></div>
                 </div>
                 <div class="media-object-section">
                   <h3 class="h5">Fully inclusive prices</h3>
                   <p>Nam inventore molestiae ea illum temporibus itaque, dolorem totam explicabo eaque.</p>
                 </div>
               </div>

               <div class="media-object">
                 <div class="media-object-section">
                   <div class="icon-box border circle secondary small"><i class="rh rh-highway"></i></div>
                 </div>
                 <div class="media-object-section">
                   <h3 class="h5">Unlimited mileage</h3>
                   <p>Molestias officia vel repellendus quisquam fuga repudiandae architecto, modi pariatur enim hic?</p>
                 </div>
               </div>

             </div><!-- /end .column -->
             <div class="column small-12 medium-6 large-5">

               <div class="media-object">
                 <div class="media-object-section">
                   <div class="icon-box border circle secondary small"><i class="rh rh-child-seat"></i></div>
                 </div>
                 <div class="media-object-section">
                   <h3 class="h5">Child Safety</h3>
                   <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                 </div>
               </div>

               <div class="media-object">
                 <div class="media-object-section">
                   <div class="icon-box border circle secondary small"><i class="rh rh-gps"></i></div>
                 </div>
                 <div class="media-object-section">
                   <h3 class="h5">GPS Navigation</h3>
                   <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                 </div>
               </div>

             </div><!-- /end .column -->
           </div><!-- /end .row -->

         </section><!-- /end .trapeze -->
       </div><!-- /end .section-trapeze -->

     </main>

     <!-- ===== PRODUCT CARDS CAROUSEL ===== -->

     <section class="section section s-line s-cards-carousel">
       <div class="row align-center">
         <div class="column small-12 medium-8 large-5">
           <header class="s-header align-center">
             <h2 class="s-headline">Great offers<span class="s-headline-decor"></span></h2>
             <p class="subheader">Consequuntur provident aliquam exercitationem deserunt ex quia, quas incidunt nostrum soluta temporibus.</p>
           </header>
         </div>
         <div class="column small-12">
           <div class="owl-carousel" data-owl-carousel data-button-type="rh-buttons" data-button-color="secondary secondary-gray" data-owl-options='{"smartSpeed": "500","dotsClass": "rh-owl-dots dots-dark", "responsive": {"640": {"items": "2", "slideBy": "2", "dots": false, "nav": "true"}, "1024": {"items": "3", "slideBy": "3", "dots": false, "nav": "true"}}}'>

             <!-- Card product -->
             <div class="card card-product bg-secondary block-shadow">

               <div class="card-divider">
                 <h3 class="h3 headline">Italy F</h3>
               </div>

               <div class="card-section card-product-data flex-container align-justify">

                 <div class="price-wrap">
                   <div class="price"><sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">39</span><sup>/ day</sup>
                     <ul class="rating text-center">
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i></li>
                     </ul>
                   </div>
                 </div><!-- /end .price-wrap -->

                 <ul class="card-product-features">
                   <li><i class="zmdi zmdi-male-alt zmdi-hc-fw fa fa-male fa-fw"></i>X 3</li>
                   <li><i class="zmdi zmdi-gas-station zmdi-hc-fw fa fa-tint fa-fw"></i>diesel</li>
                   <li><i class="zmdi zmdi-settings zmdi-hc-fw fa fa-gear fa-fw"></i>manual gear-box</li>
                 </ul>
               </div><!-- /end .card-product-data -->

               <img src="<?php echo e(asset('fontend/img/fleet/1.jpg')); ?>" alt="">

               <div class="card-section text-center">
                 <a class="button rh-button flip-y" href="fleet-details-right-sidebar.html"><i class="zmdi zmdi-info"></i>
                   <span>Detail info</span>
                 </a>
               </div>
             </div><!-- /end .card-product -->

             <!-- Card product -->
             <div class="card card-product block-shadow">

               <div class="card-divider bg-white">
                 <h3 class="h3 headline">Sprinter MS</h3>
               </div>

               <div class="card-section card-product-data flex-container align-justify">

                 <div class="price-wrap">
                   <div class="price"><sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">41</span><sup>/ day</sup>
                     <ul class="rating text-center">
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     </ul>
                   </div>
                 </div><!-- /end .price-wrap -->

                 <ul class="card-product-features">
                   <li><i class="zmdi zmdi-male-alt zmdi-hc-fw fa fa-male fa-fw"></i>X 3</li>
                   <li><i class="zmdi zmdi-gas-station zmdi-hc-fw fa fa-tint fa-fw"></i>diesel</li>
                   <li><i class="zmdi zmdi-settings zmdi-hc-fw fa fa-gear fa-fw"></i>manual gear-box</li>
                 </ul>
               </div><!-- /end .card-product-data -->

               <img src="<?php echo e(asset('fontend/img/fleet/2.jpg')); ?>" alt="">

               <div class="card-section text-center">
                 <a class="button rh-button flip-y" href="fleet-details-right-sidebar.html"><i class="zmdi zmdi-info"></i>
                   <span>Detail info</span>
                 </a>
               </div>
             </div><!-- /end .card-product -->

             <!-- Card product -->
             <div class="card card-product bg-secondary block-shadow">

               <div class="card-divider">
                 <h3 class="h3 headline">Transit ST</h3>
               </div>

               <div class="card-section card-product-data flex-container align-justify">

                 <div class="price-wrap">
                   <div class="price">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">38</span><sup>/ day</sup>

                     <ul class="rating text-center">
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     </ul>
                   </div>
                 </div><!-- /end .price-wrap -->

                 <ul class="card-product-features">
                   <li><i class="zmdi zmdi-male-alt zmdi-hc-fw fa fa-male fa-fw"></i>X 3</li>
                   <li><i class="zmdi zmdi-gas-station zmdi-hc-fw fa fa-tint fa-fw"></i>diesel</li>
                   <li><i class="zmdi zmdi-settings zmdi-hc-fw fa fa-gear fa-fw"></i>manual gear-box</li>
                 </ul>
               </div><!-- /end .card-product-data -->

               <img src="<?php echo e(asset('fontend/img/fleet/1.jpg')); ?>" alt="">

               <div class="card-section text-center">
                 <a class="button rh-button flip-y" href="fleet-details-right-sidebar.html">
                   <i class="zmdi zmdi-info"></i>
                   <span>Detail info</span>
                 </a>
               </div>
             </div><!-- /end .card-product -->

             <!-- Card product -->
             <div class="card card-product block-shadow">
               <img class="bg-secondary" src="<?php echo e(asset('fontend/img/fleet/2.jpg')); ?>g" alt="">

               <div class="card-divider">
                 <h3 class="h3 headline">Transit ST F</h3>
               </div>

               <div class="card-section card-product-data flex-container align-justify">

                 <div class="price-wrap">
                   <div class="price">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">37</span><sup>/ day</sup>

                     <ul class="rating text-center">
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     </ul>
                   </div>
                 </div><!-- /end .price-wrap -->

                 <ul class="card-product-features">
                   <li><i class="zmdi zmdi-male-alt zmdi-hc-fw fa fa-male fa-fw"></i>X 3</li>
                   <li><i class="zmdi zmdi-gas-station zmdi-hc-fw fa fa-tint fa-fw"></i>diesel</li>
                   <li><i class="zmdi zmdi-settings zmdi-hc-fw fa fa-gear fa-fw"></i>manual gear-box</li>
                 </ul>

               </div><!-- /end .card-product-data -->

               <div class="card-section text-center">
                 <a class="button rh-button flip-y" href="fleet-details-right-sidebar.html">
                   <i class="zmdi zmdi-info"></i>
                   <span>Detail info</span>
                 </a>
               </div>
             </div><!-- /end .card-product -->

             <!-- Card product -->
             <div class="card card-product bg-secondary block-shadow">
               <img class="bg-white" src="<?php echo e(asset('fontend/img/fleet/3.jpg')); ?>" alt="">

               <div class="card-divider bg-white">
                 <h3 class="h3 headline">Super Sprinter MF</h3>
               </div>

               <div class="card-section card-product-data flex-container align-justify">

                 <div class="price-wrap">
                   <div class="price">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">40</span><sup>/ day</sup>

                     <ul class="rating text-center">
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     </ul>
                   </div>
                 </div><!-- /end .price-wrap -->

                 <ul class="card-product-features">
                   <li><i class="zmdi zmdi-male-alt zmdi-hc-fw fa fa-male fa-fw"></i>X 3</li>
                   <li><i class="zmdi zmdi-gas-station zmdi-hc-fw fa fa-tint fa-fw"></i>diesel</li>
                   <li><i class="zmdi zmdi-settings zmdi-hc-fw fa fa-gear fa-fw"></i>manual gear-box</li>
                 </ul>

               </div><!-- /end .card-product-data -->

               <div class="card-section text-center">
                 <a class="button rh-button flip-y" href="fleet-details-right-sidebar.html">
                   <i class="zmdi zmdi-info"></i>
                   <span>Detail info</span>
                 </a>
               </div>
             </div><!-- /end .card-product -->

             <!-- Card product -->
             <div class="card card-product block-shadow">
               <img class="bg-secondary" src="<?php echo e(asset('fontend/img/fleet/1.jpg')); ?>" alt="">

               <div class="card-divider bg-secondary">
                 <h3 class="h3 headline">Super Sprinter B</h3>
               </div>

               <div class="card-section card-product-data flex-container align-justify">

                 <div class="price-wrap">
                   <div class="price">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val">39</span><sup>/ day</sup>

                     <ul class="rating text-center">
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                       <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     </ul>
                   </div>
                 </div><!-- /end .price-wrap -->

                 <ul class="card-product-features">
                   <li><i class="zmdi zmdi-male-alt zmdi-hc-fw fa fa-male fa-fw"></i>X 3</li>
                   <li><i class="zmdi zmdi-gas-station zmdi-hc-fw fa fa-tint fa-fw"></i>diesel</li>
                   <li><i class="zmdi zmdi-settings zmdi-hc-fw fa fa-gear fa-fw"></i>manual gear-box</li>
                 </ul>

               </div><!-- /end .card-product-data -->

               <div class="card-section text-center">
                 <a class="button rh-button flip-y" href="fleet-details-right-sidebar.html">
                   <i class="zmdi zmdi-info"></i>
                   <span>Detail info</span>
                 </a>
               </div>

             </div><!-- /end .card-product -->

           </div><!-- /end .owl-carousel -->
         </div><!-- /end .column -->
       </div><!-- /end .row -->
     </section>

     <!-- ===== FULL WIDTH SECTION - DARK ===== -->

     <div class="section-boxed s-equal-paddings bg-secondary white-color has-overlay" data-interchange="[img/sections/banner-06.jpg, small]">
       <div class="row">
         <div class="column small-12 medium-6 large-6 large-offset-1 text-center">
           <h2 class="h3">Stay connected!</h2>
           <p class="lead mb0">Be the first to know about exclusive news & offers.</p>
         </div>
         <div class="column small-12 medium-6 large-4">
           <div class="floating-socials">
             <a href="#"> <i class="zmdi zmdi-twitter fa fa-twitter"></i><small> Twitter</small></a>
             <a href="#"> <i class="zmdi zmdi-facebook fa fa-facebook"></i><small> Facebook</small></a>
             <a href="#"> <i class="zmdi zmdi-instagram fa fa-instagram"></i><small> Instagram</small></a>
             <a href="#"> <i class="zmdi zmdi-youtube fa fa-youtube"></i><small> Youtube</small></a>
           </div>
         </div>
       </div>
     </div><!-- /end .section-boxed.s-equal-paddings -->
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\car\framework\resources\views/frontend/package.blade.php ENDPATH**/ ?>