<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo get_template_directory_uri() ?>/assets/images/banner/bnr1.jpg);">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">جزئیات شغل</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="#">خانه</a></li>
                    <li>جزئیات شغل</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- contact area -->
<div class="content-block">
    <!-- Job Detail -->
    <div class="section-full content-inner-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="m-b30">
                                    <img src="<?php echo get_the_author_meta('avatar') ?>" alt="<?php echo get_the_author_meta('company_name') ?>">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                    <h4 class="text-black font-weight-700 p-t10 m-b15">توضیحات تکمیلی</h4>
                                    <ul>
                                        <li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">موقعیت مکانی</strong><span class="text-black-light"> <?php echo  get_the_title(get_post_meta(get_the_ID(), 'state_id', true)) . '  ' . get_the_title(get_post_meta(get_the_ID(), 'city_id', true)) . ' ' . get_post_meta(get_the_ID(), 'address', true); ?> </span></li>
                                        <li><i class="ti-money"></i><strong class="font-weight-700 text-black">حقوق</strong><?php
                                                                                                                            $min = 0;
                                                                                                                            $max = 0;

                                                                                                                            if (is_numeric(get_post_meta(get_the_ID(), 'min-salary', true))) {
                                                                                                                                $min = get_post_meta(get_the_ID(), 'min-salary', true);
                                                                                                                            }

                                                                                                                            if (is_numeric(get_post_meta(get_the_ID(), 'max-salary', true))) {
                                                                                                                                $max = get_post_meta(get_the_ID(), 'max-salary', true);
                                                                                                                            }

                                                                                                                            if ($min > 0 && $max > 0) {
                                                                                                                                echo 'از' . ' ' . get_post_meta(get_the_ID(), 'min-salary', true) . ' ' . 'تا' . get_post_meta(get_the_ID(), 'max-salary', true);
                                                                                                                            } else  if ($min > 0) {
                                                                                                                                echo 'از' . ' ' . get_post_meta(get_the_ID(), 'min-salary', true);
                                                                                                                            } else  if ($max > 0) {
                                                                                                                                echo 'تا' . get_post_meta(get_the_ID(), 'max-salary', true);
                                                                                                                            } else {
                                                                                                                                echo 'توافقی';
                                                                                                                            }

                                                                                                                            ?></li>
                                        <li><i class="ti-shield"></i><strong class="font-weight-700 text-black">حداقل سابقه کار</strong><?php

                                                                                                                                        $exp = get_post_meta(get_the_ID(), 'exp', true);
                                                                                                                                        if ($exp > 0) {
                                                                                                                                            echo $exp . ' ' . 'سال';
                                                                                                                                        } else {
                                                                                                                                            echo 'مهم نیست';
                                                                                                                                        }

                                                                                                                                        ?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="job-info-box">
                        <h3 class="m-t0 m-b10 font-weight-700 title-head">
                            <a href="javascript:void(0);" class="text-secondry m-r30">مجری بازاریابی دیجیتال</a>
                        </h3>
                        <ul class="job-info">
                            <li><strong>تحصیلات</strong> طراح وب</li>
                            <li><strong>آخرین مهلت ثبت نام:</strong> 25ام شهریو 1401</li>
                            <li><i class="ti-location-pin text-black m-r5"></i> شیراز </li>
                        </ul>
                        <p class="p-t20">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو</p>
                        <h5 class="font-weight-600">توضیحات</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو</p>
                        <h5 class="font-weight-600">چگونگی درخواست</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو</p>
                        <h5 class="font-weight-600">الزامات</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <ul class="list-num-count no-round">
                            <li>سیاست حفظ خریم خصوصی Designista در آذر 1400 آپدیت شد</li>
                            <li>من کی هستم و این سیاست شامل چه مواردی می شود</li>
                            <li>اساساً بدون تغییر باقی ماند و در دهه 1396 رواج یافت </li>
                            <li>در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد</li>
                            <li>زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته</li>
                        </ul>
                        <a href="jobs-applied-job.html" class="site-button">درخواست</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail -->
    <!-- Our Jobs -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="blog-details.html"><img src="images/blog/grid/pic1.jpg" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a href="blog-details.html">عنوان پست بلاگ</a></h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i> اصفهان </li>
                                    <li class="post-author"><i class="ti-user"></i>توسط <a href="#">علی مرادی</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                            </div>
                            <div class="dez-post-readmore">
                                <a href="blog-details.html" title="اطلاعات بیشتر" rel="bookmark" class="site-button-link"><span class="fw6">اطلاعات بیشتر</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="blog-details.html"><img src="images/blog/grid/pic2.jpg" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a href="blog-details.html">عنوان پست بلاگ</a></h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i> اصفهان </li>
                                    <li class="post-author"><i class="ti-user"></i>توسط <a href="#">علی مرادی</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                            </div>
                            <div class="dez-post-readmore">
                                <a href="blog-details.html" title="اطلاعات بیشتر" rel="bookmark" class="site-button-link"><span class="fw6">اطلاعات بیشتر</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="blog-details.html"><img src="images/blog/grid/pic3.jpg" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a href="blog-details.html">عنوان پست بلاگ</a></h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i> اصفهان </li>
                                    <li class="post-author"><i class="ti-user"></i>توسط <a href="#">علی مرادی</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                            </div>
                            <div class="dez-post-readmore">
                                <a href="blog-details.html" title="اطلاعات بیشتر" rel="bookmark" class="site-button-link"><span class="fw6">اطلاعات بیشتر</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="blog-details.html"><img src="images/blog/grid/pic4.jpg" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a href="blog-details.html">عنوان پست بلاگ</a></h5>
                            </div>
                            <div class="dez-post-meta">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i> اصفهان </li>
                                    <li class="post-author"><i class="ti-user"></i>توسط <a href="#">علی مرادی</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                            </div>
                            <div class="dez-post-readmore">
                                <a href="blog-details.html" title="اطلاعات بیشتر" rel="bookmark" class="site-button-link"><span class="fw6">اطلاعات بیشتر</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Jobs END -->
</div>