<?php
$user_id = get_current_user_id();
$args = array(
    'post_type' => 'request',
    'meta_key'  => '',
    'meta_value' => $user_id
);
$the_query = new WP_Query($args);
$count = $the_query->post_count;
?>
<div class="job-bx-title clearfix">
    <h5 class="font-weight-700 pull-left text-uppercase"><?php echo $count . ' ' . 'درخواست '; ?></h5>
</div>
<ul class="post-job-bx browse-job-grid post-resume row">
    <?php
    while ($the_query->have_posts()) :
        $the_query->the_post();
    ?>
        <li class="col-lg-6 col-md-6">
            <div class="post-bx">
                <div class="d-flex m-b20">
                    <div class="job-post-info">
                        <h5 class="m-b0"><a href="<?php echo home_url('profile?action=resume&user_id=' . get_the_author_meta('ID')); ?>"><?php echo  get_the_author_meta('user_name') ?></a></h5>
                        <p class="m-b5 font-13">
                            <a href="javascript:void(0);" class="text-primary"><?php echo  get_the_author_meta('user_exp') ?></a>
                        </p>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><?php echo  get_the_title(get_the_author_meta('state_id')) . '  ' . get_the_title(get_the_author_meta('city_id')); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="job-time m-t15 m-b10">
                    <?php
                    $tags_str = get_the_author_meta('resume-skills');
                    $tags = [];

                    if (strlen($tags_str) > 0) {
                        $tgs = json_decode($tags_str);
                        $tags = explode(',', $tgs->skills);
                    }

                    foreach ($tags as $tag) {
                    ?>
                        <a href="javascript:void(0);"><span><?php echo $tag; ?></span></a>
                    <?php } ?>
                </div>
                <a href="<?php echo home_url('profile?action=resume&user_id=' . get_the_author_meta('ID')); ?>" target="blank" class="job-links">
                    <i class="fa fa-download"></i>
                </a>
                <h6><a href="<?php echo get_the_permalink(get_post_meta(get_the_ID(), 'job_id', true)); ?>"><?php echo 'آگهی' . ' ' . get_the_title(get_post_meta(get_the_ID(), 'job_id', true)) ?></a></h6>
                <div class="accept-box row">
                    <label class="col-md-4"> وضعیت</label>
                    <select onchange="ajax_submit_mbm_change_status_request({
                                        'action': 'mbm_change_status_request',
                'job_id':<?php echo get_the_ID(); ?>,
                'status':$(this).val(),
                    })" class="col-md-8">
                        <option <?php echo (get_post_meta(get_the_ID(), 'status', true)==0) ? 'selected="selected"':'' ?> value="0">در انتظار وضعیت</option>
                        <option <?php echo (get_post_meta(get_the_ID(), 'status', true)==1) ? 'selected="selected"':'' ?> value="1">بررسی شده</option>
                        <option <?php echo (get_post_meta(get_the_ID(), 'status', true)==2) ? 'selected="selected"':'' ?> value="2">تایید برای مصاحبه</option>
                        <option <?php echo (get_post_meta(get_the_ID(), 'status', true)==3) ? 'selected="selected"':'' ?> value="3">رد درخواست</option>
                        <option <?php echo (get_post_meta(get_the_ID(), 'status', true)==4) ? 'selected="selected"':'' ?> value="4">استخدام شده</option>
                    </select>
                </div>
            </div>
        </li>
    <?php
    endwhile;
    wp_reset_query();
    ?>
</ul>
<div class="pagination-bx float-left">
    <ul class="pagination">
        <li class="next"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> بعدی</a></li>
        <li><a href="javascript:void(0);">3</a></li>
        <li><a href="javascript:void(0);">2</a></li>
        <li class="active"><a href="javascript:void(0);">1</a></li>
        <li class="previous"><a href="javascript:void(0);">قبلی <i class="ti-arrow-right"></i></a></li>
    </ul>
</div>