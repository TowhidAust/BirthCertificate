<footer class="site-footer bg-secondary has-overlay s-border" data-interchange="[img/sections/s-pattern-06.jpg, small]">
					<div class="row align-center">
						<div class="column small-12 medium-7 large-4 large-order-2 text-center">

							<div class="logo-container">
								<a href="index.html">
									<span class="text-hide">"Renthire" - html5 template</span>
									<img src='{{asset('assets/images/'.Hyvikk::get('logo_img'))}}' alt='"Renthire" - html5 template'>
								</a>
							</div>

							<div class="site-footer-section no-border">
								<img src="img/vehicle-range.png" alt="">
								<small>{{ Hyvikk::frontend('about_us') }}</small>
							</div><!-- /end .site-footer-section -->

							<div class="site-footer-section no-border">
								<ul class="no-bullet">
									<li>
										<i class="zmdi-hc-fw zmdi zmdi-pin fa-fw fa fa-map-marker"></i>
										<button class="block-link" type="button" data-open="js-map-fullscreen">{{Hyvikk::get('badd2')}}</button>
									</li>
									<li>
										<i class="zmdi-hc-fw zmdi zmdi-phone fa-fw fa fa-phone"></i>
										<a class="phone block-link" href="tel:YourPhoneNumber">{{ Hyvikk::frontend('customer_support') }}</a>
									</li>
									<li>
										<i class="zmdi-hc-fw zmdi zmdi-email fa-fw fa fa-envelope"></i>
										<a class="mail block-link" href="{{ Hyvikk::frontend('contact_email') }}">{{ Hyvikk::frontend('contact_email') }}</a>
									</li>
								</ul>
							</div><!-- /end .site-footer-section -->

							<div class="site-footer-section no-border">
								<div class="button-group socials  align-center">
									<a class="button hollow secondary-white" href="{{ Hyvikk::frontend('facebook') }}"><i class="zmdi zmdi-facebook fa fa-facebook icon"></i></a>
									<a class="button hollow secondary-white" href="{{ Hyvikk::frontend('contact_email') }}"><i class="zmdi zmdi-google fa fa-google icon"></i></a>
									<a class="button hollow secondary-white" href="{{ Hyvikk::frontend('linkedin') }}"><i class="zmdi zmdi-linkedin fa fa-linkedin icon"></i></a>
									<a class="button hollow secondary-white" href="{{ Hyvikk::frontend('instagram') }}"><i class="zmdi zmdi-instagram fa fa-instagram icon"></i></a>
								</div>
							</div><!-- /end .site-footer-section -->

						</div><!-- /end .column -->
						<div class="column small-12 medium-6 large-4 large-order-1">

							<div class="site-footer-section no-border">
								<h3 class="h5 headline">Newsletter</h3>
								<form class="simple-form form-secondary" data-abide>
									<div class="input-group">
										<input class="input-group-field" id="js_subscribe-footer" type="text" placeholder="Subscribe company news" required>
										<button class="button transparent secondary-white" type="button"><i class="zmdi-hc-fw zmdi zmdi-email fa-fw fa fa-envelope fa-fw"></i>
										</button>
									</div>
								</form>
							</div><!-- /end .site-footer-section -->

							<div class="site-footer-section no-border row small-up-2">
								<section class="column">
									<h3 class="h5 headline">Navigation</h3>

									<ul class="zmdi-hc-ul fa-ul colored">
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="index.html">Home</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="about-us.html">Company</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="services-cards.html">Services</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="fleet-grid-left-sidebar.html">Fleet</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="contact-us-1.html">Contacts</a>
										</li>
									</ul>
								</section><!-- /end .column -->
								<section class="column">
									<h3 class="h5 headline">Quick links</h3>
									<ul class="zmdi-hc-ul fa-ul colored">
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="#">Vehicle recovery</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="#">Van hiring</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="#">Private car rental</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="#">Self-loading truck hiring</a>
										</li>
										<li>
											<i class="zmdi-hc-li zmdi zmdi-forward fa-li fa fa-arrow-circle-right"></i>
											<a class="block-link" href="#">Used cars</a>
										</li>
									</ul>
								</section><!-- /end .column -->
							</div><!-- /end .site-footer-section -->

						</div><!-- /end .column -->
						<div class="column small-12 medium-6 large-4 large-order-3">

							<div class="site-footer-section no-border">
								<h3 class="h5 headline">Have a questions?</h3>
								<form class="form-secondary text-center" data-abide novalidate>
									<label>
										<span class="input-group">
											<span class="input-group-label zmdi zmdi-account fa fa-user"></span>
											<input class="input-group-field" type="text" name="name" placeholder="Your name" required>
										</span>
									</label>
									<label>
										<span class="input-group">
											<span class="input-group-label zmdi zmdi-email fa fa-envelope"></span>
											<input class="input-group-field" type="email" name="phone" placeholder="Your mail" required>
										</span>
									</label>
									<label>
										<span class="input-group">
											<span class="input-group-label zmdi zmdi-edit"></span>
											<textarea name="message" placeholder="Your message" required></textarea>
										</span>
									</label>
									<button class="button expanded" type="submit"><i class="zmdi zmdi-mail-send"></i>
										<span>Send message</span>
									</button>
								</form>
							</div><!-- /end .site-footer-section -->
						</div><!-- /end .column -->
					</div><!-- /end .row -->

					<div class="site-footer-bottom bg-secondary-shade">
						<div class="row small-up-1 medium-up-2 align-justify align-middle">
							<div class="column"><p class="copyright">Copyright &copy; 2017 Renthire Rental Company, Inc.</p></div>
							<div class="column">
								<ul class="menu vertical large-horizontal">
									<li><a class="block-link" href="#">Privacy Policy</a></li>
									<li><a class="block-link" href="#">Terms of Service</a></li>
									<li><a class="block-link" href="#">Sitemap</a></li>
								</ul>
							</div>
						</div>
					</div>
				</footer><!-- /end .site-footer -->

				<!-- ===== MOBILE BOTTOM BAR ===== -->

				<div class="mobile-bottom-bar bg-secondary-shade flex-container align-justify hide-for-large" id="js-bottom-bar" data-magellan>
					<div class="buuton-group">
						<a class="button hollow secondary-white small" href="tel:+12345678900"><i class="zmdi fa zmdi-phone fa-phone" aria-hidden="true"></i></a>
						<a class="button hollow secondary-white small" href="mailto:YourEmailAddres"><i class="zmdi fa zmdi-email fa-mail" aria-hidden="true"></i></a>
					</div>
					<div class="buuton-group">
						<a class="button hollow secondary-white small" href="#js-top-bar"><i class="zmdi zmdi-long-arrow-up fa fa-arrow-up" aria-hidden="true"></i></a>
						<button class="button hollow secondary-white button" type="button" data-toggle="js-main-off-canvas-right"><span class="burger-icon"></span>Menu</button>
					</div>
				</div><!-- /end .mobile-bottom-bar -->

				<!-- ===== SCROLL UP BUTTON ===== -->

				<div class="scroll-up show-for-large" id="js-scroll-up" data-magellan>
					<a class="flex-container align-center align-bottom" href="#js-top-bar"><i class="rh rh-van-fleet" aria-hidden="true"></i>
						<span class="show-for-sr">Scroll up</span>
					</a>
				</div>

			</div><!-- /end .off-canvas-content -->
		</div><!-- /end .off-canvas-wrapper -->

		<!-- ===== POPUP AND MODAL WINDOWS ===== -->

		<!-- Form Alert -->
		<div id="form-alert-popup" class="reveal tiny" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
			<button class="close-button" data-close aria-label="Close modal"><span></span></button>
			<div class="text-center">
				<div class="block-header ajax-message"></div>
				<button class="button rh-button flip-y" data-close aria-label="Close modal">
					<i class="zmdi zmdi-close fa fa-close"></i>
					<span>Close window</span>
				</button>
			</div>
		</div>

		<!-- Googlemap reveal modals -->
		<div class="small reveal reveal-map" id="js-map-small" data-reveal>
			<button class="close-button" data-close aria-label="Close modal"><span></span></button>

			<div class="map" id="js-reveal-map-small"></div>
		</div>

		<div class="large reveal reveal-map" id="js-map-large" data-reveal>
			<button class="close-button" data-close aria-label="Close modal"><span></span></button>

			<div class="map" id="js-reveal-map-large"></div>
		</div>

		<div class="full reveal reveal-map" id="js-map-fullscreen" data-reveal>
			<button class="close-button" data-close aria-label="Close modal"><span></span></button>

			<div class="map" id="js-reveal-map-fullscreen"></div>
		</div>

		<!-- Topbar search modal-->
		<div class="reveal reveal-search" id="js-topbar-search" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
			<button class="close-button" data-close aria-label="Close modal"><span></span></button>

			<form class="form-secondary" data-abide novalidate>
				<label>
					<input class="input-group-field" type="search" placeholder="Type &amp; hit enter" required>
					<span class="form-error" data-abide-error>This field is required</span>
				</label>
				<input type="submit" hidden>
			</form>
		</div>

		<!-- Register/Login modal-->
		<div class="reveal" id="js-modal-account" data-reveal data-animation-in="scale-in-up" data-animation-out="scale-out-down">
			<button class="close-button" data-close aria-label="Close modal"><span></span></button>

			<div class="js-tabs-container">

				<!-- Tabs buttons -->
				<ul class="tabs secondary expanded" id="js-modal-tabs" data-tabs data-auto-focus="false">
					<li class="tabs-title is-active">
						<a href="#js-modal-login-panel"> <i class="zmdi zmdi-sign-in zmdi-hc-fw fa fa-sign-in fa-fw"></i>Sign in</a>
					</li>
					<li class="tabs-title">
						<a href="#js-modal-register-panel"> <i class="zmdi zmdi-account-add zmdi-hc-fw fa fa-user-plus fa-fw"></i>New account</a>
					</li>
				</ul>

				<!-- Tabs content -->
				<div class="tabs-content" data-tabs-content="js-modal-tabs" data-auto-focus="false">

					<div class="tabs-panel is-active" id="js-modal-login-panel">
						<!-- Login form-->
						<form  action="{{url('/login')}}" method="POST">

						 {{csrf_field()}}
						 <label>
						   <span class="input-group">
						     <span class="input-group-label zmdi zmdi-email fa fa-envelope"></span>
						     <input class="input-group-field" type="email" name="username" placeholder="Your mail" required>
						   </span>
						 </label>
						 <label>
						   <span class="input-group">
						     <span class="input-group-label zmdi zmdi-lock fa fa-lock"></span>
						     <input class="input-group-field" type="password" name="password" placeholder="Your password" required>
						   </span>
						 </label>
						 <div class="text-center">
						   <button class="button rh-button " type="submit"><i class="zmdi zmdi-lock fa fa-unlock"></i>
						     <span>Login</span>
						   </button>
						 </div>
						</form>
						<!-- /end Login form-->
					</div>

					<div class="tabs-panel" id="js-modal-register-panel">

						<!-- Register form-->
						<form  action="{{url('/registration')}}" method="POST">

						 {{csrf_field()}}
							<fieldset>
								<label>
									<span class="input-group">
										<span class="input-group-label zmdi zmdi-account fa fa-user"></span>
										<input class="input-group-field" name="user_name" type="text" placeholder="Your name" required>
									</span>
								</label>
								<label>
									<span class="input-group">
										<span class="input-group-label zmdi zmdi-email fa fa-envelope"></span>
										<input class="input-group-field" name="emailid" type="email" placeholder="Your mail" required>
									</span>
								</label>
								<label>
									<span class="input-group">
										<span class="input-group-label zmdi zmdi-phone fa fa-phone"></span>
										<input class="input-group-field" name="mobno" type="text"  placeholder="Your phone number" required>
									</span>
								</label>
								<label>
									<span class="input-group">
										<span class="input-group-label zmdi zmdi-account fa fa-user"></span>
										<select id="thanato" name="gender" class="input-group-field vehicles dynamic" required style="width: 100%" required>
											<option value="1">Male</option>
											<option value="0">Female</option>
										</select>
									</span>
								</label>
								<label>
									<span class="input-group">
										<span class="input-group-label zmdi zmdi-lock fa fa-lock"></span>
										<input class="input-group-field" name="password" type="password"  placeholder="Your password" required>
									</span>
								</label>
								<label>
									<span class="input-group">
										<span class="input-group-label zmdi zmdi-lock fa fa-lock"></span>
										<input class="input-group-field" name="repassword" type="password"  placeholder="Repeat your password" required>
									</span>
								</label>
							</fieldset>
							<fieldset>
								<div class="checkbox inline">
									<label>
										<input type="checkbox">
										<span class="custom-checkbox"><i class="icon-check"></i>
										</span>Subscribe me to the newsletter
									</label>
								</div>
							</fieldset>
							<div class="text-center">
								<button class="button rh-button " type="submit"><i class="zmdi zmdi-check-square fa fa-check-square"></i>
									<span>Register</span>
								</button>
							</div>
						</form><!-- /end Register form-->

					</div><!-- /end .tabs-panel -->
				</div><!-- /end .tabs-content -->
			</div><!-- /end .js-tabs-container -->

		</div><!-- /end Register/Login moda -->

		<!-- ===== SCRIPTS ===== -->

<script src='http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<!-- <script src='js/vendor/jquery.min.js'></script> -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/animsition.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/foundation.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/what-input.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/owl.carousel.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/shuffle.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/inputmask.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/inputmask.phone.extensions.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/lightcase.js')}}"></script>
<script src="{{asset('fontend/js/vendor/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/jquery.incremental-counter.js')}}"></script>
<script src="{{asset('fontend/js/vendor/slick.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/jquery.barrating.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/jquery.countdown.min.js')}}"></script>
<script src="{{asset('fontend/js/vendor/flatpickr.min.js')}}"></script>
<!-- <script src="{{asset('fontend/js/vendor/imagesloaded.pkgd.min.js')}}"></script> -->

<script src="{{asset('fontend/js/main.js')}}"></script>

<!-- googleMaps-->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<!-- An alternative way to include Google fonts -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>-->
<!-- <script>WebFont.load({google: {families: ['Poppins:400,600,700','Lato:400,300,300italic,400italic,700,900']}});</script>-->

</body>

</html>
