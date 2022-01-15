<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Karyabi
 *  * Template Name: آخرین مطالب
 */
$args = array(
    'post_type' => 'post'
);
$the_query = new WP_Query($args);
get_header();
?>

<!-- Content -->
<div class="page-content bg-white">

	<!-- inner page banner -->
	<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo get_field('archive-back-image','option'); ?>);">
		<div class="container">
			<div class="dez-bnr-inr-entry">
				<h1 class="text-white"><?php echo 'آخرین مطالب'; ?></h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a title="<?php echo get_bloginfo("name"); ?>" href="<?php echo home_url(); ?>">خانه</a></li>
						<li><?php echo 'آخرین مطالب'; ?></li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
			</div>
		</div>
	</div>
	<!-- inner page banner END -->
	<div class="content-area">
		<div class="container">
			<div class="row">
				<!-- Left part start -->
				<div class="col-lg-8 col-md-7 m-b10">
					<?php if ($the_query->have_posts()) { ?>
					<?php
						// Start the Loop.
						while ($the_query->have_posts()) :
							$the_query->the_post();
							get_template_part('template-parts/content/content', 'excerpt');

						// End the loop.
						endwhile;
					}
					else {
						get_template_part('template-parts/content/content', 'none');
					}
					?>
				</div>
				<!-- Left part END -->
				<!-- Side bar start -->
				<div class="col-lg-4 col-md-5 sticky-top">
					<aside class="side-bar">
						<?php
						get_template_part('template-parts/widget/widget', 'search-form');
						get_template_part('template-parts/widget/widget', 'recent-posts-entry');
						get_template_part('template-parts/widget/widget', 'our-service');
						get_template_part('template-parts/widget/widget', 'category');
						get_template_part('template-parts/widget/widget', 'subscriber');
						?>
					</aside>
				</div>
				<!-- Side bar END -->
			</div>
		</div>
	</div>
</div>

<?php
get_footer();