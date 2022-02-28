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
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/templete.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/rtl.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/resume.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/skin/skin-1.min.css">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
	<?php wp_head(); ?>
</head>

<body id="bg">
	<div id="loading-area"></div>
	<div class="page-wraper">
		<!-- header -->
		<header class="site-header mo-left header fullwidth">
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
								<?php if (!is_user_logged_in() ) { ?>
									<a href="<?php echo site_url('register'); ?>" class="site-button"><i class="fa fa-user"></i> ثبت نام کارجو</a>
									<a href="#" rel="bookmark" data-toggle="modal" data-target="#car-details" class="site-button"><i class="fa fa-lock"></i> ورود کارجو </a>
									<?php
									if (is_user_logged_in() && $user_type == "company") {
									?>
										<a href="<?php echo wp_logout_url(site_url()); ?>" class="site-button exit"><i class="fa fa-sign-out"></i> خروج کارفرما</a>
									<?php
									}
								} else {
									?>
									<a href="<?php echo site_url('profile'); ?>" class="site-button"><i class="fa fa-user"></i>پروفایل من</a>
									<a href="<?php echo wp_logout_url(site_url()); ?>" class="site-button exit"><i class="fa fa-sign-out"></i> خروج</a>
								<?php
								} ?>
							</div>
						</div>
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
							<?php
							get_template_part('template-parts/menu/menu', 'content');
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- main header END -->
		</header>
		<!-- header END -->