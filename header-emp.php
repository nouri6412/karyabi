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
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/slick/slick.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/slick/slick-theme.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/employ.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/templete.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/rtl.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/skin/skin-1.min.css">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
	<?php wp_head(); ?>
</head>

<body id="bg">
	<div id="loading-area"></div>
	<div>
		<?php
		get_template_part('template-parts/menu/menu', 'emp');
		?>