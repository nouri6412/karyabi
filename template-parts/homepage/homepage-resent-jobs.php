<?php
$args = array(
    'post_type' => 'job',
    'post_status' => 'publish',
    'meta_key' => 'active',
    'meta_value' => '1',
    'posts_per_page' => 8
);
$the_query = new WP_Query($args);
?>
<ul class="post-job-bx browse-job">
    <?php
    while ($the_query->have_posts()) :
        $the_query->the_post();
    ?>
        <li>
            <?php
            get_template_part('template-parts/job/job', 'item');
            ?>
        </li>
    <?php
    endwhile;
    wp_reset_query();
    ?>
</ul>
<!-- <div class="m-t30">
    <div class="d-flex">
        <a class="site-button button-sm mr-auto" href="javascript:void(0);"><i class="ti-arrow-left"></i> بعدی</a>
        <a class="site-button button-sm" href="javascript:void(0);">قبلی <i class="ti-arrow-right"></i></a>
    </div>
</div> -->