<?php

/**
 * The template for displaying job single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since Karyabi 1.0
 */

get_header();
?>
<!-- Content -->
<div class="page-content bg-white">
    <?php

    // Start the Loop.
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/job/job', 'content');

    endwhile; // End the loop.
    ?>
</div>
<!-- Content END-->
<?php
get_footer();
