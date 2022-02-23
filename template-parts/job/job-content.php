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
                                    <h4 class="text-black font-weight-700 p-t10 m-b15"><?php echo get_the_author_meta('company_name'); ?></h4>
                                    <ul>
                                        <li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">موقعیت مکانی</strong><span class="text-black-light"> <?php echo  get_the_title(get_post_meta(get_the_ID(), 'state_id', true)) . '  ' . get_the_title(get_post_meta(get_the_ID(), 'city_id', true)) . ' ' . get_post_meta(get_the_ID(), 'address', true); ?> </span></li>
                                        <li>
                                            <?php
                                            $user_id = get_current_user_id();
                                            $args = array(
                                                'post_type' => 'request',
                                                'author'  => $user_id,
                                                'meta_key'        => 'job_id',
                                                'meta_value'    => get_the_ID()
                                            );
                                            $the_query = new WP_Query($args);

                                            $count = $the_query->post_count;
                                            wp_reset_query();
                                            ?>
                                            <?php
                                            if ($count == 0 && $user_id > 0) {
                                            ?>
                                                <div id="request-result" style="display: none;" class="dzFormMsg error">رزومه ارسال شد</div>
                                                <div class="box-loading">
                                                    <div class="loading-ajax"></div>
                                                </div>
                                                <button onclick="ajax_submit_mbm_job_request(
            {
                'action': 'mbm_job_request',
                'job_id':'<?php echo get_the_ID(); ?>'
            }
            ,$(this)
            ,$('#request-result')
        )" class="site-button request-btn">درخواست و ارسال رزومه</button>
                                            <?php } else if ($user_id > 0) { ?>
                                                <div id="request-result" class="dzFormMsg error">رزومه قبلا ارسال شده است</div>

                                            <?php } ?>
                                        </li>
                                        <li>
                                            <?php
                                            $user_id = get_current_user_id();
                                            $args = array(
                                                'post_type' => 'favorite',
                                                'author'  => $user_id,
                                                'meta_key'        => 'job_id',
                                                'meta_value'    => get_the_ID()
                                            );
                                            $the_query = new WP_Query($args);

                                            $count = $the_query->post_count;
                                            wp_reset_query();
                                            ?>
                                            <?php
                                            if ($count == 0 && $user_id > 0) {
                                            ?>
                                                <div id="favorite-result" style="display: none;" class="dzFormMsg error">شغل ذخیده شد</div>
                                                <button onclick="ajax_submit_mbm_job_request(
            {
                'action': 'mbm_job_favorite',
                'job_id':'<?php echo get_the_ID(); ?>'
            }
            ,$(this)
            ,$('#favorite-result')
        )" class="site-button request-btn"> ذخیره شغل <i class="fa fa-bookmark"></i></button>
                                            <?php } else if ($user_id > 0) { ?>
                                                <div id="favorite-result" class="dzFormMsg error">شغل قبلا ذخیره شده است</div>

                                            <?php } ?>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="job-info-box">
                        <h3 class="m-t0 m-b10 font-weight-700 title-head">
                            <a href="javascript:void(0);" class="text-secondry m-r30"><?php echo get_the_title(); ?></a>
                        </h3>
                        <p class="p-t20"><?php echo get_the_content(); ?></p>
                        <h5 class="font-weight-600">الزامات</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>مهارت های موردنیاز</h6>
                                <div class="job-time m-t15 m-b10">
                                    <?php
                                    $tags_str = get_post_meta(get_the_ID(), 'tag', true);
                                    $tags = explode(',', $tags_str);
                                    foreach ($tags as $tag) {
                                    ?>
                                        <a href="javascript:void(0);"><span><?php echo $tag; ?></span></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>جنسیت</h6>
                                <div class="job-time m-t15 m-b10">
                                    <a href="javascript:void(0);"><span><?php echo get_post_meta(get_the_ID(), 'sex', true); ?></span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>حداقل سابقه کار</h6>
                                <div class="job-time m-t15 m-b10">
                                    <a href="javascript:void(0);"><span><?php

                                                                        $exp = get_post_meta(get_the_ID(), 'exp', true);
                                                                        if ($exp > 0) {
                                                                            echo $exp . ' ' . 'سال';
                                                                        } else {
                                                                            echo 'مهم نیست';
                                                                        }

                                                                        ?></span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>نوع همکاری</h6>
                                <div class="job-time m-t15 m-b10">
                                    <a href="javascript:void(0);"><span><?php echo get_post_meta(get_the_ID(), 'coop-type', true); ?></span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>حقوق</h6>
                                <div class="job-time m-t15 m-b10">
                                    <a href="javascript:void(0);"><span><?php
                                                                        echo custom_get_salary(get_the_ID())

                                                                        ?></span></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="font-weight-600">درباره شرکت</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <p><?php echo get_the_author_meta('desc'); ?></p>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail -->
    <!-- Our Jobs -->
    <!-- Our Jobs END -->
</div>