     <?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- ===== MAIN PART ===== -->

     				<main class="mb0">

     					<!-- ===== MAP ===== -->

     					<div class="row inline-map">
     						<div class="column small-12">
     							<div class="map" id="inlineMap"></div>
     						</div>
     					</div>

     					<div class="section">
     						<div class="row">

     							<!-- ===== CONTACT LIST ===== -->

     							<div class="column small-12 large-4">

     								<div class="contacts-list vertical">

     									<div class="media-object">
     										<div class="media-object-section">
     											<div class="icon-box circle border secondary small"><i class="rh rh-clock"></i></div>
     										</div>
     										<div class="media-object-section">
     											<h4>Opening times:</h4>
     											<p>8.00 - 20.00</p>
     										</div>
     									</div>

     									<div class="media-object">
     										<div class="media-object-section">
     											<div class="icon-box circle border secondary small"><i class="rh rh-locations"></i></div>
     										</div>
     										<div class="media-object-section">
     											<h4>Address:</h4>
     											<p>4621 My Drive, NY 10001</p>
     										</div>
     									</div>

     									<div class="media-object">
     										<div class="media-object-section">
     											<div class="icon-box circle border secondary small"><i class="rh rh-phone"></i></div>
     										</div>
     										<div class="media-object-section">
     											<h4>Phone:</h4>
     											<ul class="no-bullet">
     												<li><a class="phone block-link" href="tel:YourPhoneNumber">347-222-7564</a></li>
     												<li><a class="phone block-link" href="tel:YourPhoneNumber">347-222-6475</a></li>
     											</ul>
     										</div>
     									</div>

     									<div class="media-object">
     										<div class="media-object-section">
     											<div class="icon-box circle border secondary small"><i class="rh rh-email"></i></div>
     										</div>
     										<div class="media-object-section">
     											<h4>Email:</h4>
     											<ul class="no-bullet">
     												<li><a class="mail block-link" href="mailto:sales@domain.com">sales@domain.com</a></li>
     												<li><a class="mail block-link" href="mailto:orders@domain.com">orders@domain.com</a></li>
     											</ul>
     										</div>
     									</div>
     								</div><!-- /end .contacts-list -->

     							</div><!-- /end .column -->

     							<!-- ===== CONTACT FORM ===== -->

     							<section class="column small-12 large-8">
     								<header class="s-header text-center">
     									<h2 class="headline">Send a message</h2>
     									<p class="subheader">Please send us a message via our contact form. If you have an urgent enquiry we would recommend giving us a call on our number above</p>
     								</header>

     								<form  action="<?php echo e(route('search_car')); ?>" method="GET">
     									<div class="callout alert" data-abide-error style="display: none;">
     										<p><i class="fi-alert"></i> There are some errors in your form.</p>
     									</div>
     									<div class="row small-up-1 medium-up-2">
     										<div class="column">
     											<label>
     												<span class="input-group">
     													<span class="input-group-label zmdi zmdi-collection-text fa fa-file-text"></span>
     													<select class="input-group-field placeholder" name="subject" required>
     														<option disabled selected hidden value="">Subject</option>
     														<option value="Price and availability">Price and availability</option>
     														<option value="Existing reservation">Existing reservation</option>
     														<option value="Feedback and recommendations">Feedback and recommendations</option>
     														<option value="Partnership">Partnership</option>
     														<option value="Work at Top Rent A Car">Work at Top Rent A Car</option>
     													</select>
     												</span>
     											</label>
     											<label>
     												<span class="input-group">
     													<span class="input-group-label zmdi zmdi-case-check fa fa-briefcase"></span>
     													<select class="input-group-field placeholder" name="service" required>
     														<option disabled selected hidden value="">Service</option>
     														<option value="Towing service">Towing service</option>
     														<option value="Van hire">Van hire</option>
     														<option value="Self-loading crane truck hire">Self-loading crane truck hire</option>
     														<option value="Moving services">Moving services</option>
     														<option value="Transportation">Transportation</option>
     														<option value="Used vehicles for sell">Used vehicles for sell</option>
     													</select>
     												</span>
     											</label>
     											<label>
     												<span class="input-group">
     													<span class="input-group-label zmdi zmdi-truck fa fa-truck"></span>
     													<select class="input-group-field placeholder" name="prooducttype" required>
     														<option disabled selected hidden value="">Vehicle type</option>
     														<option value="Panel van">Panel van</option>
     														<option value="Box Truck">Box Truck</option>
     														<option value="Wrecker">Wrecker</option>
     														<option value="Flatbed">Flatbed</option>
     														<option value="Selfloader-crane">Selfloader-crane</option>
     														<option value="Refrigerated Box Truck">Refrigerated Box Truck</option>
     													</select>
     												</span>
     											</label>
     										</div>
     										<div class="column">
     											<label>
     												<span class="input-group">
     													<span class="input-group-label zmdi zmdi-account fa fa-user"></span>
     													<input class="input-group-field" type="text" name="name" placeholder="Your name" required>
     												</span>
     											</label>
     											<label>
     												<span class="input-group">
     													<span class="input-group-label zmdi zmdi-phone fa fa-phone"></span>
     													<input class="input-group-field" type="text" name="phone" data-type-phone placeholder="Your phone number" required>
     												</span>
     											</label>
     											<label>
     												<span class="input-group">
     													<span class="input-group-label zmdi zmdi-email fa fa-envelope"></span>
     													<input class="input-group-field" type="email" name="email" placeholder="Your mail" required>
     												</span>
     											</label>
     										</div>
     									</div>
     									<label>
     										<span class="input-group">
     											<span class="input-group-label zmdi zmdi-edit"></span>
     											<textarea name="message" placeholder="Your message" required></textarea>
     										</span>
     									</label>
     									<div class="text-center">
     										<button class="button rh-button mb0" type="submit"><i class="zmdi zmdi-mail-send"></i>
     											<span>Send message</span>
     										</button>
     									</div>
     								</form>
     							</section>

     						</div><!-- /end .row -->
     					</div><!-- /end .section -->
     				</main>

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
				<!-- ===== SITE FOOTER ===== -->
       <?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/contact.blade.php ENDPATH**/ ?>