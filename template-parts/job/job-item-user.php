<?php
$cur_author=get_query_var('cur_author');
?>
<div class="post-bx">
    <div class="d-flex m-b30">
        <div class="job-post-company">
            <a href="javascript:void(0);"><span>     
                    <img alt="" src="<?php echo get_the_author_meta('avatar', $cur_author->ID) ?>">
                </span></a>
        </div>
        <div class="job-post-info">
            <h4><a href="<?php echo home_url('profile?action=resume&user_id=' . get_the_author_meta('ID', $cur_author->ID)); ?>"><?php echo  get_the_author_meta('user_name', $cur_author->ID) ?></a></h4>
            <ul>
                <li><i class="fa fa-map-marker"></i> <?php echo  get_the_title(get_the_author_meta('state_id', $cur_author->ID)) . '  ' . get_the_title(get_the_author_meta('city_id', $cur_author->ID)); ?></li>
                <li><i class="fa fa-user"></i> <?php echo get_the_author_meta('user_exp', $cur_author->ID) ?></li>
            </ul>
        </div>
    </div>
    <div class="d-flex">
        <div class="job-time mr-auto">
            <?php
            $tags_str = get_the_author_meta('resume-skills', $cur_author->ID);
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
    </div>
</div>