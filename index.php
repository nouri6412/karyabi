<?php
get_header()
?>
<div class="container mt-4">
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <?php
                if (have_posts()) {
                ?>
                    <h2>آخرین مطالب</h2>
                <?php
                    // Load posts loop.
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content/content');
                    }
                } else {
                    
                   
                    // If no content, include the "No posts found" template.
                    get_template_part('template-parts/content/content', 'none');
                }
                ?>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4  mt-2">

            </div>

        </div>
    </section>
</div>

<?php get_footer() ?>