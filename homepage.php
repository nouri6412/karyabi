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
    <?php
    get_template_part('template-parts/homepage/homepage', 'search');
    ?>
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
                    <a href="<?php home_url("search-job") ?>" class="site-button button-sm">همه مشاغل <i class="fa fa-long-arrow-right"></i></a>
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
    <div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix" style="background-image: url(images/background/bg4.jpg);">
        <div class="container">
            <div class="section-head text-center text-white">
                <h2 class="m-b5">نظر کاربران</h2>
                <h5 class="fw4">چند کلمه از زبان کارجویان</h5>
            </div>
            <div class="blog-carousel-center owl-carousel owl-none">
                <div class="item">
                    <div class="testimonial-5">
                        <div class="testimonial-text">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                        </div>
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius shadow">
                                <img src="images/testimonials/pic1.jpg" width="100" height="100" alt="">
                            </div>
                            <strong class="testimonial-name">ریحانه بودا</strong>
                            <span class="testimonial-position">مدرس</span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-5">
                        <div class="testimonial-text">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                        </div>
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius shadow">
                                <img src="images/testimonials/pic2.jpg" width="100" height="100" alt="">
                            </div>
                            <strong class="testimonial-name">ریحانه بودا</strong>
                            <span class="testimonial-position">مدرس</span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-5">
                        <div class="testimonial-text">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                        </div>
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius shadow">
                                <img src="images/testimonials/pic3.jpg" width="100" height="100" alt="">
                            </div>
                            <strong class="testimonial-name">ریحانه بودا</strong>
                            <span class="testimonial-position">مدرس</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action END -->
    <!-- Our Latest Blog -->
    <div class="section-full content-inner-2 overlay-white-middle" style="background-image:url(images/lines.png); background-position:bottom; background-repeat:no-repeat; background-size: 100%;">
        <div class="container">
            <div class="section-head text-black text-center">
                <h2 class="m-b0">تعرفه ها</h2>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
            </div>
            <!-- Pricing table-1 Columns 3 with gap -->
            <div class="section-content box-sort-in button-example m-t80">
                <div class="pricingtable-row">
                    <div class="row max-w1000 m-auto">
                        <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                            <div class="pricingtable-wrapper style2 bg-white">
                                <div class="pricingtable-inner">
                                    <div class="pricingtable-price">
                                        <h4 class="font-weight-300 m-t10 m-b0">پایه</h4>
                                        <div class="pricingtable-bx"> <span>29,000</span> تومان / به ازای هر درخواست </div>
                                    </div>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                                    <div class="m-t20">
                                        <a href="register.html" class="site-button radius-xl"><span class="p-lr30">شروع کن</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                            <div class="pricingtable-wrapper style2 bg-primary text-white active">
                                <div class="pricingtable-inner">
                                    <div class="pricingtable-price">
                                        <h4 class="font-weight-300 m-t10 m-b0">حرفه ای</h4>
                                        <div class="pricingtable-bx"> <span>39,000</span> تومان / به ازای هر درخواست </div>
                                    </div>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                                    <div class="m-t20">
                                        <a href="register.html" class="site-button white radius-xl"><span class="text-primary p-lr30">شروع کن</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                            <div class="pricingtable-wrapper style2 bg-white">
                                <div class="pricingtable-inner">
                                    <div class="pricingtable-price">
                                        <h4 class="font-weight-300 m-t10 m-b0">نامحدود</h4>
                                        <div class="pricingtable-bx"> <span>49</span> تومان / به ازای هر درخواست </div>
                                    </div>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                                    <div class="m-t20">
                                        <a href="register.html" class="site-button radius-xl"><span class="p-lr30">شروع کن</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Latest Blog -->
</div>
<!-- Content END-->
<?php

get_footer();
