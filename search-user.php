<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: کارجو
 */

get_header();

$search = array();

$search["relation"] = "AND";

$state_id = 0;
$city_id = 0;
$search_word = "";

if (isset($_GET["search_word"])) {
    $search_word = $_GET["search_word"];
}

if (isset($_GET["job_state_id"])) {
    $state_id = $_GET["job_state_id"];
}

if (isset($_GET["job_city_id"])) {
    $city_id = $_GET["job_city_id"];
}


if (strlen($search_word) > 0) {
    $search[] =           array(
        'key' => 'resume-skills',
        'value' => $search_word,
        'compare' => 'LIKE'
    );
}

if ($state_id > 0) {
    $search[] =           array(
        'key' => 'state_id',
        'value' => $state_id,
        'compare' => '='
    );
}

if ($city_id > 0) {
    $search[] =           array(
        'key' => 'city_id',
        'value' => $city_id,
        'compare' => '='
    );
}



$args = array(
    'meta_key' => 'user_type',
    'meta_value' => 'user',
    'meta_query' => $search,
    'posts_per_page' => 10
);
$wp_user_query = new WP_User_Query($args);
$authors = $wp_user_query->get_results();
$count = $wp_user_query->post_count;
?>

<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">همه کارجو ها </h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="<?php echo home_url();  ?>">خانه</a></li>
                        <li>همه کارجو ها </li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Filters Search -->
    <div class="section-full browse-job-find">
        <div class="container">
            <div class="find-job-bx">
                <?php
                get_template_part('template-parts/homepage/homepage', 'search-user');
                ?>
            </div>
        </div>
    </div>
    <!-- Filters Search END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Browse Jobs -->
        <div class="section-full browse-job p-b50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="job-bx-title clearfix">
                            <h5 class="font-weight-700 pull-left text-uppercase"><?php echo $count . ' ' . 'کارجو پیدا شد';  ?></h5>
                        </div>
                        <ul class="post-job-bx">
                            <?php
                            if (!empty($authors)) {
                                foreach ($authors as $author) {
                                    
                            ?>
                                    <li>
                                        <?php
                                        set_query_var('cur_author', $author);
                                        get_template_part('template-parts/job/job', 'item-user');
                                        ?>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                        <!-- <div class="pagination-bx m-t30">
                            <ul class="pagination">
                                <li class="next"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> قبلی</a></li>
                                <li class="active"><a href="javascript:void(0);">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="previous"><a href="javascript:void(0);">بعدی <i class="ti-arrow-right"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <?php
                        get_template_part('template-parts/homepage/homepage', 'aside');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Browse Jobs END -->
    </div>
</div>
<!-- Content END-->

<?php

get_footer();
