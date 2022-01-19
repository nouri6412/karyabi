<?php
$user_id = get_current_user_id();
$args = array(
    'post_type' => 'job',
    'post_author'  => $user_id
);
$the_query = new WP_Query($args);
?>
<div class="job-bx clearfix">
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">مدیریت آگهی های من</h5>
        <div class="float-right">

        </div>
    </div>
    <div>
        <div>
            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
            ?>
                <div id="<?php echo 'ads-' . get_the_ID(); ?>" class="ads">
                    <div>
                        <div class="d-flex">
                            <i class="fal fa-bookmark"></i>
                            <h4 style="margin-left: 15px;"><?php echo get_the_title(); ?></h4>
                            <?php
                            $active = get_post_meta(get_the_ID(), 'active', true);
                            ?>
                            <?php echo get_the_job_status($active, true) ?>
                        </div>
                        <div class="d-flex">
                            <div><button onclick="ajax_submit_mbm_remove_job(
            {
                'action': 'mbm_profile_company_remove_job',
                'job_id':<?php echo get_the_ID() ?>
            }
            ,'<?php echo 'ads-' . get_the_ID(); ?>'
        )" class="edit ads-btn"><i class="fa fa-remove m-r5"></i> حذف</button></div>
                        </div>
                    </div>
                    <div class="status-box">
                        <div>
                            <span>4</span><span>بررسی شده</span>
                        </div>
                        <div>
                            <span>1</span><span>در انتظار وضعیت</span>
                        </div>
                        <div>
                            <span>0</span><span>تایید برای مصاحبه</span>
                        </div>
                        <div>
                            <span>0</span><span>استخدام شده</span>
                        </div>
                    </div>
                </div>
                <!--  -->

            <?php
            endwhile;
            wp_reset_query();
            ?>
        </div>
    </div>
</div>