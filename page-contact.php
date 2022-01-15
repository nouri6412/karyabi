<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: ارتباط با ما
 */


get_header();
?>
<!-- Content -->
<div class="page-content bg-white">
    <?php

    // Start the Loop.
    while (have_posts()) :
        the_post();
    ?>
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white"><?php echo get_the_title(); ?></h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a title="<?php echo get_bloginfo("name"); ?>" href="<?php echo home_url(); ?>">خانه</a></li>
                            <li><?php echo get_the_title(); ?></li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="section-full content-inner bg-white contact-style-1">
            <div class="container">
                <div class="row">
                    <!-- right part start -->
                    <div class="col-lg-4 col-md-6 d-lg-flex d-md-flex">
                        <div class="p-a30 border m-b30 contact-area border-1 align-self-stretch radius-sm">
                            <h4 class="m-b10">ارتباط سریع</h4>
                            <p>اگر س سوالی دارید، از اطلاعات تماس زیر استفاده کنید.</p>
                            <ul class="no-margin">
                                <li class="icon-bx-wraper left m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">آدرس:</h6>
                                        <p><?php echo get_field("address") ?></p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left  m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-email"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">ایمیل:</h6>
                                        <p><?php echo get_field("email") ?></p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">تلفن</h6>
                                        <p><?php echo get_field("tel") ?></p>
                                    </div>
                                </li>
                            </ul>
                            <div class="m-t20">
                                <ul class="dez-social-icon dez-social-icon-lg">
                                    <?php
                                    $data_sosial = get_field("footer-col-1", 'option');
                                    ?>
                                    <?php
                                    if (isset($data_sosial["sosial"]) && is_array($data_sosial["sosial"])) {
                                        foreach ($data_sosial["sosial"] as $item) {
                                    ?>
                                            <li><a href="<?php echo $item["link"]; ?>" class="fa fa-<?php echo $item["icon"]; ?> bg-primary"></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- right part END -->
                    <!-- Left part start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="p-a30 m-b30 radius-sm bg-gray clearfix">

                            <h4>ارسال پیام</h4>
                            <div id="dzFormMsg-error" class="dzFormMsg error"></div>
                            <input type="hidden" value="Contact" name="dzToDo">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="dzName" name="dzName" type="text" required="" class="form-control" placeholder="نام">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="dzEmail" name="dzEmail" type="email" class="form-control" required="" placeholder="ایمیل">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea id="dzMessage" name="dzMessage" rows="4" class="form-control" required="" placeholder="پیام شما..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="recaptcha-bx">
                                        <div class="input-group">
                                            <div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                            <input class="form-control d-none" style="display:none;" data-recaptcha="true" required="" data-error="Please complete the Captcha">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="loading-ajax"></div>
                                    <div id="dzFormMsg-doned" class="dzFormMsg doned"></div>
                                    <button onclick="
                                    ajax_submit_contact_form(
                                    $('#dzName').val()
                                    ,$('#dzEmail').val()
                                    ,$('#dzMessage').val()
                                    ,$('#dzFormMsg-error')
                                    ,$('#dzFormMsg-doned')
                                    ,$(this))
                                    " name="submit" value="submit" class="site-button "> <span>ثبت</span> </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Left part END -->
                    <div class="col-lg-4 col-md-12 d-lg-flex m-b30">
                        <iframe src="<?php echo get_field('api') ?>" style="border:0; width:100%; min-height:350px;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area  END -->
    <?php
    endwhile; // End the loop.
    ?>
</div>
<!-- Content END-->
<?php
get_footer();
