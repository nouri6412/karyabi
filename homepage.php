<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: خانه
 */

get_header();

?>
<div class="container">
    	
<a href="<?php echo get_post_type_archive_link( 'our-service' ); ?>">our-service Archive</a>
    <?php

    the_content();
    // get_template_part('template-parts/homepage/homepage', 'sp');
    ?>
</div>
<?php

get_footer();
