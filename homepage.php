<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: صفحه اصلی
 */

get_header();

?>
<!-- Content -->
<div class="page-content">
    <!-- Section Banner -->
    <div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url(<?php echo get_field("image_back"); ?>);">
        <div class="container">
            <div class="dez-bnr-inr-entry align-m">
                <div class="find-job-bx">
                    <a href="browse-job-list.html" class="site-button button-sm">مشاغل، فرصت های شغلی و استخدامی</a>
                    <h2><?php get_field("search_title") ?></h2>
                    <?php
                    get_template_part('template-parts/homepage/homepage', 'search');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us -->
    <div class="section-full job-categories content-inner-2 bg-white">
        <div class="container">
            <?php
            get_template_part('template-parts/homepage/homepage', 'cat-counter');
            get_template_part('template-parts/homepage/homepage', 'cats');
            ?>
        </div>
    </div>
    <!-- About Us END -->
    <?php
    get_template_part('template-parts/homepage/homepage', 'city');
    ?>
    <!-- Our Job -->
    <div class="section-full bg-white content-inner-2">
        <div class="container">
            <div class="d-flex job-title-bx section-head">
                <div class="mr-auto">
                    <h2 class="m-b5">شغل های اخیر</h2>
                    <h6 class="fw4 m-b0">ضغل مورد نظر خود را بیابید</h6>
                </div>
                <div class="align-self-end">
                    <a href="<?php echo home_url("search-job") ?>" class="site-button button-sm">همه مشاغل <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <?php
                    get_template_part('template-parts/homepage/homepage', 'resent-jobs');
                    ?>
                </div>
                <div class="col-lg-3">
                    <?php
                    get_template_part('template-parts/homepage/homepage', 'aside');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Job END -->
    <!-- Call To Action -->
    <?php
    get_template_part('template-parts/homepage/homepage', 'comments');
    ?>
    <!-- Call To Action END -->
    <?php
    get_template_part('template-parts/homepage/homepage', 'costs');
    ?>
</div>
<!-- Content END-->
<?php

get_footer();
