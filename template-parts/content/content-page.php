        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo get_field('back-image'); ?>);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white"><?php echo get_the_title(); ?></h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a title="<?php echo get_bloginfo("name"); ?>" href="<?php echo home_url(); ?>">خانه</a></li>
                            <li><?php echo get_the_title(); ?></li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-7 m-b10">
                        <!-- blog start -->
                        <div class="blog-post blog-single blog-style-1">
                            <?php
                            get_template_part('template-parts/content/content', 'post-meta');
                            ?>
                            <div class="dez-post-title">
                                <h4 class="post-title m-t0"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                            </div>
                            <div class="dez-post-media dez-img-effect zoom-slow m-t20"> <a href="<?php echo get_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>"></a> </div>
                            <div class="dez-post-text">
                                <?php
                                the_content();
                                ?>
                            </div>
                            <?php
                            get_template_part('template-parts/content/content', 'tags');
                            ?>
                            <div class="dez-divider bg-gray-dark op4"><i class="icon-dot c-square"></i></div>
                            <?php
                            get_template_part('template-parts/content/content', 'share-buttons');
                            ?>
                        </div>
                        <div class="clear" id="comment-list">
                            <div class="comments-area" id="comments">
                                <div class="clearfix m-b20">
                                    <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if (comments_open() || get_comments_number()) {
                                        comments_template();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- blog END -->
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-4 col-md-5 sticky-top">
                        <aside class="side-bar">
                        <?php
                            get_template_part('template-parts/widget/widget', 'search-form');
                            get_template_part('template-parts/widget/widget', 'recent-posts-entry');
                            get_template_part('template-parts/widget/widget', 'our-service');
                            get_template_part('template-parts/widget/widget', 'category');
                            get_template_part('template-parts/widget/widget', 'subscriber');
                            ?>
                        </aside>
                    </div>
                    <!-- Side bar END -->
                </div>
            </div>
        </div>