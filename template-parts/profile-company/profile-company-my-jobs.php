<?php
$user_id = get_current_user_id();
$args = array(
    'post_type' => 'job',
    'author'  => $user_id
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
                        <?php

                        $meta_arg = [];
                        $meta_arg["relation"]="AND";
                        $meta_arg[] = ["key" => "owner_id", "value" => $user_id,"compare"=>"="];
                        $meta_arg[] = ["key" => "job_id", "value" => get_the_ID(),"compare"=>"="];
                       // $meta_arg[] = ["key" => "status", "value" => '0',"compare"=>"="];
                        $args = array(
                            'post_type' => 'request',
                            'meta_query' => $meta_arg
                        );
                        $the_query0 = new WP_Query($args);
                        $count_0 = $the_query0->post_count;

                        $args = array(
                            'post_type' => 'request',
                            'meta_key'  => 'owner_id',
                            'meta_value' => $user_id,
                            'status' => 1
                        );
                        $the_query1 = new WP_Query($args);
                        $count_1 = $the_query1->post_count;

                        $args = array(
                            'post_type' => 'request',
                            'meta_key'  => 'owner_id',
                            'meta_value' => $user_id,
                            'status' => 2
                        );
                        $the_query2 = new WP_Query($args);
                        $count_2 = $the_query2->post_count;


                        $args = array(
                            'post_type' => 'request',
                            'meta_key'  => 'owner_id',
                            'meta_value' => $user_id,
                            'status' => 3
                        );
                        $the_query3 = new WP_Query($args);
                        $count_3 = $the_query3->post_count;


                        $args = array(
                            'post_type' => 'request',
                            'meta_key'  => 'owner_id',
                            'meta_value' => $user_id,
                            'status' => 4
                        );
                        $the_query4 = new WP_Query($args);
                        $count_4 = $the_query2->post_count;

                        ?>
                        <div>
                            <span><?php echo $count_0; ?></span><span>در انتظار وضعیت</span>
                        </div>
                        <div>
                            <span><?php echo $count_1; ?></span><span>بررسی شده</span>
                        </div>
                        <div>
                            <span><?php echo $count_2; ?></span><span>تایید برای مصاحبه</span>
                        </div>
                        <div>
                            <span><?php echo $count_3; ?></span><span>رد شده</span>
                        </div>
                        <div>
                            <span><?php echo $count_4; ?></span><span>استخدام شده</span>
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