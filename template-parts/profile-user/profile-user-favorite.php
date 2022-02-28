<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$user_id = get_current_user_id();
$args = array(
    'post_type' => 'favorite',
    'author'  => $user_id,
    'posts_per_page' => 8,
    'paged' => $paged
);
$the_query = new WP_Query($args);
$count = $the_query->post_count;
?>
<div class="job-bx-title clearfix">
    <h5 class="font-weight-700 pull-left text-uppercase"><?php echo $count . ' ' . 'شغل '; ?></h5>
    <a href="<?php  echo home_url('profile?action='.get_query_var('back_action')) ; ?>" class="site-button right-arrow button-sm float-right">بازگشت</a>

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