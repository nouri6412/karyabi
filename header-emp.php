<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
 
	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="<?php echo get_template_directory_uri(); ?>/assets/image/x-icon">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">

	<!-- PAGE TITLE HERE -->


	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/IRANYekan/css/iranyekan.css">

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/pelak/css/pelak.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/employ.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/templete.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/rtl.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/skin/skin-1.min.css">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
	<?php wp_head(); ?>
</head>

<body id="bg">
	<div id="loading-area"></div>
	<div class="page-wraper">
		<!-- header -->
		<header class="site-header mo-left header border-bottom  fullwidth" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/7-08.png);background-repeat: no-repeat;background-size: cover;min-height: 88vh;background-color: white;">
			<!-- main header -->
			<div class="sticky-header main-bar-wraper navbar-expand-lg">
				<div class="main-bar clearfix">
					<div class="container clearfix">
						<!-- website logo -->
						<div class="logo-header mostion">
							<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo site_url(); ?>"><img src="<?php echo get_field('header', 'option')["logo"]; ?>" class="logo" alt="<?php echo get_bloginfo('name'); ?>"></a>
						</div>
						<!-- nav toggle button -->
						<!-- nav toggle button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- extra nav -->
						<div class="extra-nav">
							<div class="extra-cell">
								<?php
								$user_id = get_current_user_id();
								$user_type = get_the_author_meta('user_type', $user_id);
								?>
								<?php if (!is_user_logged_in() || $user_type != "compaany") { ?>
									<a href="<?php echo home_url('register-emp')  ?>" class="site-button"><i class="fa fa-user"></i> ثبت نام کارفرما</a>
									<a href="<?php echo home_url('?login=1')  ?>" class="site-button"><i class="fa fa-lock"></i> ورود کارفرما </a>
								<?php
								} else {
								?>
									<a href="<?php echo site_url('profile'); ?>" class="site-button"><i class="fa fa-user"></i>پروفایل کارفرما</a>
									<a href="<?php echo wp_logout_url(site_url()); ?>" class="site-button exit"><i class="fa fa-sign-out"></i> خروج</a>
								<?php
								} ?>
							</div>
						</div>
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
							<?php
							get_template_part('template-parts/menu/menu', 'emp');
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- main header END -->
			<?php
			$unit = get_field("unit1");
			?>
			<div class="">
				<div class="container">
					<div class="d-inline-flex justify-content-center pt-5 mt-5 flex-column text-center ms-5">
						<h3><?php echo $unit["title"]; ?>
						</h3>
						<div class="mt-4">
							<p><?php echo $unit["desc"]; ?>
							</p>
						</div>
						<div>
						<?php if (!is_user_logged_in()) { ?>
                            <a href="<?php echo home_url('?login=1') ?>" class="site-button">برو به پنل کاربری<i class="fa fa-long-arrow-left mr-3"></i></a>

                        <?php } else {
                        ?>
                            <a href="<?php echo home_url('profile') ?>" class="site-button">برو به پنل کاربری<i class="fa fa-long-arrow-left mr-3"></i></a>

                        <?php
                        } ?>
						</div>
						<div class="mt-4">
							<p><?php echo $unit["desc_short"]; ?>
							</p>
						</div>
					</div>
				</div>
			</div>

			<!--  -->
			<svg version="1.1" id="Layer_1" class="mask-white " x="0px" y="0px" viewBox="0 0 1920 99.4" enable-background="new 0 0 1920 99.4" xml:space="preserve">
				<path d="M0,99.4h1920V27.6C1291.8-69.2,655.7,128,0,23.9V99.4z"></path>
			</svg>
		</header>
		<!-- header END -->
		<main class="bg-white pt-4">