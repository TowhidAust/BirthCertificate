<!DOCTYPE html>
<html class="no-js" lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Highway360</title>
		<link rel="shortcut icon" href="<?php echo e(asset('fontend/img/favicon.ico')); ?>" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Google fonts-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700%7CLato:400,300,300italic,400italic,700,900" rel="stylesheet" type="text/css">

		<!-- Zurb Foundation 6 styles-->
		<link rel="stylesheet" href="<?php echo e(asset('fontend/css/foundation.css')); ?>">
		<link rel="stylesheet" href="css/foundation-motion-ui.css')}}">

		<!-- Iconic fonts stylesheets-->
		<link rel="stylesheet" href="<?php echo e(asset('fontend/css/material-design-iconic-font.css')); ?>">
		<!-- <link rel="stylesheet" href="css/font-awesome.min.css">-->
		<link rel="stylesheet" href="<?php echo e(asset('fontend/css/renthire-icons.css')); ?>">

		<!-- Plugins stylesheets-->
		<link rel="stylesheet" href="<?php echo e(asset('fontend/css/plugins.css')); ?>">

		<!-- Template stylesheet-->
		<link rel="stylesheet" href="<?php echo e(asset('fontend/css/style.css')); ?>">

	</head>

	<body>
		<!--[if lte IE 10]><div class="browserupgrade-overlay"><p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p></div><![endif]-->

		<!-- SVG corner for testimonials-->
		<svg xmlns="http://www.w3.org/2000/svg" style="display:none;position:absolute;"><symbol id="corner" viewBox="0 0 20 12"><path fill="none" stroke="#d6d6d6" d="M0 0l10 10L20 0"/></symbol></svg>

		<div class="off-canvas-wrapper wrapper">

			<!-- Foundation off-canvas -->
			<div class="off-canvas position-right" id="js-main-off-canvas-right" data-off-canvas data-content-scroll="false" data-auto-focus="false">

				<!-- Mobile navigation -->
				<nav class="mobile-navigation rh-menu" id="js_mobile-menu">

					<div class="mobile-navigation-header">
						<button class="close-button" data-close aria-label="Close menu">
							<span></span>
						</button>
					</div>

					<!-- Mobile main menu -->
					<ul class="vertical menu" data-drilldown>
						<li><a href="<?php echo e(route('index')); ?>">Home</a></li>
						<li><a href="<?php echo e(route('wedding')); ?>">Wedding</a></li>
						<li><a href="<?php echo e(route('regular_package')); ?>">Guest Car</a></li>
						<li><a href="<?php echo e(route('package')); ?>">Package</a></li>
						<li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
					</ul><!-- /end .menu (main mobile menu) -->
				</nav><!-- /end .mobile-navigation -->

			</div><!-- /end .off-canvas -->

			<!-- off-canvas-content - page content -->
			<div class="off-canvas-content" data-off-canvas-content>

				<!-- ===== TOP BAR ===== -->

				<div class="topbar" id="js-top-bar" data-magellan-target="js-top-bar">
					<div class="row">

						<!-- Top bar column #1 -->
						<div class="column small-2 medium-4 large-3 topbar-column">
							<div class="media-object topbar-icon">
								<div class="media-object-section">
									<div class="icon-box border circle thin"><i class="rh rh-phone"></i>
									</div>
								</div>
								<div class="media-object-section topbar-info show-for-medium">
									<span>Call us now</span>
									<a class="block-link" href="tel:YourPhoneNumber">347-222-7564</a>
								</div>
							</div>
						</div><!-- /end .topbar-column -->

						<!-- Top bar column #2 -->
						<div class="column small-2 medium-4 large-3 topbar-column">
							<div class="media-object topbar-icon">
								<div class="media-object-section">
									<div class="icon-box border circle thin"><i class="rh rh-email"></i></div>
								</div>
								<div class="media-object-section topbar-info show-for-medium">
									<span>Ask for the question</span>
									<a class="block-link" href="mailto:sales@domain.com">sales@domain.com</a>
								</div>
							</div>
						</div><!-- /end .topbar-column -->

						<!-- Top bar column #3 -->
						<div class="column large-3 topbar-column show-for-large">
							<div class="media-object topbar-icon">
								<div class="media-object-section">
									<div class="icon-box border circle thin"><i class="rh rh-locations"></i>	</div>
								</div>
								<div class="media-object-section topbar-info">
									<span>Main office location</span>
									<button class="block-link" id="js-topbar-map-toggler" type="button" data-open="js-map-large">4621 My Drive, NY 10001</button>
								</div>
							</div>
						</div><!-- /end .topbar-column -->

						<!-- Top bar column 4 -->
						<div class="column small-6 medium-4 large-3 topbar-column">
							<div class="button-group align-right align-middle">
								<a class="button secondary-white js-reveal-toogler" href="#" data-open="js-topbar-search"><i class="icon zmdi zmdi-search fa fa-search"></i></a>
								<?php if(!empty(	$customer_id=Session::get('id'))): ?>
								<a class="button secondary-white" href="<?php echo e(route('custom_logout')); ?>"><i class="zmdi zmdi-power zmdi-hc-fw"></i></a>
								<?php else: ?>
								<a class="button secondary-white js-reveal-toogler" href="#" data-open="js-modal-account"><i class="zmdi zmdi-accounts-add zmdi-hc-fw"></i></a>
            	            	<?php endif; ?>

          <?php if(!empty(	$customer_id=Session::get('id'))): ?>
          <?php
          	$profile_pic = DB::table('users_meta')
								->where('user_id', '=', $customer_id)
								->where('key', '=', 'profile_pic')
								->first();
          ?>
					  <?php if(!empty($profile_pic)): ?>
					  	<a href="<?php echo e(route('user_profile')); ?>">
					  	<img class="grayscale" src="<?php echo e(asset('uploads/'.$profile_pic->value)); ?>" alt="Frank Desmond, general director" style=" border-radius: 50%; height: 59px;width: 59px;margin-bottom: 4px;">
                        </a>
                        <?php else: ?>
                	 <a href="<?php echo e(route('user_profile')); ?>">
                        <img class="grayscale" src="<?php echo e(asset('fontend/img/fleet/m.jpg')); ?>" alt="Frank Desmond, general director"style=" border-radius: 50%; height: 59px;width: 59px;margin-bottom: 4px;">
                        </a>
                        <?php endif; ?>
					<?php endif; ?>
								<!-- <div class="icon-box border circle small">
									<a href="<?php echo e(route('user_profile')); ?>">
										<img class="grayscale" src="<?php echo e(asset('/fontend/img/fleet/mm.png')); ?>" alt="Frank Desmond, general director" style=" border-radius: 50%; height: 59px;width: 59px;margin-bottom: 4px;">
									</a>
								</div> -->
							</div><!-- /end .button-group -->
						</div><!-- /end .topbar-column -->

					</div><!-- /end .row -->
				</div><!-- /end .topbar -->

				<!-- ===== SITE-HEADER ===== -->

				<div id="js-sticky-container" data-sticky-container>
					<header class="site-header sticky" data-sticky data-margin-top="0" data-top-anchor="js-sticky-container" data-sticky-on="large">
						<div class="row">
							<div class="column shrink">
								<!-- .site-header-logo -->
								<div class="site-header-logo logo-container">
									<a href="<?php echo e(url('/')); ?>">
										<span class="text-hide">"Renthire" - html5 template</span>
										<img src='<?php echo e(asset('fontend/img/logo.svg')); ?>' class="secondary" alt='"Renthire" - html5 template'>
										<!-- <svg class="secondary">
											<use xlink:href="#spriteUrl"></use>
										</svg> -->
									</a>
								</div><!-- /end .site-header-logo -->
							</div><!-- /end .column -->
							<div class="column flex-child-grow">

								<!-- .site-navigation -->
								<nav class="site-navigation show-for-large">
									<ul class="main-menu menu dropdown" data-dropdown-menu data-hover-delay="300">
										<li><a href="<?php echo e(route('index')); ?>">Home</a></li>
										<li><a href="<?php echo e(route('wedding')); ?>">Wedding</a></li>
										<li><a href="<?php echo e(route('regular_package')); ?>">Guest Cars</a></li>
										<li><a href="<?php echo e(route('package')); ?>">Package</a></li>
										<li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
									</ul><!-- /end .main-menu -->
								</nav><!-- /end .site-navigation -->

								<!-- mobile menu button -->
								<a class="button menu-trigger hide-for-large" id="js-header-nav-btn" href="#" data-toggle="js-main-off-canvas-right">
									<span class="burger-icon"></span>Menu</a>
							</div><!-- /end .column -->
						</div><!-- /end .row -->
					</header><!-- /end .site-header -->
				</div><!-- /end #js-sticky-container -->
<?php /**PATH C:\xampp\htdocs\rental\framework\resources\views/frontend/header.blade.php ENDPATH**/ ?>