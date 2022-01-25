<?php
$user_id = get_current_user_id();
$args = array(
    'post_type' => 'favorite',
    'author'  => $user_id
);
$the_query = new WP_Query($args);
$count = $the_query->post_count;
?>
<div class="job-bx-title clearfix">
    <h5 class="font-weight-700 pull-left text-uppercase"><?php echo $count . ' ' . 'شغل '; ?></h5>
</div>
<ul class="post-job-bx browse-job">
    <?php
    while ($the_query->have_posts()) :
        $the_query->the_post();
        $job_id=get_post_meta(get_the_ID(), 'job_id', true);
        $author_id=get_the_author_meta('ID',$job_id);
    ?>
        <li id="<?php echo 'job-' . get_the_ID(); ?>">
            <div class="post-bx">
                <div class="job-post-info m-a0">
                    <h4><a href="<?php echo get_the_permalink($job_id); ?>"><?php echo get_the_title($job_id).' / '. get_the_title(get_post_meta($job_id, 'cat_id', true)); ?></a></h4>
                    <ul>
                        <li><a href="#"><?php echo  get_the_author_meta('company_name',$author_id) ?></a></li>
                        <li><i class="fa fa-map-marker"></i><?php echo  get_the_title(get_post_meta($job_id, 'state_id', true)).'  '.get_the_title(get_post_meta($job_id, 'city_id', true)); ?></li>
                        <li><i class="fa fa-money"></i><?php
                                                        $min = 0;
                                                        $max = 0;

                                                        if (is_numeric(get_post_meta($job_id, 'min-salary', true))) {
                                                            $min = get_post_meta($job_id, 'min-salary', true);
                                                        }

                                                        if (is_numeric(get_post_meta($job_id, 'max-salary', true))) {
                                                            $max = get_post_meta($job_id, 'max-salary', true);
                                                        }

                                                        echo 'حقوق' . ' ';
                                                        if ($min > 0 && $max > 0) {
                                                            echo 'از' . ' ' . get_post_meta($job_id, 'min-salary', true) . ' ' . 'تا' . get_post_meta($job_id, 'max-salary', true);
                                                        } else  if ($min > 0) {
                                                            echo 'از' . ' ' . get_post_meta($job_id, 'min-salary', true);
                                                        } else  if ($max > 0) {
                                                            echo 'تا' . get_post_meta($job_id, 'max-salary', true);
                                                        } else {
                                                            echo 'توافقی';
                                                        }

                                                        ?></li>
                    </ul>
                    <div class="job-time m-t15 m-b10">
                        <?php
                        $tags_str = get_post_meta($job_id, 'tag', true);
                        $tags = explode(',', $tags_str);
                        foreach ($tags as $tag) {
                        ?>
                            <a href="javascript:void(0);"><span><?php echo $tag; ?></span></a>
                        <?php } ?>
                    </div>
                    <div class="posted-info clearfix">
                        <p class="m-tb0 text-primary float-left"><span class="text-black m-r10">ارسال شده:</span> <?php echo get_the_date('',$job_id); ?></p>
                        <a onclick="ajax_submit_mbm_remove_job(
            {
                'action': 'mbm_profile_company_remove_job',
                'job_id':<?php echo get_the_ID() ?>
            }
            ,'<?php echo 'job-' . get_the_ID(); ?>'
        )" href="#" class="site-button button-sm float-right">حذف <i class="fa fa-remove"></i></a>
                    </div>
                </div>
            </div>
        </li>

    <?php
    endwhile;
    wp_reset_query();
    ?>
</ul>