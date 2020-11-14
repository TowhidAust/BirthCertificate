     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <style media="screen">
        button.flip-y:before, .rh-button.primary.flip-y:after, .rh-button.primary.flip-y:before {
  border-top-color: transparent;
  border-bottom-color: #ffea84;
}
        </style>
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
           <h2 class="s-headline"> What we Offers<span class="s-headline-decor"></span></h2>
         </header>

         <!-- data-equalizer - foundation plugin, set equal height for .card-divider-->
         <div class="row small-up-1 medium-up-2 large-up-3 dots-dark" data-equalizer data-equalize-on="large" data-carousel="medium-down">

           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

           <div class="column column-block">

             <article class="card card-post-icon block-shadow card-service">
               <div class="card-media">
                 <img  src="<?php echo e(asset('uploads/'.$row->image)); ?>" alt="">
               </div>
               <header class="card-divider bg-secondary">
                 <h3 class="h4" data-equalizer-watch="data-equalizer-watch"><?php echo e(number_format($row->price)); ?> TK</h3>
               </header>
               <div class="card-section">
                  <h3 class="h4" data-equalizer-watch="data-equalizer-watch"><?php echo e($row->package_name); ?></h3>
                 <p>Libero animi tenetur ullam adipisci culpa laudantium at tempora optio natus dignissimos.</p>
               </div>
               <form class="" action="<?php echo e(route('book.package')); ?>" method="post">
                 <?php echo e(csrf_field()); ?>


                   <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="package_id" value="<?php echo e($row->id); ?>">
                   <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="price" value="<?php echo e($row->price); ?>">
               <footer class="card-section text-center">
                 <a target="_blank" class="button rh-button flip-y" style="    border-bottom-color: #3598ec;color: white;border-bottom-color: #3598ec;"href="<?php echo e($row->fb_link); ?>">
                   <i class="zmdi zmdi-facebook fa fa-facebook-circle"></i>
                   <span>Facebook</span>
                 </a>
                 <?php if(!empty($customer_id=Session::get('id'))): ?>
                 <button class="button rh-button right-vb flip-y " type="submit"><i class="zmdi zmdi-assignment-check"></i>
                     <span> Book</span>
                 </button>

               </form>
                 <?php else: ?>
                 <button class="button rh-button right-vb flip-y " data-open="js-modal-account"><i class="zmdi zmdi-assignment-check"></i>
                     <span> Book</span>
                 </button>
                 <?php endif; ?>
               </footer>
             </article>

           </div><!-- /end .column -->
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         </div><!-- /end .row -->
       </section><!-- /end .section -->

       <!-- ===== TRAPEZE SECTION ===== -->


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
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/package.blade.php ENDPATH**/ ?>