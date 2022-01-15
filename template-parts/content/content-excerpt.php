<div class="blog-post blog-md clearfix">
    <div class="dez-post-media dez-img-effect zoom-slow radius-sm"> <a href="<?php echo get_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>"></a> </div>
    <div class="dez-post-info">
        <?php
        get_template_part('template-parts/content/content', 'post-meta');
        ?>
        <div class="dez-post-title ">
            <h4 class="post-title font-24"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
        </div>
        <div class="dez-post-text">
            <p><?php echo mb_strimwidth(get_the_content(), 0, 250, '...'); ?></p>
        </div>
        <div class="dez-post-readmore blog-share">
            <a href="<?php echo get_permalink(); ?>" title="اطلاعات بیشتر" rel="bookmark" class="site-button-link"><span class="fw6">اطلاعات بیشتر</span></a>
        </div>
    </div>
</div>