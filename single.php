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
?>
<div class="container mt-4 ">
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="content">
                    <?php get_template_part('template-parts/content/content', 'single'); ?>
                    <hr>
                    <?php if (comments_open() || get_comments_number()) {
                        comments_template();
                    } ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4  mt-2">
                <div class="aside">
                    <?php
                    get_template_part('template-parts/aside/aside', 'sp');
                    get_template_part('template-parts/aside/aside', 'box');
                    get_template_part('template-parts/aside/aside', 'post-relate');
                    ?>
                </div>
            </div>

        </div>
    </section>
</div>

<?php get_footer() ?>