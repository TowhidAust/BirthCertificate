     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


 				<main class="mb0">
 					<div class="section-boxed is-fixed" data-interchange="[<?php echo e(asset('fontend/img/sections/s-pattern-03')); ?>, medium]">
 						<div class="row pricing-tables-row collapse align-center">
              <?php if(!empty($wedding_pack_id)): ?>
      <div class="column small-12 large-10">
          <form class="" action="<?php echo e(route('book.wedding.car')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

                  <div class="block-header border">
                    <h2 class="h4">Wedding Packge</h2>
                    <hr class="dotted">
                  </div>
                  <div class="el-wrap">
                    <table class="small el-tables">
                      <thead>
                        <tr>
                          <th>Package Name</th>
                          <th>type</th>
                          <th>Date</th>
                          <th>Pickup Location</th>
                          <th>Rent</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo e($package_name); ?></td>
                          <td>
                            <?php if(!empty($price)): ?>
                            Real Flower
                            <?php else: ?>
                            Artificial Flower
                            <?php endif; ?>
                          </td>
                          <td>
                            <fieldset class="pt0">
                              <div class="input-group">
                                <span class="input-group-label zmdi zmdi-calendar-check"></span>
                                <input class="input-group-field js-datepicker-date" type="text" name="trip_date" placeholder="Pick up date">
                              </div>
                            </fieldset></td>
                          <td>  <fieldset class="pt0">
                            <label>
                              <span class="input-group">
                                <span class="input-group-label zmdi zmdi-pin-off fa fa-map-marker"></span>
                                <input class="input-group-field placeholder" type="text" name="pickup_location" placeholder="Write your pickup point" required>
                              </span>
                            </label>
                            </fieldset></td>
                            <td><?php echo e($price); ?><?php echo e($ar_price); ?>

                              <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="wedding_pack_id" value="<?php echo e($wedding_pack_id); ?>">
                              <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="price" value="<?php echo e($price); ?>">
                              <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="ar_price" value="<?php echo e($ar_price); ?>">
                              <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="color_id" value="<?php echo e($color_id); ?>">
                            </td>
                        </tr>
                        <tr>
                          <td colspan="4" style="color:red;">* If you need only wedding decurated car click skip to book!</td>
                          <td>
                            <button class="button rh-button right-vb flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                              <span>Skip to Book</span>
                          </button>
                        </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </form>
            </div>
              <?php endif; ?>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="column small-12 medium-4" style="padding:15px;">
									<div class="card card-product extended stacked block-shadow">
										<div class="card-divider">
											<h3 class="headline"><?php echo e($row->vehicletype); ?></h3>
										</div>
										<div class="card-section media-object stack-for-small mb0">
											<div class="media-object-section"><img class="card-media" src="<?php echo e(asset('uploads/'.$row->icon)); ?>" alt="">
												<div class="card-product-data flex-container align-justify">
													<div class="price-wrap">
														<div class="price"><sup><i class="zmdi zmdi-money fa fa-dollar"></i></sup>
															<span class="price-val">39</span><sup>/ day</sup>
															<ul class="rating">
																<li><i class="zmdi zmdi-star fa fa-star primary-color"></i>
																</li>
																<li><i class="zmdi zmdi-star fa fa-star primary-color"></i>
																</li>
																<li><i class="zmdi zmdi-star fa fa-star primary-color"></i>
																</li>
																<li><i class="zmdi zmdi-star fa fa-star primary-color"></i>
																</li>
																<li><i class="zmdi zmdi-star fa fa-star gray-shade-color"></i>
																</li>
															</ul>
														</div>
													</div>
													<ul class="card-product-features">
														<li><i class="rh rh-user rh-fw"></i>X 3
														</li>
														<li><i class="rh rh-fuel rh-fw"></i>diesel
														</li>
														<li><i class="rh rh-gearbox rh-fw"></i>manual
														</li>
													</ul>
												</div>
											</div>
											<div class="media-object-section">
												<div class="card-features-boxes flex-container">
													<div class="media-object">
														<div class="media-object-section"><i class="rh rh-money-gear"></i>
														</div>
														<div class="media-object-section">
															<p><?php echo e($row->displayname); ?>

															</p>
														</div>
													</div>
													<div class="media-object">
														<div class="media-object-section"><i class="rh rh-highway"></i>
														</div>
														<div class="media-object-section">
															<p><?php echo e($row->seats); ?> Seats
															</p>
														</div>
													</div>
													<div class="media-object">
														<div class="media-object-section"><i class="rh rh-gps"></i>
														</div>
														<div class="media-object-section">
															<p>GPS navigation
															</p>
														</div>
													</div>
													<div class="media-object">
														<div class="media-object-section"><i class="rh rh-steering"></i>
														</div>
														<div class="media-object-section">
															<p>Additional driver
															</p>
														</div>
													</div>
												</div>
                        <?php
                       $slot_rent= DB::table('car_slot')
                                   ->join('time_slot', 'car_slot.t_slot_id', '=', 'time_slot.id')
                                   ->where('car_slot.v_type_id',$row->id)
                                   ->select('*','car_slot.id as slot_id')
                                   ->get();
                        ?>
                        <form class="" action="<?php echo e(route('book.guest.car')); ?>" method="post">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="wedding_pack_id" value="<?php echo e($wedding_pack_id); ?>">
                          <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="price" value="<?php echo e($price); ?>">
                          <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="ar_price" value="<?php echo e($ar_price); ?>">
                          <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="car_name" value="<?php echo e($row->displayname); ?>">
                            <input type="hidden" style="height:20px;width:30px;padding:0px;background-color:none;" name="color_id" value="<?php echo e($color_id); ?>">
												<table class="small">
													<tbody>
                            <tr>
                              <td colspan="2">
                                <fieldset class="pt0">
                                  <label>
                                    <span class="input-group">
                                      <span class="input-group-label zmdi zmdi-pin-off fa fa-map-marker"></span>
                                      <input class="input-group-field placeholder" type="text" name="pickup_location" placeholder="Write your pickup point" required>
                                    </span>
                                  </label>
                                </fieldset>
                              </td>
                              <td >
                                <fieldset class="pt0">
                                  <div class="input-group">
                                    <span class="input-group-label zmdi zmdi-calendar-check"></span>
                                    <input class="input-group-field js-datepicker-date" type="text" name="trip_date" placeholder="Pick up date">
                                  </div>
                                </fieldset>
                              </td>
                            </tr>
                            <?php $__currentLoopData = $slot_rent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td style="width:10%">
                              <div class="checkbox">
                              <label>
                                <input type="checkbox" id="vehicle1" name="slot_id[]" value="<?php echo e($rent->slot_id); ?>" required>
                                <span class="custom-checkbox warning"><i class="icon-check"></i>
                                </span>
                              </label>
                              </div>
                            </td>
                            <td><?php echo e($rent->time); ?> <strong style="margin-left:20px">  <?php echo e(number_format($rent->rent,2)); ?></strong>
                            </td>
                            <td>
                              <input type="number" style="height:20px;width:30px;padding:0px;background-color:none;" name="car[]" value="1">
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												</tbody>
                      </table>
											</div>
										</div>
										<div class="card-section card-footer button-group stacked-for-small">
											<a class="button rh-button secondary left-vb expanded" href="#"><i class="zmdi zmdi-info fa fa-info-circle"></i>
												<span>Details</span>
											</a>
                      <div>
                        <?php if(!empty($customer_id=Session::get('id'))): ?>
                        <button class="button rh-button right-vb flip-y expanded" type="submit"><i class="zmdi zmdi-assignment-check"></i>
                          <span>Book Now</span>
                       </button>
                     </form>
                       <?php else: ?>
                     <button class="button rh-button right-vb flip-y expanded"  data-open="js-modal-account"><i class="zmdi zmdi-assignment-check"></i>
                       <span>Book Now</span>
                    </button>
                      <?php endif; ?>
                    </div>
										</div>
									</div>
								</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 						</div>
 					</div>
 				</main>
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/regular_package.blade.php ENDPATH**/ ?>