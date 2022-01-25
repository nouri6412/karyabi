<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: پروفایل من
 */



get_header();

$user_id = get_current_user_id();

$profile_user_id = 0;

if (isset($_GET["user_id"])) {
    $profile_user_id = $_GET["user_id"];
}



if ($profile_user_id > 0) {
    $user_id = $profile_user_id;
}

$user_info = get_userdata($user_id);
$user_meta = get_user_meta($user_id);

$user_type = "";
if (isset($user_meta['user_type'])) {
    $user_type = $user_meta['user_type'][0];
}

$action = "profile";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}


$user_meta["profile_user_id"] = $profile_user_id;

if ($profile_user_id > 0) {
    $user_type = "user";
}

set_query_var('page_action', $action);
set_query_var('user_type', $user_type);
set_query_var('user_info', $user_info);
set_query_var('user_meta', $user_meta);

?>
<!-- Content -->
<div class="page-content bg-white">
    <!-- contact area -->
    <div class="content-block">
        <!-- Browse Jobs -->
        <div class="section-full bg-white p-t50 p-b20">
            <div class="container">


                <div class="row">
                    <div class="col-xl-3 col-lg-4 m-b30">
                        <?php
                        if ($user_id > 0) {
                            if ($user_type == "user") {
                                get_template_part('template-parts/profile-user/profile-user', 'aside');
                            } else if ($user_type == "company") {
                                get_template_part('template-parts/profile-company/profile-company', 'aside');
                            }
                        }
                        ?>
                    </div>
                    <div class="col-xl-9 col-lg-8 m-b30">
                        <?php
                        if ($user_id > 0) {
                            get_template_part('template-parts/profile-' . $user_type . '/profile-' . $user_type, $action);
                        } else {
                        ?>
                            <a href="#" rel="bookmark" data-toggle="modal" data-target="#car-details"><i class="fa fa-lock"></i> لطفا وارد سایت شوید </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Browse Jobs END -->
    </div>
    <!-- contact area  END -->
</div>
<!-- Content END-->

<?php
get_footer();
