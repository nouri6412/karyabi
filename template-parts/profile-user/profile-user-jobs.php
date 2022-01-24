<?php
$user_id = get_current_user_id();

$user_meta = get_query_var('user_meta');
$data = [];
if (isset($user_meta["resume-skills"])) {
    $data = json_decode($user_meta["resume-skills"][0]);
}
$skills = [];
if (isset($data->skills)) {
    $skills = explode(',', $data->skills);
}

$search = array();
$search["relation"] = "OR";
foreach ($skills as $item) {
    $search[] =           array(
        'key' => 'tag',
        'value' => $item,
        'compare' => 'LIKE'
    );
}

$args = array(
    'post_type' => 'job',
    'post_status' => 'publish',
    'meta_key' => 'active',
    'meta_value' => '1',
    'meta_query' => $search
);
$the_query = new WP_Query($args);
$count = $the_query->post_count;
?>
<div class="job-bx-title clearfix">
    <h5 class="font-weight-700 pull-left text-uppercase"><?php echo $count . ' ' . 'شغل پیدا شده است'; ?></h5>
</div>
<ul class="post-job-bx browse-job">
    <?php
    while ($the_query->have_posts()) :
        $the_query->the_post();
    ?>
        <li>
            <div class="post-bx">
                <div class="job-post-info m-a0">
                    <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                    <ul>
                        <li><a href="company-profile.html"><?php echo  get_the_author_meta('company_name') ?></a></li>
                        <li><i class="fa fa-map-marker"></i><?php echo  get_the_title(get_post_meta(get_the_ID(), 'state_id', true)).'  '.get_the_title(get_post_meta(get_the_ID(), 'city_id', true)); ?></li>
                        <li><i class="fa fa-money"></i><?php
                                                        $min = 0;
                                                        $max = 0;

                                                        if (is_numeric(get_post_meta(get_the_ID(), 'min-salary', true))) {
                                                            $min = get_post_meta(get_the_ID(), 'min-salary', true);
                                                        }

                                                        if (is_numeric(get_post_meta(get_the_ID(), 'max-salary', true))) {
                                                            $max = get_post_meta(get_the_ID(), 'max-salary', true);
                                                        }

                                                        echo 'حقوق' . ' ';
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
                    </ul>
                    <div class="job-time m-t15 m-b10">
                        <?php
                        $tags_str = get_post_meta(get_the_ID(), 'tag', true);
                        $tags = explode(',', $tags_str);
                        foreach ($tags as $tag) {
                        ?>
                            <a href="javascript:void(0);"><span><?php echo $tag; ?></span></a>
                        <?php } ?>
                    </div>
                    <div class="posted-info clearfix">
                        <p class="m-tb0 text-primary float-left"><span class="text-black m-r10">ارسال شده:</span> <?php echo get_the_date(); ?></p>
                        <a href="jobs-my-resume.html" class="site-button button-sm float-right">درخواست</a>
                    </div>
                </div>
            </div>
        </li>

    <?php
    endwhile;
    wp_reset_query();
    ?>
</ul>
<div class="pagination-bx m-t30">
    <ul class="pagination">
        <li class="next"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> قبلی</a></li>
        <li class="active"><a href="javascript:void(0);">1</a></li>
        <li><a href="javascript:void(0);">2</a></li>
        <li><a href="#">3</a></li>
        <li class="previous"><a href="javascript:void(0);">بعدی <i class="ti-arrow-right"></i></a></li>
    </ul>
</div>