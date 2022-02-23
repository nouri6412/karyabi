<div class="post-bx">
    <div class="d-flex m-b30">
        <div class="job-post-company">
            <span><img alt="" src="<?php echo  get_the_author_meta('avatar') ?>"></span>
        </div>
        <div class="job-post-info">
            <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)); ?></a></h4>
            <ul>
                <li><i class="fa fa-map-marker"></i> <?php echo  get_the_title(get_post_meta(get_the_ID(), 'state_id', true)) . '  ' . get_the_title(get_post_meta(get_the_ID(), 'city_id', true)); ?></li>
                <li><i class="fa fa-bookmark-o"></i> <?php echo get_post_meta(get_the_ID(), 'coop-type', true); ?></li>
                <li><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></li>
            </ul>
        </div>
    </div>
    <div class="d-flex">
        <div class="job-time mr-auto">
            <a href="javascript:void(0);"><span><?php echo  get_the_author_meta('company_name') ?></span></a>
        </div>
        <div class="salary-bx">
            <span><?php echo custom_get_salary(get_the_ID()) ?></span>
        </div>
    </div>
    <!-- <label class="like-btn">
        <input onchange="ajax_submit_mbm_job_request(
            {
                'action': 'mbm_job_favorite',
                'job_id':'<?php echo get_the_ID(); ?>'
            }
            ,$(this)
            ,$('#favorite-btn')
        )" type="checkbox">
        <span id="favorite-btn" class=""><i class="fa fa-bookmark"></i></span>
    </label> -->
</div>