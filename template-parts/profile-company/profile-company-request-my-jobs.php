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
        <h5 class="font-weight-700 pull-left text-uppercase">مدیریت رزومه های ارسالی</h5>
        <a href="<?php echo home_url('profile?action=' . get_query_var('back_action')); ?>" class="site-button right-arrow button-sm float-right">بازگشت</a>

    </div>
    <div>
        <div>
            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
            ?>
                <div style="min-height: 0;" id="<?php echo 'ads-' . get_the_ID(); ?>" class="ads">
                    <div>
                        <div class="d-flex">
                            <i class="fal fa-bookmark"></i>
                            <?php

                            $meta_arg = [];
                            $meta_arg["relation"] = "AND";
                            $meta_arg[] = ["key" => "owner_id", "value" => $user_id, "compare" => "="];
                            $meta_arg[] = ["key" => "job_id", "value" => get_the_ID(), "compare" => "="];
                            $args = array(
                                'post_type' => 'request',
                                'meta_query' => $meta_arg
                            );
                            $the_query0 = new WP_Query($args);
                            $count_0 = $the_query0->post_count;

                            ?>
                            <h4 style="margin-left: 15px;"><a href="<?php echo home_url("profile/?action=request&job_id=" . get_the_ID() . "") ?>"><?php echo get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)) ; ?></a></h4>
                            <p><?php echo $count_0.' '.'عدد'; ?></p>
                        </div>

                        <div class="d-flex">
                            <div>
                                <div style="display: flex;">
                                    <a target="_Blank" class="btn btn-default" href="<?php echo home_url("profile/?action=request&job_id=" . get_the_ID() . "") ?>">مشاهده رزومه ها<i class="fa fa-eye"></i></a>
                                </div>

                            </div>
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