     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- ===== MAIN PART ===== -->
     <main>
   					<div class="row align-justify" id="js-sticky-container-row">
   						<div class="column column-block small-12 large-3 show-for-large" data-sticky-container>

   							<!-- ===== PAGE NAVIGATION ===== -->

   							<aside class="sidebar card block-shadow" data-sticky data-sticky-on="large" data-top-anchor="el-card-article-1:top" data-margin-top="10" data-btm-anchor="js-sticky-container-row:bottom">
                  <div class="row small-up-1 medium-up-12 el-wrap">
                    <div class="column small-12 medium-12">
                      <div class="card card-team card-slide block-shadow">
                        <?php if($profile_pic): ?>  
                        <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/m.jpg')); ?>" alt="Frank Desmond, general director">
                        <?php else: ?>
                        <img class="grayscale" src="<?php echo e(asset('uploads/003e0c09-8ec8-40cd-bd6e-18f9fe1a8382.jpg')); ?>" alt="Frank Desmond, general director">
                        <?php endif; ?>
                        <div class="card-divider">
                          <h4 class="h5"><?php echo e($user_info->name); ?></h4>
                          <p class="subheader"><?php echo e($user_info->email); ?></p>
                          <div class="card-team-contacts">
                            <a class="phone block-link" href="tel:3472224765">347-222-4765</a>
                            <div class="button-group socials align-center">
                              <a class="button hollow secondary-white" href="#"><i class="zmdi zmdi-facebook fa fa-facebook icon"></i></a>
                              <a class="button hollow secondary-white" href="#"><i class="zmdi zmdi-google fa fa-google icon"></i></a>
                              <a class="button hollow secondary-white" href="#"><i class="zmdi zmdi-linkedin fa fa-linkedin icon"></i></a>
                              <a class="button hollow secondary-white" href="#"><i class="zmdi zmdi-instagram fa fa-instagram icon"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="card-divider">
   									<h2 class="h4 headline">Navigation</h2>
   								</div> -->
   								<!-- <nav class="rh-menu">
   									<ul class="menu vertical" data-magellan data-offset="114">
   										<li>
   											<a href="#el-card-article-1">Card article #1</a>
   										</li>
   										<li>
   											<a href="#el-card-article-2">Card article #2</a>
   										</li>
   										<li>
   											<a href="#el-card-article-3">Card article simple</a>
   										</li>
   										<li>
   											<a href="#el-card-icon">Card-icon</a>
   										</li>
   										<li>
   											<a href="#el-card-product-1">Product card #1</a>
   										</li>
   										<li>
   											<a href="#el-card-product-2">Product card #2</a>
   										</li>
   										<li>
   											<a href="#el-card-team">Team card #1</a>
   										</li>
   									</ul>
   								</nav> -->
   							</aside><!-- /end .sidebar -->

   						</div>
   						<div class="column column-block small-12 large-8">


   							<div class="block-header border" id="el-card-article-1" data-magellan-target="el-card-article-1">
   								<h2 class="h3 headline">Booking History<span class="mark"></span></h2>
   								<hr class="dotted">
   							</div>
                <div class="el-wrap">
								<table class="el-tables">
									<thead>
										<tr>
                      <th>Booking Type</th>
                      <th>BookingID</th>
                      <th>Date</th>
                      <th>Pickup Info</th>
                      <th>Number of Car</th>
                      <th>Car Info</th>
                      <th style="width100px">Car Image</th>
                      <th>Color</th>
                      <th>Driver Info</th>
                      <th>Status</th>
                      <th>Booking Fare</th>
                      <th>Option</th>
										</tr>
									</thead>
									<tbody>
                    <?php $__currentLoopData = $booking_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($book->type); ?></td>
											<td><?php echo e($book->book_id); ?></td>
											<td><?php echo e($book->trip_date); ?></td>
											<td><?php echo e($book->pickup_addr); ?></td>
                    	<td><?php echo e($book->car); ?></td>
                    	<td><?php echo e($book->color); ?></td>
                    	<td>
                      <?php if($book->vehicle_name): ?>
                        <?php echo e($book->vehicle_name); ?> <?php echo e($book->vehicle_model); ?> </br>Car No:<?php echo e($book->vehicle_number); ?>

                       <?php endif; ?>
                       </td>
                    	<td>
                        <?php if($book->vehicle_image): ?>
                        <img src="<?php echo e(asset('uploads/'.$book->vehicle_image)); ?>" height="100px" width="100px">
                        <?php endif; ?>
                      </td>
                    	<td><?php echo e($book->driver_name); ?><?php echo e($book->driver_id); ?>

                        <?php 	 $phone = DB::table('users_meta')
             						 ->where('user_id', $book->driver_id)
             						 ->where('key', 'phone')
             						 ->select('value')
             						 ->get();
                         foreach($phone as $ph){
                           echo $ph->value;
                         }
                          ?>
                      </td>
                    	<td><?php echo e($book->ride_status); ?></td>
                      <td><?php echo e($book->trip_fare); ?></td>
											<td>
                        <?php if(empty($book->vehicle_name)): ?>

                           <a href="<?php echo e(url('/bookings/'.$book->book_id.'/delete')); ?>"><div style="font-size: 1rem;" class="icon-box alert border float-center">
                           <i class="zmdi zmdi-delete fa fa-trash"></i>
                         </div></a>
                         <?php if($book->ride_status=='Upcoming'): ?>
                         <div class="column small-12 medium-3">
          								<button style="padding:.5em 1em;" class="button" type="button"  target="#deleteModal" data-open="el-reveal-basic">Cancle</button>
          								<div class="reveal" id="el-reveal-basic" data-reveal data-animation-in="slide-in-down" data-animation-out="slide-out-down">
          									<button class="close-button" data-close aria-label="Close modal">
          										<span></span>
          									</button>
                       <form class="card-section form-primary flex-container flex-dir-column align-justify"  action="<?php echo e(route('cancle_ride')); ?>" method="POST">
                         <?php echo e(csrf_field()); ?>

          									<h3>Add Reason</h3>
                            <label>
      											<span class="input-group">
      												<span class="input-group-label zmdi zmdi-edit"></span>
                              <input type="hidden" name="booking_id" value="<?php echo e($book->book_id); ?>">
      												<textarea name="reason" required="" style="margin: 0px; width: 100%; height: 30%;"></textarea>
      											</span>
      										</label>
                          <button class="button rh-button alert" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                              <span>Cancle Now</span>
                          </button>
                      </form>
          								</div>
          							</div>
                         <?php endif; ?>
                         <?php endif; ?>
										</tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
							</div>


   						</div>
   					</div>
   				</main>
          <script type="text/javascript">
          $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('url');
            console.log(id);
            $('#deleteForm').attr("action", url);
          });
          </script>
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/user_profile.blade.php ENDPATH**/ ?>