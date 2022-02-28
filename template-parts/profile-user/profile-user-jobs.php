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

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'job',
    'post_status' => 'publish',
    'meta_key' => 'active',
    'meta_value' => '1',
    'posts_per_page' => 8,
    'paged' => $paged,
    'meta_query' => $search
);
$the_query = new WP_Query($args);
$count = $the_query->post_count;
?>
<div class="job-bx-title clearfix">
    <h5 class="font-weight-700 pull-left text-uppercase"><?php echo $count . ' ' . 'شغل پیدا شده است'; ?></h5>
    <a href="<?php  echo home_url('profile?action='.get_query_var('back_action')) ; ?>" class="site-button right-arrow button-sm float-right">بازگشت</a>

</div>
<ul class="post-job-bx browse-job">
    <?php
    while ($the_query->have_posts()) :
        $the_query->the_post();
    ?>
        <li>
            <div class="post-bx">
                <div class="job-post-info m-a0">
                    <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)); ?></a></h4>
                    <ul>
                        <li><a href="#"><?php echo  get_the_author_meta('company_name') ?></a></li>
                        <li><i class="fa fa-map-marker"></i><?php echo  get_the_title(get_post_meta(get_the_ID(), 'state_id', true)) . '  ' . get_the_title(get_post_meta(get_the_ID(), 'city_id', true)); ?></li>
                        <li><i class="fa fa-money"></i><?php
                                                        echo custom_get_salary(get_the_ID())
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
                        <?php
                        $user_id = get_current_user_id();
                        $args = array(
                            'post_type' => 'request',
                            'author'  => $user_id,
                            'meta_key'        => 'job_id',
                            'meta_value'    => get_the_ID()
                        );
                        $the_query1 = new WP_Query($args);

                        $count = $the_query1->post_count;
                        // wp_reset_query();
                        ?>
                        <?php
                        if ($count == 0 && $user_id > 0) {
                        ?>
                            <a href="<?php echo get_the_permalink(); ?>" class="site-button button-sm float-right">درخواست</a>
                        <?php } else if ($user_id > 0) { ?>
                            <div id="request-result" class="before-message">رزومه قبلا ارسال شده است</div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </li>

    <?php
    endwhile;
    ?>
</ul>
<div class="pagination">
                            <?php
                            echo paginate_links(array(
                                'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                'total'        => $the_query->max_num_pages,
                                'current'      => max(1, get_query_var('paged')),
                                'format'       => '?paged=%#%',
                                'show_all'     => false,
                                'type'         => 'plain',
                                'end_size'     => 2,
                                'mid_size'     => 1,
                                'prev_next'    => true,
                                'prev_text'    => sprintf('<i></i> %1$s', __('بعدی', 'text-domain')),
                                'next_text'    => sprintf('%1$s <i></i>', __('قبلی', 'text-domain')),
                                'add_args'     => false,
                                'add_fragment' => '',
                            ));
                            ?>
                        </div>
                        <?php      wp_reset_query(); ?>
<!-- <div class="pagination-bx m-t30">
    <ul class="pagination">
        <li class="next"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> قبلی</a></li>
        <li class="active"><a href="javascript:void(0);">1</a></li>
        <li><a href="javascript:void(0);">2</a></li>
        <li><a href="#">3</a></li>
        <li class="previous"><a href="javascript:void(0);">بعدی <i class="ti-arrow-right"></i></a></li>
    </ul>
</div> -->