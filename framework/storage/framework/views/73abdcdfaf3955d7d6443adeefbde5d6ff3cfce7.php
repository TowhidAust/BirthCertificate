     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- ===== MAIN PART ===== -->

     <main>
     <div class="row">

       <!-- ===== PAGE CONTENT ===== -->

       <div class="column small-12 large-8 large-order-2">

         <div class="row align-justify fleet-button-row">
           <div class="column">
             <!-- Sidebar toggle button (less 1024px)-->
             <button class="button hollow secondary small hide-for-large" type="button" data-toggle="js-fleet-form"><i class="zmdi zmdi-search"></i></button>
             <form>
               <label class="input-group">
                 <select class="input-group-field placeholder" id="js-sort-select">
                   <option value="1" selected>Popular</option>
                   <option value="2">Price</option>
                 </select>
               </label>
               <input type="submit" hidden>
             </form>
           </div>
           <!-- toggle view buttons-->
           <div class="column shrink show-for-medium">
             <button class="button hollow secondary small" id="js-fleet-toggle-panels" type="button" disabled><i class="zmdi zmdi-view-agenda fa fa-th-list"></i></button>
             <button class="button hollow secondary small" id="js-fleet-toggle-cards" type="button"><i class="zmdi zmdi-view-dashboard fa fa-th-large"></i></button>
           </div>
         </div><!-- /end .fleet-button-row -->

         <!-- ===== PRODUCT CARD GRID ===== -->

         <div class="fleet-grid row small-up-1" id="js-fleet-grid">
           <?php if(!empty($fare)): ?>
           <?php $__currentLoopData = $fare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="column">
             <section class="card card-product extended block-shadow">
               <header class="card-divider">
                 <h3 class="headline"><?php echo e($row->vehicletype); ?></h3>
               </header>
               <div class="card-section media-object stack-for-small mb0">
                 <div class="media-object-section">
                   <img class="card-media" src="<?php echo e(asset('uploads/'.$row->icon)); ?>" alt="">



                 </div><!-- /end .media-object-section -->
                 <div class="media-object-section">
                   <div class="card-product-data flex-container align-justify">
                     <div class="price-wrap">
                       <div class="price"><sup></sup>
                         <span class="price-val"><?php echo e($row->fare); ?></span><sup> TK Single Trip</sup>
                         <ul class="rating">
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                           <li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i></li>
                         </ul>
                       </div>
                     </div>
                     <ul class="card-product-features">
                     <li><?php echo e($row->displayname); ?><i class="rh rh-car rh-fw"></i></li>
                       <li>X 3 <i class="rh rh-user rh-fw"></i></li>
                       <li><gas i class="rh rh-fuel rh-fw"></i></li>
                       <li>manual <i class="rh rh-gearbox rh-fw"></i></li>
                     </ul>
                   </div><!-- /end .card-product-data -->
                   <footer class="card-section card-footer button-group stacked-for-small">
                     <form class="" action="<?php echo e(route('search_car')); ?>" method="post">
                       <button class="button rh-button right-vb flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                           <span>Book Now</span>
                       </button>
                     </form>
                   </footer>

                 </div><!-- /end .media-object-section -->
               </div><!-- /end .media-object -->


             </section>
           </div><!-- /end .column -->
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php else: ?>
          <h3>No vehicle are aviable now!</h3>
           <?php endif; ?>
         </div><!-- /end .fleet-grid.row -->

         <!-- ===== PAGINATION ===== -->
       </div>

       <!-- ===== SIDEBAR ===== -->

       <div class="column small-12 large-4 large-order-1">

         <!-- Product filter form -->
         <aside class="sidebar off-canvas-wrapper product-filter-wrap">
           <div class="product-filter off-canvas position-left" id="js-fleet-form" data-off-canvas data-auto-focus="false">

             <section class="card bg-gray block-shadow">
               <header class="card-divider">
                 <button class="close-button small hide-for-large" data-close aria-label="Close product filter panel"><span></span></button>
                 <h3 class="h4 headline">Your Trip Information</h3>
               </header>

               <div class="card-section">

                 <form class="small form-gray" acion="haaaa.php">
                   <h4 class="h5 headline">Dhaka to Brahmanbaria ,Sadar</h4>
                   <fieldset class="border selections-group">
                     <!-- Selections group (checkboxes and radios)-->
                     <div class="input-group">
                       <span class="input-group-title"><i class="zmdi zmdi-alert-triangle zmdi-hc-fw fa fa-warning fa-fw"></i>Type of trip:</span>
                       <span class="radio inline">
                         <label>
                           <input id="cab-single" type="radio" name="cab">
                           <span class="custom-radio"><i class="icon-radio-check"></i>
                           </span>Single
                         </label>
                       </span>
                       <span class="radio inline">
                         <label>
                           <input id="cab-double" type="radio" name="cab">
                           <span class="custom-radio"><i class="icon-radio-check"></i>
                           </span>Return
                         </label>
                       </span>
                     </div>
                     <!-- /end selections group (checkboxes and radios)-->
                   </fieldset>
                   <fieldset class="bg-primary">
                     <div class="slider-group">
                       <div class="input-group align-middle">
                         <span class="input-group-title">
                           <strong>Price per day <small>($)</small></strong>
                         </span>
                         <input id="js-price-output-1" type="number">
                         <input id="js-price-output-2" type="number">
                       </div>
                       <div class="slider" data-slider data-end="100" data-step="1">
                         <span class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="js-price-output-1" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></span>
                         <span class="slider-fill" data-slider-fill></span>
                         <span class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="js-price-output-2" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></span>
                       </div>
                     </div>
                     <button class="button rh-button secondary expanded flip-y" type="submit"><i class="zmdi zmdi-search fa fa-search"></i>
                       <span>Search</span>
                     </button>
                   </fieldset>
                 </form>
               </div><!-- /end .card-section -->
             </section><!-- /end .card -->

           </div><!-- /end .product-filter -->
         </aside><!-- /end .off-canvas-wrapper.product-filter-wrap -->

         <!-- Advertisment widget -->


         <!-- Testimonials widget-->
         <aside class="sidebar card block-shadow">



         <!-- Contact phone widget -->
         <aside class="sidebar callout block-shadow bg-secondary fill-to-top flex-container flex-dir-column align-right" data-interchange="[img/sidebars/sb-06.jpg, small]" style="height: 300px;">
           <div class="block-header">
             <h3 class="headline">Call to free</h3>
             <a class="phone sidebar-phone-large primary-color block-link" href="tel:YourPhoneNumber">347-222-7564</a>
           </div>
           <p>Our expert staff is standing by to answer your questions</p>
         </aside><!-- /end .sidebar -->

         <!-- Advertisment widget -->
         <aside class="sidebar callout block-shadow bg-secondary" data-interchange="[img/sidebars/sb-07.jpg, small]">
           <div class="block-header">
             <h3 class="h2 headline primary-color">Want to move?</h3>
             <p class="lead">Get a load on the road with <span class="mark">Renthire</span></p>
           </div>
           <img src="<?php echo e(asset('fontend/img/fleet/1.jpg')); ?>" alt="">
           <a class="button rh-button flip-y expanded" href="#">
             <i class="zmdi zmdi-more-vert fa fa-arrow-circle-right"></i>
             <span>Read more</span>
           </a>
         </aside>

       </div><!-- /end .column (SIDEBAR) -->
     </div><!-- /end .row -->

   </main>
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\car\framework\resources\views/frontend/search_car.blade.php ENDPATH**/ ?>