     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <main>

         <div class="section">
           <div class="row small-up-1 medium-up-2 large-up-3">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="column column-block">
               <form class="" action="<?php echo e(route('book.wedding')); ?>" method="post">
                 <?php echo e(csrf_field()); ?>

               <section class="card card-product simple bg-gray block-shadow">
                 <header class="card-divider bg-gray">
                   <h3 class="h4 headline"><?php echo e($row->package_name); ?></h3>
                   <ul class="rating">
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                     <li><i class="zmdi zmdi-star fa fa-star primary-color"></i></li>
                   </ul>
                 </header>
                 <img src="<?php echo e(asset('uploads/'.$row->image)); ?>" alt="">

                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val" style="font-size: 1rem;">
                       <input type="checkbox" id="vehicle1" name="price" value="<?php echo e($row->price); ?>">
                       <input type="hidden" id="vehicle1" name="wedding_pack_id" value="<?php echo e($row->id); ?>">
                       <input type="hidden" id="vehicle1" name="package_name" value="<?php echo e($row->package_name); ?>">
                       <input type="hidden" id="vehicle1" name="image" value="<?php echo e(asset('uploads/'.$row->image)); ?>">
                       Real Flower : <?php echo e($row->price); ?></span>
                   </div>
                   <div class="price mb0">
                     <sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
                     <span class="price-val" style="font-size: 1rem;">
                       <input type="checkbox" id="vehicle1" name="ar_price" value="<?php echo e($row->ar_price); ?>">
                       Artificial : <?php echo e($row->ar_price); ?></span>
                   </div>
                 </div>
                 <section class="card-section features flex-container align-middle align-spaced" style="margin-bottom:0px;">
                   <div>
                     <fieldset id="group2">
                       <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <input style="margin-left:20px;"type="radio" value="<?php echo e($col->id); ?>" name="color_id"><span style="margin-left:4px;"><?php echo e($col->name); ?></span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </fieldset>
                    </div>
                 </section>
                 <div class="card-section flex-container align-middle align-justify">
                   <div class="price mb0">
                      <?php echo e($row->description); ?></span>
                   </div>
                 </div>
                 <footer class="card-section features flex-container align-middle align-spaced">
                   <div><i class="rh rh-money-gear rh-fw"></i></div>
                   <div><i class="rh rh-steering rh-fw"></i></div>
                   <div><i class="rh rh-gearbox rh-fw"></i></div>
                   <div>
                 <?php if(!empty($customer_id=Session::get('id'))): ?>
                     <button class="button rh-button right-vb flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                       <span>Book Now</span>
                   </button>
                </form>
          <?php else: ?>
                  <button class="button rh-button right-vb flip-y expanded" data-open="js-modal-account"<i class="zmdi zmdi-assignment-check"></i>
                    <span>Book Now</span>
                </button>
               <?php endif; ?>
                 </div>
                 </footer>
               </section>
             </div><!-- /end .column -->
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div><!-- /end .row -->

           <!-- ===== PAGINATION ===== -->

           <div class="row">
             <div class="column small-12">
               <ul class="pagination text-center" aria-label="Pagination">
                 <li class="pagination-previous disabled">Prev<span class="show-for-sr">page</span></li>
                 <li class="current"><span class="show-for-sr">You're on page</span>1</li>
                 <li><a href="#" aria-label="Page 2">2</a></li>
                 <li><a href="#" aria-label="Page 3">3</a></li>
                 <li><a href="#" aria-label="Page 4">4</a></li>
                 <li class="ellipsis" aria-hidden="true"></li>
                 <li><a href="#" aria-label="Page 12">12</a></li>
                 <li><a href="#" aria-label="Page 13">13</a></li>
                 <li class="pagination-next"><a href="#" aria-label="Next page">Next<span class="show-for-sr">page</span></a></li>
               </ul>
             </div>
           </div>
         </div><!-- /end .section -->
       </main>

				<!-- ===== SITE FOOTER ===== -->
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/wedding.blade.php ENDPATH**/ ?>