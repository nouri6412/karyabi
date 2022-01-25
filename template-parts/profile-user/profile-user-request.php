<?php
$user_id = get_current_user_id();
$args = array(
    'post_type' => 'request',
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
        $job_id = get_post_meta(get_the_ID(), 'job_id', true);
        $author_id = get_post_field('post_author', $job_id);
    ?>
        <li id="<?php echo 'job-' . get_the_ID(); ?>">
            <div class="post-bx">
                <div class="job-post-info m-a0">
                    <h4><a href="<?php echo get_the_permalink($job_id); ?>"><?php echo get_the_title($job_id).' / '. get_the_title(get_post_meta($job_id, 'cat_id', true)); ?></a></h4>
                    <ul>
                        <li><a href="#"><?php echo  get_the_author_meta('company_name', $author_id) ?></a></li>
                        <li><i class="fa fa-map-marker"></i><?php echo  get_the_title(get_post_meta($job_id, 'state_id', true)) . '  ' . get_the_title(get_post_meta($job_id, 'city_id', true)); ?></li>
                        <li><i class="fa fa-money"></i><?php
                                                       echo custom_get_salary($job_id)

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
                        <p class="m-tb0 text-primary float-left"><span class="text-black m-r10">ارسال شده:</span> <?php echo get_the_date('', $job_id); ?></p>
                        <p class="m-tb0 text-primary float-right"><span class="text-black m-r10">ارسال رزومه:</span> <?php echo get_the_date(); ?></p>
                        <br>
                        <div>
                            <label>وضعیت درخواست</label>
                            <?php
                            $status = get_post_meta($job_id, 'status', true);
                            if ($status == 1) {
                                echo 'بررسی شده';
                            } else if ($status == 2) {
                                echo 'تایید برای مصاحبه';
                            } else if ($status == 2) {
                                echo 'رد درخواست';
                            } else if ($status == 2) {
                                echo 'استخدام شده';
                            } else {
                                echo 'در انتظار وضعیت';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    <?php
    endwhile;
    wp_reset_query();
    ?>
</ul>