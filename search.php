<?php
/**
 * The template for displaying Search Results pages.
 *
 * @since Shape 1.0
 */

get_header();
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
                        <h1 class="page-title"><?php printf( 'نتایج جستجو برای :'.get_search_query() ); ?></h1>
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
			<div class="aside">
                    <?php
					get_template_part('template-parts/aside/aside', 'box');
                    get_template_part('template-parts/aside/aside', 'banner');
                    get_template_part('template-parts/aside/aside', 'post-sp');
                    ?>
                </div>
			</div>

		</div>
	</section>
</div>

<?php get_footer() ?>