<div class="dez-post-tags clear">
    <div class="post-tags">
        <?php
        $posttags = get_the_tags();
        if ($posttags) {
            foreach ($posttags as $tag) {
        ?>
                <a href="<?php echo esc_attr(get_tag_link($tag->term_id)) ?>"><?php echo $tag->name ?> </a>
        <?php
            }
        }
        ?>
    </div>
</div>