<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />

	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="<?php echo get_template_directory_uri(); ?>/assets/image/x-icon">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">

	<!-- PAGE TITLE HERE -->
	<?php wp_head(); ?>

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
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/skin/skin-1.min.css">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
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
								<a href="register-2.html" class="site-button"><i class="fa fa-user"></i> ثبت نام</a>
								<a href="#" title="اطلاعات بیشتر" rel="bookmark" data-toggle="modal" data-target="#car-details" class="site-button"><i class="fa fa-lock"></i> ورود </a>
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