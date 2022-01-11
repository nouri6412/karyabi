<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bital
 */

get_header();
$description = get_the_archive_description();
?>
<div class="container mt-4 ">
	<section>
		<div class="row">
			<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
				<div class="content">
					<?php
					if (have_posts()) {
					?>
						<header class="page-header alignwide">
							<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
							<?php if ($description) : ?>
								<div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
							<?php endif; ?>
						</header><!-- .page-header -->
					<?php
						// Load posts loop.
						while (have_posts()) {
							the_post();
							get_template_part('template-parts/content/content');
						}
					}
					?>
				</div>
			</div>

			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4  mt-2">

			</div>

		</div>
	</section>
</div>

<?php get_footer() ?>