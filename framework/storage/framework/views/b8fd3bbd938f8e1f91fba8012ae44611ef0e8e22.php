     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


 				<main class="mb0">
 					<div class="section-boxed is-fixed" data-interchange="[img/sections/s-pattern-03.jpg, medium]">
 						<div class="row pricing-tables-row collapse align-center">
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
												<table class="small">
													<tbody>
                            <?php $__currentLoopData = $slot_rent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td style="width:10%">
                              <div class="checkbox">
                              <label>
                                <input id="checkbox6" type="checkbox"  style="padding:0px;">
                                <span class="custom-checkbox warning"><i class="icon-check"></i>
                                </span>
                              </label>
                              </div>
                            </td>
                            <td><?php echo e($rent->time); ?> <strong style="margin-left:20px">  <?php echo e(number_format($rent->rent,2)); ?></strong>
                            </td>
                            <td>
                              <input type="number" style="height:20px;width:30px;padding:0px;background-color:none;" name="" value="1">
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												</tbody></table>
											</div>
										</div>
										<div class="card-section card-footer button-group stacked-for-small">
											<a class="button rh-button secondary left-vb expanded" href="fleet-details-right-sidebar.html"><i class="zmdi zmdi-info fa fa-info-circle"></i>
												<span>Details</span>
											</a>
											<a class="button rh-button right-vb flip-y expanded" href="#"><i class="zmdi zmdi-assignment-check fa fa-check-square"></i>
												<span>Book now</span>
											</a>
										</div>
									</div>
								</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 						</div>
 					</div>
 				</main>
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\car\framework\resources\views/frontend/regular_package.blade.php ENDPATH**/ ?>