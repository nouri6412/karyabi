<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4
);
$the_query = new WP_Query($args);
?>
<div class="widget recent-posts-entry">
    <h6 class="widget-title" style="font-family: pelak;">پست های اخیر</h6>
    <div class="widget-post-bx">
        <?php
        while ($the_query->have_posts()) :
            $the_query->the_post();
        ?>
            <div class="widget-post clearfix">
                <div class="dez-post-media"> <img src="<?php the_post_thumbnail_url(); ?>" width="200" height="143" alt="<?php echo get_the_title(); ?>"> </div>
                <div class="dez-post-info">
                    <div class="dez-post-header">
                        <h6 title="<?php echo get_the_title(); ?>" class="post-title"><a href="<?php echo get_permalink();  ?>"><?php echo get_the_title(); ?></a></h6>
                    </div>
                    <div class="dez-post-meta">
                        <ul class="d-flex align-items-center">
                            <li class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
                            <li class="post-comment"><a href="<?php echo get_permalink();  ?>"><i class="fa fa-comments-o"></i><?php echo get_comments_number(); ?></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php

        endwhile;
        wp_reset_query();
        ?>
    </div>
</div>