<?php
$args = array(
    'post_type' => 'our-service',
    'posts_per_page' => 6
);
$the_query = new WP_Query($args);
?>
<div class="widget widget_gallery gallery-grid-3">
    <h6 class="widget-title">خدمات ما</h6>
    <ul>
        <?php
        while ($the_query->have_posts()) :
            $the_query->the_post();
        ?>
            <li>
                <div class="dez-post-thum">
                    <a href="<?php echo get_permalink();  ?>" class="dez-img-overlay1 dez-img-effect zoom-slow">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                    </a>
                </div>
            </li>
        <?php

        endwhile;
        wp_reset_query();
        ?>
    </ul>
</div>