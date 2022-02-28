<?php
$user_id = get_current_user_id();
$args = array(
    'post_type' => 'job',
    'author'  => $user_id,
);



if (isset($_GET["active"])) {
    $meta_arg = [];
    $meta_arg["relation"] = "AND";
    $meta_arg[] = ["key" => "active", "value" => $_GET["active"], "compare" => "="];

    $args["meta_query"] = $meta_arg;
}

$the_query = new WP_Query($args);
?>
<div class="job-bx clearfix">
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">مدیریت آگهی های من</h5>
        <a href="<?php  echo home_url('profile?action='.get_query_var('back_action')) ; ?>" class="site-button right-arrow button-sm float-right">بازگشت</a>

    </div>
    <div class="job-cats">
        <ul>
            <?php
            $args = array(
                'post_type' => 'job',
                'author'  => $user_id
            );
            $the_query_job_0_0 = new WP_Query($args);
            $count_0_0 = $the_query_job_0_0->post_count;


            $meta_arg = [];
            $meta_arg["relation"] = "AND";
            $meta_arg[] = ["key" => "active", "value" => '0', "compare" => "="];
            $args = array(
                'post_type' => 'job',
                'author'  => $user_id,
                'meta_query' => $meta_arg
            );
            $the_query_job_0 = new WP_Query($args);
            $count_0 = $the_query_job_0->post_count;

            $meta_arg = [];
            $meta_arg["relation"] = "AND";
            $meta_arg[] = ["key" => "active", "value" => '1', "compare" => "="];
            $args = array(
                'post_type' => 'job',
                'author'  => $user_id,
                'meta_query' => $meta_arg
            );
            $the_query_job_1 = new WP_Query($args);
            $count_1 = $the_query_job_1->post_count;

            $meta_arg = [];
            $meta_arg["relation"] = "AND";
            $meta_arg[] = ["key" => "active", "value" => '2', "compare" => "="];
            $args = array(
                'post_type' => 'job',
                'author'  => $user_id,
                'meta_query' => $meta_arg
            );
            $the_query_job_2 = new WP_Query($args);
            $count_2 = $the_query_job_2->post_count;

            $meta_arg = [];
            $meta_arg["relation"] = "AND";
            $meta_arg[] = ["key" => "active", "value" => '3', "compare" => "="];
            $args = array(
                'post_type' => 'job',
                'author'  => $user_id,
                'meta_query' => $meta_arg
            );
            $the_query_job_3 = new WP_Query($args);
            $count_3 = $the_query_job_3->post_count;


            $meta_arg = [];
            $meta_arg["relation"] = "AND";
            $meta_arg[] = ["key" => "active", "value" => '4', "compare" => "="];
            $args = array(
                'post_type' => 'job',
                'author'  => $user_id,
                'meta_query' => $meta_arg
            );
            $the_query_job_4 = new WP_Query($args);
            $count_4 = $the_query_job_4->post_count;
            ?>
            <li class="<?php echo (!isset($_GET["active"])) ? 'selected' : ''; ?>">
                <a href="<?php echo home_url('profile?action=my-jobs') ?>"> همه <span><?php echo $count_0_0;  ?></span></a>
            </li>
            <li class="<?php echo (isset($_GET["active"]) && $_GET["active"] == 0) ? 'selected' : ''; ?>">
                <a href="<?php echo home_url('profile?action=my-jobs&active=0') ?>"> غیر فعال <span><?php echo $count_0;  ?></span></a>
            </li>
            <li class="<?php echo (isset($_GET["active"]) && $_GET["active"] == 1) ? 'selected' : ''; ?>">
                <a href="<?php echo home_url('profile?action=my-jobs&active=1') ?>"> فعال <span><?php echo $count_1;  ?></span></a>
            </li>
            <li class="<?php echo (isset($_GET["active"]) && $_GET["active"] == 2) ? 'selected' : ''; ?>">
                <a href="<?php echo home_url('profile?action=my-jobs&active=2') ?>"> بسته شده <span><?php echo $count_2;  ?></span></a>
            </li>
            <li class="<?php echo (isset($_GET["active"]) && $_GET["active"] == 3) ? 'selected' : ''; ?>">
                <a href="<?php echo home_url('profile?action=my-jobs&active=3') ?>"> آرشیو شده <span><?php echo $count_3;  ?></span></a>
            </li>
            <li class="<?php echo (isset($_GET["active"]) && $_GET["active"] == 4) ? 'selected' : ''; ?>">
                <a href="<?php echo home_url('profile?action=my-jobs&active=4') ?>"> پیش نویس <span><?php echo $count_4;  ?></span></a>
            </li>
        </ul>
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
                            <h4 style="margin-left: 15px;"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)); ?></a></h4>
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
        )" class="edit ads-btn"> حذف <i class="fa fa-remove m-r5"></i></button>
                                <div style="display: flex;">
                                    <a class="btn btn-default" href="<?php echo home_url('profile?action=create-job&job_id=' . get_the_ID()); ?>">ویرایش <i class="fa fa-edit"></i></a>
                                    <a target="_Blank" class="btn btn-default" href="<?php echo get_the_permalink(); ?>">نمایش آگهی <i class="fa fa-eye"></i></a>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="status-box">
                        <?php

                        $meta_arg = [];
                        $meta_arg["relation"] = "AND";
                        $meta_arg[] = ["key" => "owner_id", "value" => $user_id, "compare" => "="];
                        $meta_arg[] = ["key" => "job_id", "value" => get_the_ID(), "compare" => "="];
                        $meta_arg[] = ["key" => "status", "value" => '0', "compare" => "="];
                        $args = array(
                            'post_type' => 'request',
                            'meta_query' => $meta_arg
                        );
                        $the_query0 = new WP_Query($args);
                        $count_0 = $the_query0->post_count;

                        $meta_arg = [];
                        $meta_arg["relation"] = "AND";
                        $meta_arg[] = ["key" => "owner_id", "value" => $user_id, "compare" => "="];
                        $meta_arg[] = ["key" => "job_id", "value" => get_the_ID(), "compare" => "="];
                        $meta_arg[] = ["key" => "status", "value" => '1', "compare" => "="];
                        $args = array(
                            'post_type' => 'request',
                            'meta_query' => $meta_arg
                        );
                        $the_query1 = new WP_Query($args);
                        $count_1 = $the_query1->post_count;

                        $meta_arg = [];
                        $meta_arg["relation"] = "AND";
                        $meta_arg[] = ["key" => "owner_id", "value" => $user_id, "compare" => "="];
                        $meta_arg[] = ["key" => "job_id", "value" => get_the_ID(), "compare" => "="];
                        $meta_arg[] = ["key" => "status", "value" => '2', "compare" => "="];
                        $args = array(
                            'post_type' => 'request',
                            'meta_query' => $meta_arg
                        );
                        $the_query2 = new WP_Query($args);
                        $count_2 = $the_query2->post_count;


                        $meta_arg = [];
                        $meta_arg["relation"] = "AND";
                        $meta_arg[] = ["key" => "owner_id", "value" => $user_id, "compare" => "="];
                        $meta_arg[] = ["key" => "job_id", "value" => get_the_ID(), "compare" => "="];
                        $meta_arg[] = ["key" => "status", "value" => '3', "compare" => "="];
                        $args = array(
                            'post_type' => 'request',
                            'meta_query' => $meta_arg
                        );
                        $the_query3 = new WP_Query($args);
                        $count_3 = $the_query3->post_count;


                        $meta_arg = [];
                        $meta_arg["relation"] = "AND";
                        $meta_arg[] = ["key" => "owner_id", "value" => $user_id, "compare" => "="];
                        $meta_arg[] = ["key" => "job_id", "value" => get_the_ID(), "compare" => "="];
                        $meta_arg[] = ["key" => "status", "value" => '4', "compare" => "="];
                        $args = array(
                            'post_type' => 'request',
                            'meta_query' => $meta_arg
                        );
                        $the_query4 = new WP_Query($args);
                        $count_4 = $the_query4->post_count;

                        ?>
                        <div>
                            <span><?php echo $count_0; ?></span><span><a href="<?php echo home_url("profile/?action=request&job_id=" . get_the_ID() . "&status=0") ?>">در انتظار وضعیت</a></span>
                        </div>
                        <div>
                            <span><?php echo $count_1; ?></span><span><a href="<?php echo home_url("profile/?action=request&job_id=" . get_the_ID() . "&status=1") ?>"> بررسی شده</a></span>
                        </div>
                        <div>
                            <span><?php echo $count_2; ?></span><span><a href="<?php echo home_url("profile/?action=request&job_id=" . get_the_ID() . "&status=2") ?>"> تایید برای مصاحبه</a></span>
                        </div>
                        <div>
                            <span><?php echo $count_3; ?></span><span><a href="<?php echo home_url("profile/?action=request&job_id=" . get_the_ID() . "&status=3") ?>">رد شده </a></span>
                        </div>
                        <div>
                            <span><?php echo $count_4; ?></span><span><a href="<?php echo home_url("profile/?action=request&job_id=" . get_the_ID() . "&status=4") ?>"> استخدام شده</a></span>
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