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
                    <h2>شغل خود را بین <br> <span class="text-primary">50,000</span> شغل انتخاب کنید.</h2>
                    <form class="dezPlaceAni">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>عنوان شغل، عبارت یا کلمه کلیدی</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label>شهر، استان یا کد پستی</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <select>
                                        <option>عنوان شغل</option>
                                        <option>ساخت و ساز</option>
                                        <option>هماهنگ کننده</option>
                                        <option>کارفرما</option>
                                        <option>مالی</option>
                                        <option>فناوری اطلاعات</option>
                                        <option>بازار یابی</option>
                                        <option>تضمین کیفیت</option>
                                        <option>مشاور املاک</option>
                                        <option>فروش</option>
                                        <option>پشتیبان</option>
                                        <option>تدریس</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <button type="ثبت" href="browse-job-list.html" class="site-button btn-block">جستجو</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Banner END -->
    <!-- About Us -->
    <div class="section-full job-categories content-inner-2 bg-white">
        <div class="container">
            <div class="section-head d-flex head-counter clearfix">
                <div class="mr-auto">
                    <h2 class="m-b5">دسته های محبوب</h2>
                    <h6 class="fw3">بیش از 20 دسته شغل</h6>
                </div>
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter">1800</h2>
                    <h6 class="fw3">شغل ارسال شده</h6>
                </div>
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter">4500</h2>
                    <h6 class="fw3">وظایف ارسال شده</h6>
                </div>
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter">1500</h2>
                    <h6 class="fw3">فریلنسر</h6>
                </div>
            </div>
            <div class="row sp20">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-location-pin"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">طراحی، هنر و رسانه</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-location-pin"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-wand"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">آموزش</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-wand"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-wallet"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">حسابداری / مالی</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-wallet"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-cloud-up"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">مدیریت منابع انسانی</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-cloud-up"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-bar-chart"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">مخابرات</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-bar-chart"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-tablet"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">رستوران</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-tablet"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-camera"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">ساختمانی / ساخت وساز</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-camera"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-panel"></i></div>
                            <a href="company-manage-job.html" class="dez-tilte">سلامت</a>
                            <p class="m-a0">40 موقعیت شغلی</p>
                            <div class="rotate-icon"><i class="ti-panel"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center m-t30">
                    <button class="site-button radius-xl">همه دسته ها</button>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us END -->
    <!-- Call To Action -->
    <div class="section-full content-inner bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 section-head text-center">
                    <h2 class="m-b5">شهرهای تحت پوشش</h2>
                    <h6 class="fw4 m-b0">لورم ایپسوم متن ساختگی</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic1.jpg)">
                            <div class="city-info">
                                <h5>کرمان</h5>
                                <span>65 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic2.jpg)">
                            <div class="city-info">
                                <h5>گیلان</h5>
                                <span>21 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic3.jpg)">
                            <div class="city-info">
                                <h5>همدان</h5>
                                <span>63 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic4.jpg)">
                            <div class="city-info">
                                <h5>اردبیل</h5>
                                <span>23 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic5.jpg)">
                            <div class="city-info">
                                <h5>آذربایجان غربی</h5>
                                <span>65 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic6.jpg)">
                            <div class="city-info">
                                <h5>ایلام</h5>
                                <span>21 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic7.jpg)">
                            <div class="city-info">
                                <h5>سمنان</h5>
                                <span>63 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic8.jpg)">
                            <div class="city-info">
                                <h5>زنجان</h5>
                                <span>23 عنوان شغل</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action END -->
    <!-- Our Job -->
    <div class="section-full bg-white content-inner-2">
        <div class="container">
            <div class="d-flex job-title-bx section-head">
                <div class="mr-auto">
                    <h2 class="m-b5">شغل های اخیر</h2>
                    <h6 class="fw4 m-b0">لورم ایپسوم متن ساختگی</h6>
                </div>
                <div class="align-self-end">
                    <a href="browse-job-list.html" class="site-button button-sm">همه مشاغل <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <ul class="post-job-bx browse-job">
                        <li>
                            <div class="post-bx">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span><img alt="" src="images/logo/icon1.png"></span>
                                    </div>
                                    <div class="job-post-info">
                                        <h4><a href="job-detail.html">مجری بازاریابی دیجیتال</a></h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> اردکان، یزد</li>
                                            <li><i class="fa fa-bookmark-o"></i> تمام وقت</li>
                                            <li><i class="fa fa-clock-o"></i> 11 ماه پیش</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <a href="javascript:void(0);"><span>تمام وقت</span></a>
                                    </div>
                                    <div class="salary-bx">
                                        <span>1,200 - 1,500</span>
                                    </div>
                                </div>
                                <label class="like-btn">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="post-bx">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span><img alt="" src="images/logo/icon1.png"></span>
                                    </div>
                                    <div class="job-post-info">
                                        <h4><a href="job-detail.html">مجری بازاریابی دیجیتال</a></h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> اردکان، یزد</li>
                                            <li><i class="fa fa-bookmark-o"></i> تمام وقت</li>
                                            <li><i class="fa fa-clock-o"></i> 11 ماه پیش</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <a href="javascript:void(0);"><span>تمام وقت</span></a>
                                    </div>
                                    <div class="salary-bx">
                                        <span>1,200 - 1,500</span>
                                    </div>
                                </div>
                                <label class="like-btn">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="post-bx">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span><img alt="" src="images/logo/icon1.png"></span>
                                    </div>
                                    <div class="job-post-info">
                                        <h4><a href="job-detail.html">مجری بازاریابی دیجیتال</a></h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> اردکان، یزد</li>
                                            <li><i class="fa fa-bookmark-o"></i> تمام وقت</li>
                                            <li><i class="fa fa-clock-o"></i> 11 ماه پیش</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <a href="javascript:void(0);"><span>تمام وقت</span></a>
                                    </div>
                                    <div class="salary-bx">
                                        <span>1,200 - 1,500</span>
                                    </div>
                                </div>
                                <label class="like-btn">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="post-bx">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span><img alt="" src="images/logo/icon1.png"></span>
                                    </div>
                                    <div class="job-post-info">
                                        <h4><a href="job-detail.html">مجری بازاریابی دیجیتال</a></h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> اردکان، یزد</li>
                                            <li><i class="fa fa-bookmark-o"></i> تمام وقت</li>
                                            <li><i class="fa fa-clock-o"></i> 11 ماه پیش</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <a href="javascript:void(0);"><span>تمام وقت</span></a>
                                    </div>
                                    <div class="salary-bx">
                                        <span>1,200 - 1,500</span>
                                    </div>
                                </div>
                                <label class="like-btn">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="post-bx">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span><img alt="" src="images/logo/icon1.png"></span>
                                    </div>
                                    <div class="job-post-info">
                                        <h4><a href="job-detail.html">مجری بازاریابی دیجیتال</a></h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> اردکان، یزد</li>
                                            <li><i class="fa fa-bookmark-o"></i> تمام وقت</li>
                                            <li><i class="fa fa-clock-o"></i> 11 ماه پیش</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <a href="javascript:void(0);"><span>تمام وقت</span></a>
                                    </div>
                                    <div class="salary-bx">
                                        <span>1,200 - 1,500</span>
                                    </div>
                                </div>
                                <label class="like-btn">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="post-bx">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span><img alt="" src="images/logo/icon1.png"></span>
                                    </div>
                                    <div class="job-post-info">
                                        <h4><a href="job-detail.html">مجری بازاریابی دیجیتال</a></h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> اردکان، یزد</li>
                                            <li><i class="fa fa-bookmark-o"></i> تمام وقت</li>
                                            <li><i class="fa fa-clock-o"></i> 11 ماه پیش</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <a href="javascript:void(0);"><span>تمام وقت</span></a>
                                    </div>
                                    <div class="salary-bx">
                                        <span>1,200 - 1,500</span>
                                    </div>
                                </div>
                                <label class="like-btn">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <div class="m-t30">
                        <div class="d-flex">
                            <a class="site-button button-sm mr-auto" href="javascript:void(0);"><i class="ti-arrow-left"></i> بعدی</a>
                            <a class="site-button button-sm" href="javascript:void(0);">قبلی <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sticky-top">
                        <div class="candidates-are-sys m-b30">
                            <div class="candidates-bx">
                                <div class="testimonial-pic radius"><img src="images/testimonials/pic3.jpg" alt="" width="100" height="100"></div>
                                <div class="testimonial-text">
                                    <p>من به تازگی شغلی را پیدا کرده ام که از طریق جاب بورد درخواست آن را داده ام! من در طول شغل خود از سایت همیشه استفاده می کردم.</p>
                                </div>
                                <div class="testimonial-detail"> <strong class="testimonial-name">ریحانه بیوت</strong> <span class="testimonial-position">یزد</span> </div>
                            </div>
                        </div>
                        <div class="quote-bx">
                            <div class="quote-info">
                                <h4>با رزومه ساز انلاین ما متفاوت باشید</h4>
                                <p>با رزومه ساز جاب بورد کارفرمای خود را تحت تاثیر قرار دهید</p>
                                <a href="register.html" class="site-button">ایجاد حساب کاربری</a>
                            </div>
                        </div>
                    </div>
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
